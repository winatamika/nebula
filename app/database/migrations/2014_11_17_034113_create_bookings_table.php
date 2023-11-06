<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bookings', function(Blueprint $table)
		{
			$table->increments('id')->unique();
			$table->datetime('booking_time');
			$table->datetime('start_date');
			$table->datetime('end_date');
			$table->integer('client_id');
			$table->integer('child_count');
			$table->integer('extra_guest_count');
			$table->string('discount_coupon');
			$table->decimal('total_cost');
			$table->decimal('payment_amount');
			$table->string('payment_type');
			$table->integer('payment_success');
			$table->string('payment_txnid');
			$table->string('paypal_email');
			$table->integer('special_id');
			$table->text('special_requests');
			$table->integer('is_block');
			$table->integer('is_deleted');
			$table->string('block_name');
			$table->string('note');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bookings');
	}

}
