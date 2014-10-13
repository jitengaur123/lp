<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->string('profile_pic', 100);
			$table->bigInteger('emergency_contact_number');
			$table->enum('gender', array('male', 'female'));
			$table->time('dob');
			$table->string('spouse_name', 100);
			$table->string('address', 500);
			$table->string('city', 500);
			$table->string('postcode', 15);
			$table->string('country', 150);
			$table->string('phone_number', 15);
			$table->string('mobile_number', 15);
			$table->string('race', 15);
			$table->text('about');
			$table->text('disability');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
			//
		});
	}

}
