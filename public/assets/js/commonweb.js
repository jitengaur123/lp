
$(document).ready(function () {
    //This is used to disable a button after it has been clicked.
    //The form would not submit if done this way: onclick="this.disabled=true"  
    $(window).bind('beforeunload', function () {
        $(".DisableButtonOnClick").prop("disabled", true);
    });

    //The following adds the Epiphany textbox style to the web editor.
    //When the page is loaded the top, left, and right borders on textboxes are hidden so just the bottom border is visible.
    //When one of the textboxes is clicked (focus), the borders of all textboxes with the class EpiphanyFormElementStyle appear.
    $(".EpiphanyFormElementStyle").focus(function () {
        $(".EpiphanyFormElementStyle").removeClass("EpiphanyFormElementBottomBorder");
    });

    $(".EpiphanyFormElementStyle").focusout(function () {
        $(".EpiphanyFormElementStyle").addClass("EpiphanyFormElementBottomBorder");
    });

    //datetimepicker on edit article page
    $(".jqueryDateTimePicker").datetimepicker({
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        timeFormat: 'HH:mm:ss',
        stepMinute: 15,
        stepSecond: 15
    });

    $(".jqueryDatePicker").datepicker({
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true
    });


    //------------START HtmlEditor Functionality------------//

    var editorDoc;
    var editor;

    if (document.getElementById("HtmlDesignMode")) {
        //HTML Editor Setup
        editor = document.getElementById("HtmlDesignMode");
        
        if (editor.contentDocument) {
            editorDoc = editor.contentDocument;
        } else {
            editorDoc = editor.contentWindow.document;
        }

        var editorBody = editorDoc.body;

        if ('spellcheck' in editorBody) {    // Firefox
            editorBody.spellcheck = false;
        }

        if ('contentEditable' in editorBody) {
            // allow contentEditable
            editorBody.contentEditable = true;
        } else {  // Firefox earlier than version 3
            if ('designMode' in editorDoc) {
                // turn on designMode
                editorDoc.designMode = "on";
            }
        }
        //END HTML Editor Setup

        $("#HtmlViewSourceMode").hide();

        function ExecCommandListener(ID, cmd) {
            $(document).on("click", ID, cmd);
        }

        ExecCommandListener("#HTMLundo", function () { editorDoc.execCommand("undo", false, null) });
        ExecCommandListener("#HTMLredo", function () { editorDoc.execCommand("redo", false, null) });
        ExecCommandListener("#HTMLbold", function () { editorDoc.execCommand("bold", false, null); });
        ExecCommandListener("#HTMLitalic", function () { editorDoc.execCommand("italic", false, null); });
        ExecCommandListener("#HTMLunderline", function () { editorDoc.execCommand("underline", false, null); });
        ExecCommandListener("#HTMLstrikethrough", function () { editorDoc.execCommand("strikethrough", false, null); });
        ExecCommandListener("#HTMLsubscript", function () { editorDoc.execCommand("subscript", false, null); });
        ExecCommandListener("#HTMLsuperscript", function () { editorDoc.execCommand("superscript", false, null); });

        //Handles the heading dropdown
        $("#HTMLheadingItem").on("click", "li a", function () {
            alert($(this).attr("value"))
            if ($(this).text() === "Normal") {
                editorDoc.execCommand("fontSize", false, "3");
            } else {
                editorDoc.execCommand("formatBlock", false, $(this).attr("value"));
            }
        });

        //Handles the font size dropdown
        $("#HTMLfontsizeItem").on("click", "li a", function () {
            if ($(this).text() === "Normal") {
                editorDoc.execCommand("fontSize", false, "3");
            } else {
                editorDoc.execCommand("fontSize", false, $(this).text());
            }
        });

        //Handles fore color
        $("#HTMLtextcolor").colorPicker();
        $(document).on("click keyup", "#colorPicker_palette-0 .colorPicker-swatch, #colorPicker_hex-0", function () {
            editorDoc.execCommand("foreColor", false, rgb2hex($(this).css("background-color")));
        });

        //Handles background color
        $("#HTMLbackgroundcolor").colorPicker({colors: ["FFFFFF", "E6E6FA", "F0F8FF", "F0FFFF", "F0FFF0", "FFFFE0", "FAEBD7", "FFF0F5", "D3D3D3",	"DDA0DD", "ADD8E6", "AFEEEE", "00FF00", "FFFF00", "FFA500", "FFA07A", "A9A9A9",	"EE82EE", "0000FF", "00FFFF", "008000", "FFD700", "FF8C00", "FF0000", "808080",	"800080", "0000CD", "40E0D0", "006400", "DAA520", "A52A2A", "B22222", "696969",	"4B0082", "000080", "008080", "2F4F4F", "8B4513", "800000", "000000"]} );
        $(document).on("click keyup", "#colorPicker_palette-1 .colorPicker-swatch, #colorPicker_hex-1", function () {
            editorDoc.execCommand("backColor", false, $(this).css("background-color"));
        });

        //Handles remove styles (eraser)
        ExecCommandListener("#HTMLRemoveStyles", function () { editorDoc.execCommand("removeFormat", false, null); })

        //Handles outdent and indent
        ExecCommandListener("#HTMLOutdent", function () { editorDoc.execCommand("outdent", false, null); })
        ExecCommandListener("#HTMLIndent", function () { editorDoc.execCommand("indent", false, null); })

        //Handles Ordered and Unordered List
        ExecCommandListener("#HTMLOrderedList", function () { editorDoc.execCommand("insertOrderedList", false, null); })
        ExecCommandListener("#HTMLUnorderedList", function () { editorDoc.execCommand("insertUnorderedList", false, null); })

        //Handles Justify Left, Center, Right and Justify
        ExecCommandListener("#HTMLJustifyLeft", function () { editorDoc.execCommand("justifyLeft", false, null); })
        ExecCommandListener("#HTMLJustifyCenter", function () { editorDoc.execCommand("justifyCenter", false, null); })
        ExecCommandListener("#HTMLJustifyRight", function () { editorDoc.execCommand("justifyRight", false, null); })
        ExecCommandListener("#HTMLJustify", function () { editorDoc.execCommand("justifyFull", false, null); })

        //Handles Insert/Edit Link
        var linkText;
        $(document).on("click", "#HTMLLink", function () {
            linkText = saveSelection();
            $("#LinkHref, #LinkTarget").val("");
            $("#HTMLLinkOKBtn").prop("disabled", true);
            $("#LinkHref").focus();
            $(".link-modal-lg").modal();
        });

        $(document).on("keydown, keypress, keyup", "#LinkHref", function () {
            if ($(this).val() !== "") {
                $("#HTMLLinkOKBtn").prop("disabled", false);
            } else {
                $("#HTMLLinkOKBtn").prop("disabled", true);
            }
        });

        $(document).on("click", "#HTMLLinkOKBtn", function () {
            var link = "";
            restoreSelection(linkText);

            if ($("#LinkHref").val() !== '') {
                link += "<a href='" + $("#LinkHref").val() + "'";

                if ($("#LinkTarget").val() !== "") {
                    link += " target='" + $("#LinkTarget").val() + "'";
                }
                link += " >"

                if (linkText.text !== undefined) {
                    //Used for IE8
                    if (linkText.text == "") {
                        link += $("#LinkHref").val();
                    } else {
                        link += linkText.text;
                    }
                } else {
                    //Used for any other browser
                    if (linkText == "") {
                        link += $("#LinkHref").val();
                    } else {
                        link += linkText;
                    }
                }
                link += "</a>";

                pasteHtml(link);
            }
            $(".link-modal-lg").modal('hide');
        });

        //Handles Remove Link
        ExecCommandListener("#HTMLRemoveLink", function () { editorDoc.execCommand("unlink", false, null); })

        //*******START Image Section*******//

        var position;

        //Handles image button
        $(document).on("click", "#HTMLImage", function () {
            $("#BrowseImageContainer").scrollTop(0);
            position = saveSelection();
            $(".HTMLImageSelect").css("border", "none");
            $(".HTMLImageSelect").removeClass("selected");
            $("#HTMLImagesOKBtn").prop("disabled", true);
            $("#ImageURL, #ImageAltText, #ImageHeight, #ImageWidth, #ImageLinkHref, #ImageLinkTarget").val("");
            $(".nav a:first").tab("show");
            $(".images-modal-lg").modal();
        });

        //Onclick of an image from the browse tab, select image
        $(document).on("click", ".HTMLImageSelect", function (e) {
            e.stopPropagation();
            $(".HTMLImageSelect").css("border", "none");
            $(".HTMLImageSelect").removeClass("selected");
            $(this).css("border", "1px solid red");
            $(this).addClass("selected");
            $("#ImageURL").val($(this).attr("src"));
            var img = $("<img />");
            img.attr("src", $(this).attr("src"));
            img.unbind('load');
            img.bind("load", function () {
                $("#ImageWidth").val(this.width);
                $("#ImageHeight").val(this.height);
            });
            $("#HTMLImagesOKBtn").prop("disabled", false);
        });

        //Onclick of browse panel that isn't an image unselect image
        $(document).on("click", "#Browse", function () {
            $(".HTMLImageSelect").css("border", "none");
            $(".HTMLImageSelect").removeClass("selected");
            $("#HTMLImagesOKBtn").prop("disabled", true);
        });

        //Prevent anything that is not a number from being typed in the height or width textboxes
        $(document).on("keypress click", "#ImageHeight, #ImageWidth", function (e) {
            e.stopPropagation();
            if (e.which != 8 && isNaN(String.fromCharCode(e.which))) {
                e.preventDefault();
            }
        });

        $(document).on("click", "#HTMLImagesOKBtn", function (e) {
            e.stopPropagation();
            
            restoreSelection(position);

            var ImgText = "src = '" + $("#ImageURL").val() + "' ";
            ImgText += "style='"
            if ($("#ImageHeight").val() !== "") {
                ImgText += "height:" + $("#ImageHeight").val() + "px; ";
            }
            if ($("#ImageWidth").val() !== "") {
                ImgText += "width:" + $("#ImageWidth").val() + "px; ";
            }
            ImgText += "' "

            if ($("#ImageLinkHref").val() !== '') {
                image = pasteHtml("<a href='" + $("#ImageLinkHref").val() + "' target='" + $("#ImageLinkTarget").val() + "'><img " + ImgText + "></a>");
            } else {
                image = pasteHtml("<img " + ImgText + ">", false);
            }
            $(".images-modal-lg").modal('hide');
        });

        //*******END Image Section*******//

        //Handles the view source button
        $(document).on("click", "#HTMLsource", function () {
            //If in view source mode
            if ($("#HtmlViewSourceMode").is(":visible")) {
                $(".HTMLEditorBtn").removeClass("disabled");
                editorBody.innerHTML = $("#HtmlViewSourceMode").val();
                $(this).html("<i class='fa fa-code'></i> View Source");
                $("#HtmlViewSourceMode").hide();
                $("#HtmlDesignMode").show();
            } else {
                //If in design mode
                $(".HTMLEditorBtn").addClass("disabled");
                $("#HtmlViewSourceMode").val(editorBody.innerHTML);
                $(this).html("<i class='fa fa-pencil'></i> Design Mode");
                $("#HtmlDesignMode").hide();
                $("#HtmlViewSourceMode").show();
            }
        });
    }

    function saveSelection() {
        if (editor.contentWindow.getSelection) {
            sel = editor.contentWindow.getSelection();
            if (sel.getRangeAt && sel.rangeCount) {
                return sel.getRangeAt(0);
            }
        } else if (editorDoc.selection && editorDoc.selection.createRange) {
            return editorDoc.selection.createRange();
        }
        return null;
    }

    function restoreSelection(range) {
        if (range) {
            if (editor.contentWindow.getSelection) {
                sel = editor.contentWindow.getSelection();
                sel.removeAllRanges();
                sel.addRange(range);
            } else if (document.selection && range.select) {
                range.select();
            }
        }
    }

    jQuery.fn.selectText = function () {
        var body = editorBody;
        var doc = editorDoc
            , element = this[0]
            , range, selection
        ;
        if (editor.contentWindow.getSelection) {
            selection = editor.contentWindow.getSelection();
            range = doc.createRange();
            range.selectNode(element);
            selection.removeAllRanges();
            selection.addRange(range);
        } else if (body.createTextRange) {
            range = body.createTextRange();
            range.moveToElementText(element);
            range.select();
        }
    };

    function pasteHtml(html, selectPastedContent) {
        var sel, range;
        if (editor.contentWindow.getSelection) {
            // IE9 and non-IE
            sel = editor.contentWindow.getSelection();
            if (sel.getRangeAt && sel.rangeCount) {
                range = sel.getRangeAt(0);
                range.deleteContents();

                // Range.createContextualFragment() would be useful here but is
                // only relatively recently standardized and is not supported in
                // some browsers (IE9, for one)
                var el = editorDoc.createElement("div");
                el.innerHTML = html;
                var frag = editorDoc.createDocumentFragment(), node, lastNode;
                while ((node = el.firstChild)) {
                    lastNode = frag.appendChild(node);
                }
                var firstNode = frag.firstChild;
                range.insertNode(frag);

                // Preserve the selection
                if (lastNode) {
                    range = range.cloneRange();
                    range.setStartAfter(lastNode);
                    //if (selectPastedContent) {
                    //    range.setStartBefore(firstNode);
                    //} else {
                        range.collapse(true);
                    //}
                    sel.removeAllRanges();
                    sel.addRange(range);
                }
            }
        } else if ((sel = editorBody.createTextRange) && sel.type != "Control") {
            // IE < 9
            var originalRange = editorBody.createTextRange();
            originalRange.collapse(true);
            editorBody.createTextRange().pasteHTML(html);
            //if (selectPastedContent) {
            //    range = sel.createRange();
            //    range.setEndPoint("StartToStart", originalRange);
            //    range.select();
            //}
        }
    }

    //Converts an rgb(0,0,0) into a hex code #000000
    function rgb2hex(rgb) {
        var rgb = rgb.match(/^rgb\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*\)$/);
        return "#" +
         ("0" + parseInt(rgb[1], 10).toString(16)).slice(-2) +
         ("0" + parseInt(rgb[2], 10).toString(16)).slice(-2) +
         ("0" + parseInt(rgb[3], 10).toString(16)).slice(-2);
    }

    //------------END HtmlEditor Functionality------------//

    //------------LOGIN Functionality------------//
    //Needs to be here and not below so it is inside the $(document).ready(function () {}); declaration

    //Hides login elements because they are represented somewhere else 
    $(".LoginButton, .LogoutButton, .ProfileButton, .EditorButton").hide();

    //Triggers a the click of login elements that are hidden
    $(document).on("click", ".ResponsiveLogin", function () {
        $(".LoginButton").click();
    });

    $(document).on("click", ".ResponsiveLogout", function (e) {
        $(".LogoutButton").click();
        e.preventDefault();
    });

    $(document).on("click", ".ResponsiveProfile", function (e) {
        $(".ProfileButton").click();
        e.preventDefault();
    });

    $(document).on("click", ".ResponsiveEditor", function (e) {
        $(".EditorButton").click();
        e.preventDefault();
    });

    //Closes mobile menu on click (mainly used for login/logout buttons)
    $(document).on("click", ".MenuCollapse", function () {
        $('.navbar-toggle:visible').click();
    });

    //------------ENDS LOGIN Functionality------------//

});

