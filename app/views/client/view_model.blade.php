 <div class="col-md-4 details_left">
    <h2>{{ $client['first_name'] }} {{ $client['last_name'] }}</h2>
    
    <p>Client Id : {{ $client['client_auto_id'] }}</p>
    <p>Company Name : {{ $client['company_name'] }}</p>
    <h3>Address</h3>
    <address>
        <i class="fa fa-map-marker"></i>
        {{ $client['address'] }}, {{ $client['city'] }}<br>
        {{ $client['state'] }}, {{ $client['country'] }} {{ $client['postal_code'] }} <br>               
    </address>
    <p><i class="fa fa-phone"></i> Phone (Office): {{ $client['phone_office'] }}</p>
    <p><i class="fa fa-mobile"></i> Phone (mobile 1): {{ $client['mobile1'] }}</p>
    <p><i class="fa fa-mobile"></i> Phone (mobile 2): {{ $client['mobile2'] }}</p>
    <p>Account Created On : <?php echo date('d/m/Y', strtotime($client['created_at'])); ?></p>
</div>
<div class="col-md-5 ls-user-details">
    <h2>Date Of Joining: <?php echo date('d/m/Y', strtotime($client['created_at'])); ?></h2>
    <p><i class="fa fa-envelope"></i> Email: {{ $client['email'] }}</p>
    <p>Fax : {{ $client['fax'] }}</p>
  
   
    <div class="ls-user-links">
    
    </div>

</div>
<br>
<a class="remodal-cancel ls-red-btn btn" href="#">Close</a> 
<a class="remodal-confirm ls-light-green-btn btn editButton" href="{{ URL::to(Config::get('constants.PREFIX').'/client/'.$client['id'].'/edit') }}">Update/Edit Client</a>
