<table class="table table-bordered table-striped table-bottomless" id="ls-editable-table">
    <thead>
      <tr>
        <th class="id_emp">Job No.</th>
        <th>Client</th>
        <th>Worksite</th>
        <th>Sumitted By</th>
        <th>Submitted On</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
       @foreach($reports as $report)
      <tr>
        <td>{{ $report['job_number'] }}</td>
        <td>{{ $report['client']['first_name'] }} {{ $report['client']['last_name'] }}</td>
        <td>{{ $report['worksite']['job_name'] }}</td>
        <td>{{ $report['submitby']['user_name'] }}</td>
        <td>{{ date('d/m/Y', strtotime($report['date_create'])) }}</td>
        <td>@if($report['status'] == 0) Pending @else Approved @endif</td>
       
      </tr>
      @endforeach
    </tbody>
  </table>