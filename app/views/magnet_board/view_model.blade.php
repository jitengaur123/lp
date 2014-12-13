
 <div class="col-md-4 details_left">
    <p>Date : {{ date('d/m/Y', strtotime($Magnetboard['started_at'])) }}</p>
    <h2>Client: {{ $Magnetboard['client']['company_name'] }} </h2>
    <p>Work Site: {{ $Magnetboard['worksite']['job_name'] }}</p>

</div>
<div class="clear"></div>
<div class="ls-editable-table table-responsive ls-table">

    <table class="table table-bordered table-striped table-bottomless" id="ls-editable-table">
    <thead>
      <tr>
        <th class="id_emp">Employee Id</th>
        <th>User Name</th>
        <th>Full Name</th>
        <th>Job Title</th>
        <th>Timings</th>
        <th>Created On</th>
      </tr>
    </thead>
    <tbody>
      @foreach($MagnetboardUser as $user)
      <tr>
        <td>{{ $user['users']['user_auth_id'] }}</td>
        <td>{{ $user['users']['user_name'] }}</td>
        <td>{{ $user['users']['first_name'] }} {{ $user['users']['last_name'] }}</td>
        <td>{{ $user['users']['userrole']['title'] }}</td>
        <td>{{ $user['start_time'] }}-{{$user['end_time']}}</td>
        <td>{{ date('d/m/y', strtotime($user['users']['created_at'])) }}</td>
      
      </tr>
      @endforeach

    </tbody>
    </table>
</div>
<br>
<a class="remodal-cancel ls-red-btn btn" href="#">Close</a> 
<a class="remodal-confirm ls-light-green-btn btn editButton" href="{{ URL::to(Config::get('constants.PREFIX').'/magnet/'.$Magnetboard['id'].'/edit') }}">Update/Edit Magnet Board</a>
