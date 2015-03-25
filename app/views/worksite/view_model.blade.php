 <div class="col-md-4 details_left">
    <h2>{{ $worksite['job_name'] }}</h2>
    <p>Site Id : {{ $worksite['work_auto_id'] }}</p>
    <p>Started at : {{ date('d/m/Y', strtotime($worksite['started_at'])) }}</p>
    <h3>Address</h3>
    <address>
        <i class="fa fa-map-marker"></i>
        {{ $worksite['address'] }}, {{ $worksite['city'] }}<br>
        {{ $worksite['state'] }}, {{ $worksite['country'] }} {{ $worksite['postal_code'] }} <br>               
    </address>

    <p>Worksite Created On : <?php echo date('d/m/Y', strtotime($worksite['created_at'])); ?></p>

</div>
<div class="col-md-5 ls-user-details">
    <h2>Client: {{ $worksite['client']['company_name'] }} </h2>
    <p>Description: {{ $worksite['description'] }}</p>
    
    <p>General Foreman Rate: {{ $worksite['general_foreman_rate'] }}</p>
    <p>Foreman Rate: {{ $worksite['foreman_rate'] }}</p>
    <p>Journeyman Rate: {{ $worksite['journyman_rate'] }}</p>
    <p>Apprentice Rate: {{ $worksite['apprentice_rate'] }}</p>
    
    <p>OCIP : {{ $worksite['ocip'] }}</p>
    <p>PM : {{ $worksite['pm'] }}</p>
    <p>Billing Type : {{ $worksite['billing_type'] }}</p>
    <p>CERT PR : {{ $worksite['cret_pr'] }}</p>
  
   
    <div class="ls-user-links">
    
    </div>

</div>
<br>
<a class="remodal-cancel ls-red-btn btn" href="#">Close</a> 
<a class="remodal-confirm ls-light-green-btn btn editButton" href="{{ URL::to(Config::get('constants.PREFIX').'/worksite/'.$worksite['id'].'/edit') }}">Update/Edit Worksite</a>
