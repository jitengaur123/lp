<div class="row">
  <div class="col-md-12 ">
    <h2>{{$user['first_name']}} {{$user['last_name']}}, {{ $user['job_title'] }}</h2>
	<div class="col-md-6 details_left">
	@if(isset($user['profile_pic']))
     <img width="256" height="256" src="{{URL::asset('uploads/profile/'.$user['profile_pic']) }}">
    @else
    <img width="256" height="256" src="{{URL::asset('assets/images/demo/avatar.png') }}">
    @endif
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
	<p>Emergency Contact Name : {{ $user['emergency_contact_name'] }}</p>
	<p>Emergency Contact Number : {{ $user['emergency_contact_number'] }}</p>
	<p>Date Of Birth : {{ date('m/d/Y', strtotime($user['dob'])) }}</p>
	<p>Name Of Spouse : {{ $user['spouse_name'] }}</p>
	<!-- <div class="meta-details"> <span>last edited by : <a href="#">John Doe</a></span> <br/>
	  <span>last updated on:13/01/2013</span> </div> -->
	</div>
	<div class="col-md-6 details_left">
	<h2>Date Of Joining: {{ date('d/m/Y', strtotime($user['created_at'])) }}</h2>
	<p><a href="#">Supervisor : None</a></p>
	<p>About : {{ $user['about'] }} </p>
	<p>Email: {{ $user['email'] }}</p>
	<p>Disabilities : <?php $disability = $user['disability']; if(!empty($user['disability']) && is_array($disability)) implode(', ',json_decode($user['disability'], true)); else echo 'No, I do not have a disability'; ?></p>
	 <p>Race : {{ $user['race'] }}</p>
	 <p>Gender : {{ $user['gender'] }}</p>

	 @if($user['user_role'] == 1)
	 <p>Rating: {{ $user['rating'] }}</p>
     <p>Note: {{ $user['user_note'] }}</p>
	 
		
		@if(!empty($user['certificate']) && $user['has_certificate'])
		 	@foreach($user['certificate'] as $certificate)
				<p>Title: {{ $certificate['title'] }}</p>
	     		<p>Date of Completion: {{ date('d/m/Y', strtotime($certificate['date_of_completion'])) }}</p>
	     		<p>Date of Expiration: {{ date('d/m/Y', strtotime($certificate['date_of_expiration'])) }}</p>
	     		<p>File: <a target="_blank" href="{{URL::asset('/files/'.$user['user_name'].'/'.$certificate['files']) }}">Download</a></p>
		 	@endforeach
		@endif
	@endif

	  <?php $veterun_status = $user['veterun_status']; if(!empty($user['veterun_status']) && is_array($veterun_status)): ?>
	    <p>Veteran Status : <?php  implode(', ', json_decode($user['veterun_status'], true)); ?></p>
	<?php endif; ?>
	</div>
  </div>
</div>
<br>
<a class="remodal-cancel ls-red-btn btn" href="#">Close</a> 
<a class="remodal-confirm ls-light-green-btn btn editButton" href="{{ URL::to(Config::get('constants.PREFIX').'/edituser/'.$user['id']) }}">Edit User Profile</a>
