<table class="table table-bordered table-striped table-bottomless" id="ls-editable-table">
  <thead>
    <tr>
      <th>Date</th>
      <th>WorkSite Name</th>
      <th>User Role</th>
      <th>User Job Title</th>
      <th>User Name</th>
      

    </tr>
  </thead>
  <tbody>
     @foreach($magnetboard as $row)
    <tr>
      <td>{{ date('d/m/Y',strtotime($row->started_at)) }}</td>
      <td>{{ $row->job_name }}</td>
      <td>{{ $row->title }}</td>
      <td>{{ $row->job_title }}</td>
      <td>{{ $row->first_name }} {{ $row->last_name }}</td>
    </tr>
    @endforeach
  </tbody>
</table>