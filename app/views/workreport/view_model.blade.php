<div class="row">
    <div class="col-md-12">
      <h2>Client : {{ $report['client']['company_name'] }}</h2>
      <h3>Worksite : {{ $report['worksite']['job_name'] }}</h3>
      <div class="col-md-6 details_right">
        <p>Job No.: {{ $report['job_number'] }}</p>
        <p>Submitted By: {{ $report['submitby']['user_name'] }}</p>
        <p>Status : @if($report['status'] ==0)Pending @else Approved @endif</p>
        <p>Total Amount : ${{ $total }}</p>
        
      </div>

      <div class="col-md-6 details_left">
        <p>Submitted On: {{ date('d/m/Y', strtotime($report['date_create'])) }}</p>
        <h2>Site Address</h2>
        <address>
        {{ $report['worksite']['address'] }}, {{ $report['worksite']['city'] }}<br>
        {{ $report['worksite']['state'] }}, {{ $report['worksite']['country'] }} {{ $report['worksite']['postal_code'] }} 
        </address>
      </div>
    </div>
  </div>

  <div class="row">
    @foreach($report['timesheet'] as  $timesheet)
    <table class="table table-bordered table-striped table-bottomless">
        <thead>
          <tr>
            <th class="id_emp">Labor</th>
            <th>Class</th>
            <th>Reg Hours</th>
            <th>Reg Rate</th>
            <th>Amount</th>
            
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>{{$timesheet['labor']['user_name']}}</td>
            <td>{{$timesheet['class']}}</td>
            <td>{{$timesheet['reg_hour']}}</td>
            <td>{{$timesheet['reg_rate']}}</td>
            <td>{{ $timesheet['reg_hour']*$timesheet['reg_rate'] }}</td>
            
          </tr>
          <tr>
            <th class="id_emp"></th>
            <th></th>
            <th>OT Hours</th>
            <th>OT Rate</th>
            <th>Amount</th>
            
          </tr>
        
        
          <tr>
            <td></td>
            <td></td>
            <td>{{$timesheet['ot_hour']}}</td>
            <td>{{$timesheet['ot_rate']}}</td>
            <td>{{$timesheet['ot_hour']*$timesheet['ot_rate'] }}</td>
            
          </tr>

          <tr>
            <th class="id_emp"></th>
            <th></th>
            <th>DT Hours</th>
            <th>DT Rate</th>
            <th>Amount</th>
            
          </tr>
        
        
          <tr>
            <td></td>
            <td></td>
          <td>{{$timesheet['dt_hour']}}</td>
            <td>{{$timesheet['dt_rate']}}</td>
            <td>{{$timesheet['dt_hour']*$timesheet['dt_rate'] }}</td>
            
          </tr>

        </tbody>
    </table>
    @endforeach
    
  </div>

  <div class="row">
    <div class="col-md-12">
        <p>Comment : {{ $report['description'] }}</p>
    </div>
  </div>
<br>
<a class="remodal-cancel ls-red-btn btn" href="#">Close</a> 
<a class="remodal-confirm ls-light-green-btn btn editButton" href="{{ URL::to(Config::get('constants.PREFIX').'/workreport/'.$report['id'].'/edit') }}">Update/Edit Report</a>
@if(Auth::user()->role == 1 || Auth::user()->role == 2)
<a class=" ls-blue-btn btn" href="{{ URL::to(Config::get('constants.PREFIX').'/workreport/approve/'.$report['id']) }}">Mark As Approved</a>
@endif