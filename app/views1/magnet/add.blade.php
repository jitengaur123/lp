@extends('layouts.magnet') 



@section('content')





<div class="row">

          <div class="col-md-12"> 

            <!--Top header start-->

            

            <h3 class="ls-top-header">Create New Board</h3>

            <!--Top header end --> 

            <!--Top breadcrumb start -->

            

            <ol class="breadcrumb">

              <li> <a class="fa fa-home" href="#"></a> </li>

              <li class="active">Create New Board</li>

            </ol>

            <!--Top breadcrumb start --> 

          </div>

        </div>

        <!-- Main Content Element  Start-->

        <div class="messageHere"></div>

         <div class="row">





            <div class="col-md-12 ">

                <form action="" method="get">

              <div class="row site_det"> 

                <div class="col-md-4"><label>Date</label><input class="form-control datePickerOnly dateMagnet" name="started_at" value="{{ $start_date }}" type="text"/></div>

                <div class="col-md-2">

                  <button type="submit" class="btn searchMagnetUsers ls-light-blue-btn"><i class="fa fa-arrow-right"></i> Go !</button>

                </div>



              </div>

          </form>

           



              </div><!--worksite drop box end (where the users will be dropped)-->

<div class="col-md-12 ">

    <table class="new_board">

        <tbody>

            <tr>

                <td width="200px"  valign="top" style="cursor:default;">

                    AVAILABLE

                </td>

                @foreach($worksites as $worksite)

                <td width="200px" height="True" valign="top" style="cursor:default;">

                    {{ $worksite->job_name }}

                </td>

                @endforeach

            </tr>

        </tbody>

    </table>

    <div class="magnet_loader" style="display:none;">Loading...</div>


    <div id="sortableDivs">



        <table>

            <tbody>

                <tr>

                    <td valign="top" style="cursor:default;">

                        <ul id="category299" class="connectedSortable sortableUl ui-sortable" style="list-style-type:none;padding:0px;width:200px;background:#fff;height:3000px;">

                            @foreach($users as $user)

                                @if(!in_array($user['id'], $magnetUser['users']))

                                    <li id="{{ $user['id'] }}" data-roleid="{{ $user['role'] }}" class="ui-state-default ui-sortable-handle @if($user['role'] == 3) supervisor @endif" style="margin: 5px; height: 47px;" title="">

                                        <a href="javascript:void(0);" style="color:; vertical-align: top;">

                                            <div style="float:left; padding-right: 5px">

                                                <?php $image = ($user['profile_pic'] == "")?'default.jpg':$user['profile_pic'] ?>

                                                <img src="{{ URL::asset('uploads/profile/'. $image) }}" width="47" height="47">

                                            </div>{{ $user['first_name'] }} {{ $user['last_name'] }}

                                        </a><div></div>

                                    </li>

                                 @endif

                            @endforeach

                        </ul>

                    </td>

                    @foreach($worksites as $worksite)

                    <td width="200px" height="True" valign="top" style="cursor:default;">

                        <ul id="job{{ $worksite->id }}" data-worksiteid="{{ $worksite->id }}" data-jobid="{{ $worksite->m_id }}" class="connectedSortable sortableUl ui-sortable jobdrop"  style="list-style-type:none;padding:0px;width:200px;background:#fff;height:3000px;">

                            @if(isset($magnetUser['board'][$worksite->m_id]))

                                @foreach($magnetUser['board'][$worksite->m_id] as $bUser)



                                <?php  if($bUser['user_id'] == 0) continue; ?>



                                <li id="{{ $users[$bUser['user_id']]['id'] }}" data-roleid="{{ $users[$bUser['user_id']]['role'] }}" data-worksiteid="{{ $worksite->id }}" data-jobid="{{ $worksite->m_id }}" class="ui-state-default ui-sortable-handle  @if($user['role'] == 3) supervisor @endif" style="margin: 5px; height: 47px;" title="">

                                    <a href="javascript:void(0);" style="color:; vertical-align: top;">

                                        <div style="float:left; padding-right: 5px">

                                            <?php $image = ($users[$bUser['user_id']]['profile_pic'] == "")?'default.jpg':$users[$bUser['user_id']]['profile_pic'] ?>

                                            <img src="{{ URL::asset('uploads/profile/'. $image) }}" width="47" height="47">

                                        </div>{{ $users[$bUser['user_id']]['first_name'] }} {{ $users[$bUser['user_id']]['last_name'] }}

                                    </a><div></div>

                                </li>

                                @endforeach

                            @endif

                        </ul>

                    </td>

                    @endforeach

                </tr>

            </tbody>

        </table>

    </div>

