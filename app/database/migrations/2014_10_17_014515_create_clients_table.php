<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients', function(Blueprint $table)
		{
			$table->increments('id')->unique();
			$table->string('first_name');
			$table->string('last_name');
			$table->string('title');
			$table->string('street_addr');
			$table->string('city');
			$table->string('province');
			$table->string('zip');
			$table->string('country');
			$table->string('phone');
			$table->string('fax');
			$table->string('email');
			$table->string('additional_comments');
			$table->string('ip');
			$table->string('existing_client');
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
		Schema::drop('clients');
	}

}
