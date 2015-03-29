<table class="table table-bordered table-striped table-bottomless" id="ls-editable-table">
<thead>
<tr>
<th class="id_emp">Client Id</th>
<th>Company Name</th>
<th>Client Name</th>
<th>Office Phone</th>
<th>Mobile 1</th>
<th>Mobile 2</th>
<th>Email</th>
<th>Fax</th>
<th>Address</th>
<th>City</th>
<th>State</th>
<th>Postal Code</th>
<th>Created On</th>
</tr>
</thead>
<tbody>
@foreach($clients as $client)
<tr>
<td>{{ $client['client_auto_id'] }}</td>
<td>{{ $client['company_name'] }}</td>
<td>{{ $client['first_name'] }} {{ $client['last_name'] }}</td>
<td>{{ $client['phone_office'] }}</td>
<td>{{ $client['mobile1'] }}</td>
<td>{{ $client['mobile2'] }}</td>
<td>{{ $client['email'] }}</td>
<td>{{ $client['fax'] }}</td>
<td>{{ $client['address'] }}</td>
<td>{{ $client['city'] }}</td>
<td>{{ $client['state'] }}</td>
<td>{{ $client['postal_code'] }}</td>
<td>{{ date('d/m/Y', strtotime($client['created_at'])) }}</td>

</tr>
@endforeach
</tbody>
</table>

