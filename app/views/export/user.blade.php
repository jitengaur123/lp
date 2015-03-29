<table class="table table-bordered table-striped table-bottomless" id="ls-editable-table">
  <thead>
    <tr>
      <th class="id_emp">Employee Id</th>
      <th>User Name</th>
      <th>Job Title</th>
      <th>Full Name</th>
      <th>Email</th>
      <th>Emergency Name</th>
      <th>Emergency Number</th>
      <th>Gender</th>
      <th>Date of birth</th>
      <th>Spouse Name</th>
      <th>address</th>
      <th>city</th>
      <th>State</th>
      <th>Postcode</th>
      <th>Country</th>
      <th>Phone Number</th>
      <th>Mobile</th>
      <th>Race</th>
      <th>About</th>
      <th>Rating</th>
      <th>Role</th>
      <th>Created On</th>
      <th class="text-center">Delete</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <td>{{ $user['user_auth_id'] }}</td>
      <td>{{ $user['user_name'] }}</td>
      <td>{{ $user['job_title'] }}</td>
      <td>{{ $user['first_name'] }} {{ $user['last_name'] }}</td>
      <td>{{ $user['email'] }}</td>
      <td>{{ $user['emergency_name'] }}</td>
      <td>{{ $user['emergency_contact_number'] }}</td>
      <td>{{ $user['gender'] }}</td>
      <td>{{ date('d/m/y', strtotime($user['dob'])) }}</td>
      <td>{{ $user['spouse_name'] }}</td>
      <td>{{ $user['address'] }}</td>
      <td>{{ $user['city'] }}</td>
      <td>{{ $user['state'] }}</td>
      <td>{{ $user['postcode'] }}</td>
      <td>{{ $user['country'] }}</td>
      <td>{{ $user['phone_number'] }}</td>
      <td>{{ $user['mobile_number'] }}</td>
      <td>{{ $user['race'] }}</td>
      <td>{{ $user['about'] }}</td>
      <td>{{ $user['rating'] }}</td>
      <td>{{ $user['userrole']['title'] }}</td>
      <td>{{ date('d/m/y', strtotime($user['created_at'])) }}</td>
      <td class="text-center">
        @if($user['deleted_at'])
          Deleted
        @endif
      </td>
     
    </tr>
    @endforeach

  </tbody>
</table>