<?php

class PaymentController extends \BaseController {

	/**
	 * Display the specified resource.
	 * GET /payment/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		$payment = Payment::all();

		return View::make('admin.paymentgateway', compact('payment'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /payment/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$payment = Payment::where('id', '=', $id);

		if($payment->count()) {
			$payment = $payment->first();

			return View::make('admin.paymentgatewayedit')
					->with('payment', $payment);
		}

		return App::abort(404);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /payment/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$validator = Validator::make(Input::all(),
			array(
				'gateway'		=> 'required|max:20'
			)
		);

		if($validator->fails()) {
			return Redirect::back()
					->withErrors($validator)
					->withInput();
		}else{	
			$id 		= Input::get('id');	
			$payment 	= Payment::find($id);

			$gateway	= Input::get('gateway');
			$account	= Input::get('account');
			$enabled	= Input::get('enabled');

			// update
			$payment->gateway_name 		= $gateway;
			$payment->account 			= $account;
			$payment->enabled 			= $enabled;

			if($payment->save()) {
				return  Redirect::route('payment-gateway')
						->with('flash_message', 'Update Payment Gateway, Success!');
			}else{
				return  Redirect::back()
						->with('flash_message', 'Please try again');
			}
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /payment/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}