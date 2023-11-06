<?php

class ProfileController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /profile
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /profile/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /profile
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /profile/{id}
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
		return View::make('admin.profile', compact('a'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /profile/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /profile/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$validator = Validator::make(Input::all(),
			array(
				'hotel_name'	=> 'required',
				'address'		=> 'required',
				'city'			=> 'required',
				'state'			=> 'required',
				'country'		=> 'required',
				'zip'			=> 'required',
				'phone'			=> 'required',
				'email'			=> 'required'
			)
		);

		if($validator->fails()){
			return Redirect::back()
					->withErrors($validator)
					->withInput();
		}else{
			$hotel_name		= Input::get('hotel_name');
			$address		= Input::get('address');
			$city			= Input::get('city');
			$state			= Input::get('state');
			$country		= Input::get('country');
			$zip			= Input::get('zip');
			$phone			= Input::get('phone');
			$fax			= Input::get('fax');
			$email			= Input::get('email');

			$set = ["conf_hotel_name", "conf_hotel_streetaddr", "conf_hotel_city", "conf_hotel_state",
					"conf_hotel_country", "conf_hotel_zipcode", "conf_hotel_phone", "conf_hotel_fax",
					"conf_hotel_email"];

			$value = [$hotel_name, $address, $city, $state, $country, $zip, $phone, $fax, $email];

			$i=0;
			while($i<=8){
				Setting::where('conf_key', $set[$i])
		        	    ->update(array('conf_value' => $value[$i]));
		       	$i=$i+1;
		    }
			
			return  Redirect::route('profile')
					->with('flash_message', 'Update Profile, Success!');
		}

		
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /profile/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}