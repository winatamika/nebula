<?php

class CustomerController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /customer
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	public function getName($id)
	{
		$names = Clients::where('id' , '=', $id)->get();
		foreach ($names as $name){
				echo $name->title." ".$name->first_name." ".$name->lastname;
		}
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /customer/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /customer
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /customer/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		$clients = Clients::all();

		return View::make('admin.customer', compact('clients'));
	}

		public function showbooking($id)
	{
	$listBookings = Bookings::where('client_id', '=', $id  )->get();
	$memberName = Clients::where('id' , '=', $id)->get();
	return View::make('admin.customer-booking', compact('listBookings', 'memberName'));
	}

		public function showdetailbooking($id)
	{
	$listDetails = Invoice::where('booking_id', '=', $id  )->get();
	return View::make('admin.customer-detail', compact('listDetails'));
	}

		public function deletebooking($id)
	{
	$booking_id = $id;
	Bookings::where("booking_id", $booking_id)->delete();
    Reservation::where("booking_id", $booking_id)->delete();
		$clients = Clients::all();
		return View::make('admin.customer', compact('clients'));

	}

		public function cancelbooking($id){
	DB::update('update bookings set payment_success = 0 where booking_id = ?', array($id));
	$clients = Clients::all();
		return View::make('admin.customer', compact('clients'));

		}

	/**
	 * Show the form for editing the specified resource.
	 * GET /customer/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$client = Clients::where('id', '=', $id);

		if($client->count()) {
			$client = $client->first();

			return View::make('admin.customeredit')
					->with('client', $client);

		}else{
			return View::make('admin.customer')
					->with('flash_message', 'Please try again')
					->withInput();
		}

		
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /customer/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$validator = Validator::make(Input::all(),
			array(
				'fname'		=> 'required|max:30',
				'lname'		=> 'required|max:30',
				'street'	=> 'required',
				'city'		=> 'required|max:20',
				'province'	=> 'required|max:20',
				'zip'		=> 'required|max:20',
				'country'	=> 'required|max:20',
				'phone'		=> 'required|max:20'
			)
		);

		if($validator->fails()) {
			return Redirect::back()
					->withErrors($validator)
					->withInput();
		}else{	
			$id 		= Input::get('id');	
			$client 	= Clients::find($id);
			$title		= Input::get('title');
			$fname		= Input::get('fname');
			$lname		= Input::get('lname');
			$street		= Input::get('street');
			$city		= Input::get('city');
			$province	= Input::get('province');
			$zip		= Input::get('zip');
			$country	= Input::get('country');
			$phone		= Input::get('phone');
			$fax		= Input::get('fax');

			// update
			$client->first_name 		= $fname;
			$client->last_name 			= $lname;
			$client->title 				= $title;
			$client->street_addr 		= $street;
			$client->city 				= $city;
			$client->province 			= $province;
			$client->zip 				= $zip;
			$client->country 			= $country;
			$client->phone 				= $phone;
			$client->fax 				= $fax;			

			if($client->save()) {
				return  Redirect::route('customer')
						->with('flash_message', 'Update Customer, Success!');
			}else{
				return  Redirect::back()
						->with('flash_message', 'Please try again');
			}
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /customer/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}