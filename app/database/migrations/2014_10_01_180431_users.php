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
		Schema::create('users', function(Blueprint $table)
		{
			//table blueprint
			$table->increments('id');
			$table->string('first_name', 100);
			$table->string('last_name', 100);
			$table->string('email', 100);
			$table->string('user_name', 100);
			$table->string('password', 100);
			$table->integer('level')->unsigned();
			$table->rememberToken();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('users');
	}

}
