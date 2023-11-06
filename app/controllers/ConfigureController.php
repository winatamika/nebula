<?php

class ConfigureController extends \BaseController {

	/**
	 * Display the specified resource.
	 * GET /configure/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{

		$query = Setting::distinct()->select('conf_key as key', 'conf_value as value')->get();
		foreach ($query as $setting) {

			if($setting->key){
				if($setting->value){
					$a[$setting->key] = $setting->value;
				}else{
					$a[$setting->key] = false;
				}
			}
		}
		return View::make('admin.configure', compact('a'));	

	}

	/**
	 * Update the specified resource in storage.
	 * PUT /configure/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$validator = Validator::make(Input::all(),
			array(
				'email_notif'		=> 'required',
				'mail_server'		=> 'required',
				'mail_user'			=> 'required',
				'mail_pass'			=> 'required|min:5',
				'mail_port'			=> 'required',
				'cur_code'			=> 'required',
				'cur_symbol'		=> 'required',
				'timezone'			=> 'required',
				'tax'				=> 'required',
				'usd_idr'			=> 'required'
			)
		);

		if($validator->fails()) {
			return Redirect::back()
					->withErrors($validator)
					->withInput();
		}else{	
			
			$email_notif	= Input::get('email_notif');
			$mail_server	= Input::get('mail_server');
			$mail_user		= Input::get('mail_user');
			$mail_pass		= Input::get('mail_pass');
			$mail_port		= Input::get('mail_port');
			$cur_code		= Input::get('cur_code');
			$cur_symbol		= Input::get('cur_symbol');
			$booking_engine	= Input::get('booking_engine');
			$timezone		= Input::get('timezone');
			$min_booking	= Input::get('min_booking');
			$date_format	= Input::get('date_format');
			$room_lock		= Input::get('room_lock');
			$tax			= Input::get('tax');
			$price_include	= Input::get('price_include');
			$usd_idr		= Input::get('usd_idr');

			// update
			// $payment->gateway_name 		= $gateway;
			// $payment->account 			= $account;
			// $payment->enabled 			= $enabled;

			$set = ["conf_notification_email", "conf_mail_server", "conf_mail_username", "conf_mail_password",
					"conf_mail_port", "conf_currency_code", "conf_currency_symbol", "conf_booking_turn_off",
					"conf_hotel_timezone", "conf_min_night_booking", "conf_dateformat", "conf_booking_exptime",
					"conf_tax_amount", "conf_price_with_tax", "conf_currency_convertion_idr"];

			$value = [$email_notif, $mail_server, $mail_user, $mail_pass, $mail_port, $cur_code, $cur_symbol,
						$booking_engine, $timezone, $min_booking, $date_format, $room_lock, $tax,
						$price_include, $usd_idr];

			$i=0;
			while($i<=14){
				Setting::where('conf_key', $set[$i])
		        	    ->update(array('conf_value' => $value[$i]));
		       	$i=$i+1;
		    }
			
			return  Redirect::route('configure')
					->with('flash_message', 'Update Configure, Success!');
		
			
		}

	}

}