<h2>{{$user['first_name']}} {{$user['last_name']}}</h2>
<div class="col-md-6 details_left">
<p>Position/Job Title : {{ $user['userrole']['title'] }}</p>
<p>User Role : {{ $user['userrole']['name'] }}</p>
<p>Employee Id : {{ $user['user_auth_id'] }}</p>
<h2>Address</h2>
<address>
{{ $user['address'] }}, {{ $user['city'] }}<br>
{{ $user['state'] }}, {{ $user['country'] }} {{ $user['postcode'] }}
</address>

<p>Phone (Home): {{ $user['phone_number'] }}</p>
<p>Phone (mobile): {{ $user['mobile_number'] }}</p>
<p>Account Created On : {{ date('d/m/Y', strtotime($user['created_at'])) }}</p>
<p>Emergency Contact Number : {{ $user['emergency_contact_number'] }}</p>
<p>Date Of Birth : {{ date('m/d/Y', strtotime($user['dob'])) }}</p>
<p>Name Of Spouse : {{ $data['spouse_name'] }}</p>
<div class="meta-details"> <span>last edited by : <a href="#">John Doe</a></span> <br/>
  <span>last updated on:13/01/2013</span> </div>
</div>
<div class="col-md-6 details_left">
<h2>Date Of Joining: {{ date('d/m/Y', strtotime($user['created_at'])) }}</h2>
<p><a href="#">Supervisor : None</a></p>
<p>About : {{ $data['about'] }} </p>
<p>Email: {{ $data['email'] }}</p>
<p>Disabilities : <?php if(!empty($data['disability'])) implode(', ',json_decode($data['disability'], true)); else echo 'No, I do not have a disability'; ?></p>
 <p>Race : {{ $data['race'] }}</p>
 <p>Gender : {{ $data['gender'] }}</p>
  <?php if(!empty($data['veterun_status'])): ?>
    <p>Veteran Status : <?php  implode(', ', json_decode($data['veterun_status'], true)); ?></p>
<?php endif; ?>
</div>