//Defines a dialog box and if there is a ClickID creates the click listener for that ID
function DisplayDialog(ID, ClickID, AutoOpen, width, height) {
    var DialogBox = $("#" + ID).dialog({
        Height: height,
        Width: width,
        resizeable: false,
        autoOpen: AutoOpen
    });

    if (ClickID !== "") {
        $(document).on("click", "#" + ClickID, function () {
            DialogBox.dialog("open");
        });
    }
}

//------------LOGIN Functionality------------//
//Opens the dialog login box when the login button is clicked
function LoginButtonClick(LoginPanelID, ID) {
    $(document).on("click", "#" + ID, function (e) {
        $("#" + LoginPanelID).dialog("open");
        e.preventDefault();
    });
}

//Opens or closes the dialog box on call of this function
function DisplayLoginPanel(PanelID, Open) {
    if (Open) {
        $("#" + PanelID).dialog("open");
    } else {
        $("#" + PanelID).dialog("close");
    }
}

//Creates the login dialog box 
function LoginPanel(ID) {
    $("#" + ID).dialog({
        open: function(){
            $("#LoginAccordion").accordion();
        },
        appendTo: "#form1",
        autoOpen: false,
        resizable: false,
        height: 'auto',
        width: 300,
        modal: true,
        close: function () {
            $(this).dialog("close");
        },
        dialogClass: ID,
        position: {
            my: "center",
            at: "top",
            of: window
        }
    });
}

//Adds the login button to the login dialog box
function LoginButton(PanelID, ID, LoginButtonText) {
    var newBtn = [{
        text: LoginButtonText,
        id: "LoginDialogBtn",
        click: function () {
            $("#" + ID).trigger("click");
        }
    }];

    $('#' + PanelID).dialog('option', 'buttons', newBtn);

    $("#" + ID).attr("type", "submit");

    $("#" + PanelID).keypress(function (e) {
        var key = e.which;
        if (key == 13) {
            $("#LoginDialogBtn").trigger('click');
        }
    });
}

//Adds the cancel button to the login dialog box
function CancelButton(PanelID, ID, LoginButtonText) {
    var btns = $('#' + PanelID).dialog("option", "buttons");
    
    btns.push({
        ID: ID,
        name: ID,
        text: LoginButtonText,
        click: function () {
            $('#' + PanelID).dialog("close");
        }
    });

    $('#' + PanelID).dialog('option', 'buttons', btns);
}

//------------END LOGIN Functionality------------//