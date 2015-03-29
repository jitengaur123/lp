 <table class="table table-bordered table-striped table-bottomless" id="ls-editable-table">
<thead>
<tr>
<th class="id_emp">Worksite Id</th>
<th>Job Name</th>
<th>Client Name</th>
<th>General Foreman Rate</th>
<th>Foreman Rate</th>
<th>Journyman Rate</th>
<th>Apprentice Rate</th>
<th>Description</th>
<th>Address</th>
<th>City</th>
<th>State</th>
<th>Post Code</th>
<th>OCIP</th>
<th>PM</th>
<th>Billing Type</th>
<th>CRET PRr</th>
<th>Date</th>
</tr>
</thead>
<tbody>
@foreach($worksites as $site)
<tr>
<td>{{ $site['work_auto_id'] }}</td>
<td>{{ $site['job_name'] }}</td>
<td>{{ $site['client']['first_name'] }} {{ $site['client']['last_name'] }}</td>
<td>{{ $site['general_foreman_rate'] }}</td>
<td>{{ $site['foreman_rate'] }}</td>
<td>{{ $site['journyman_rate'] }}</td>
<td>{{ $site['apprentice_rate'] }}</td>
<td>{{ $site['description'] }}</td>
<td>{{ $site['address'] }}</td>
<td>{{ $site['city'] }}</td>
<td>{{ $site['state'] }}</td>
<td>{{ $site['postal_code'] }}</td>
<td>{{ $site['ocip'] }}</td>
<td>{{ $site['pm'] }}</td>
<td>{{ $site['billing_type'] }}</td>
<td>{{ $site['cret_pr'] }}</td>
<td>{{ date('d/m/Y', strtotime($site['started_at'])) }}</td>

</tr>
@endforeach
</tbody>
</table>