</div>



        </div>

  

       <script type="text/javascript">

       jQuery(function(){

            var worksiteid,jobid,dropStatus = true;

            var itemsUL = jQuery("#sortableDivs").find('ul.sortableUl');



            itemsUL.sortable({

                connectWith: "ul.connectedSortable",

                 revert: true,

                 beforeStop: function(a, b) {

                    var c = b["item"];

                    removeMessage();

                    if($('.magnet_loader').is(":visible")){
                      return false;
                    }


                    if(!dropStatus){                

                        MessageDisplay('error', 'Only one supervisor can be added');

                        return false;

                    }

                },

                receive: function( event, ui ) {

                     var c = ui["item"];

                     var p = ui["placeholder"];



                     var roleid = c.data('roleid'),

                         userid = c.attr('id');

                         previousjobid = c.data('jobid');



                    var data = {

                        'userid' : userid,

                        'roleid' : roleid,

                        'previousjobid' : previousjobid,

                        'jobid' : jobid,

                        'worksiteid' :worksiteid,

                        'date_started' : $('.dateMagnet').val()

                    }

                    c.attr('data-worksiteid', worksiteid);

                    $('.magnet_loader').show();

                    var url = ae.baseUrl + 'administrator/magnetboard/updateboard';

                   $.post(url, data, function(resultData){



                        if(resultData.jobid != ""){

                            $('ul#job'+worksiteid).attr('data-jobid', resultData.jobid);

                            c.attr('data-jobid', resultData.jobid);

                        }

                        if(resultData.removeJob){
                          c.removeAttr('data-jobid');
                          c.removeAttr('data-worksiteid');

                        }
                        $('.magnet_loader').hide();

                   },'json');

                },

                over: function( event, ui ) {

                     var c = ui["item"];

                     var p = ui["placeholder"];

                     /*if( c.hasClass('supervisor') ){

                         if( p.parent().find('.supervisor').length > 1  ) {

                             dropStatus = false;

                         }

                    }*/



                    worksiteid = p.parent().attr('data-worksiteid'),

                    jobid = p.parent().attr('data-jobid');



                }

            }).disableSelection();;





       })

          



       </script>

@stop



@section('head')



<title>Amaha - Create New Board</title>



   <script type="text/javascript">

        @if(Input::has('started_at'))

          window.onbeforeunload = function() {

              return 'Are You sure want to reload this page?';

          };

        @endif

        </script>

<!--Page loading plugin Start -->

    <link href="{{ URL::asset('assets/css/plugins/pace.css') }}" rel="stylesheet">

    <script src="{{ URL::asset('assets/js/pace.min.js') }}"></script><!--Page loading plugin End   -->

    <!-- Plugin Css Put Here -->

    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/jquery.remodal.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/dndTable.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/tsort.css') }}">



    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/selectize.bootstrap3.css') }}">

    <link href="{{ URL::asset('assets/css/plugins/jquery.datetimepicker.css') }}" rel="stylesheet">



    <!-- Plugin Css End -->





    <!-- Plugin Css Put Here -->

    <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/custom_smart_wizard.css') }}">



    <!-- Custom styles Style -->

    <link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- Custom styles Style End-->

    <!-- Responsive Style For-->

    <link href="{{ URL::asset('assets/css/responsive.css') }}" rel="stylesheet">







    <!-- Responsive Style For-->

    <!-- Custom styles for this template -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->

@stop



@section('footerjs')



<script type="text/javascript" src="{{ URL::asset('assets/js/lib/jquery-1.11.min.js') }}"></script>

<script type="text/javascript" src="{{ URL::asset('assets/js/lib/jquery-migrate-1.1.0.js') }}"></script>

<script type="text/javascript" src="{{ URL::asset('assets/js/jquery-ui-1.8.custom.min.js') }}"></script>

<script type="text/javascript" src="{{ URL::asset('assets/js/max_js.js') }}"></script>

<!-- Max Javascript END -->



<script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script> 

<script type="text/javascript" src="{{ URL::asset('assets/js/multipleAccordion.js') }}"></script> 

 

<!--<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>-->

<!--jqueryui for table end--> 



<!--easing Library Script Start --> 

<script src="{{ URL::asset('assets/js/lib/jquery.easing.js') }}"></script> 

<!--easing Library Script End --> 

<!--Nano Scroll Script Start -->

<script src="{{ URL::asset('assets/js/jquery.nanoscroller.min.js') }}"></script>

    <!--Nano Scroll Script End -->







<script type="text/javascript" src="{{ URL::asset('assets/js/pages/layout.js') }}"></script> 

<!--Layout Script End --> 

<!--selectize Library start-->

<script src="{{ URL::asset('assets/js/selectize.min.js') }}"></script>

<!--selectize Library End-->



<!--Select & Tag demo start-->

<script src="{{ URL::asset('assets/js/pages/selectTag.js') }}"></script>

<!--Select & Tag demo end-->





<!--Demo Wizard Script End-->

<script src="{{ URL::asset('assets/js/jquery.datetimepicker.js') }}"></script> <!-- Date & Time Picker Library Script End -->

<script src="{{ URL::asset('assets/js/pages/pickerTool.js') }}"></script> <!--Demo for Date, Time Color Picker Script End -->









<script src="{{ URL::asset('assets/js/amaha.js') }}"></script> <!--Demo for Date, Time Color Picker Script End -->





@stop