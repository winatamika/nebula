<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmailContentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('email_contents', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('email_name');
			$table->string('email_subject');
			$table->string('email_text');
			$table->string('email_html');
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
		Schema::drop('email_contents');
	}

}
