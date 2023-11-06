<?php

class NewsletterController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /newsletter
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /newsletter/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /newsletter
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /newsletter/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		return View::make('admin.newsletter');
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /newsletter/{id}/edit
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
	 * PUT /newsletter/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{

		$validator = Validator::make(Input::all(),
			array(
				'subject'		=> 'required|max:50',
				'content'		=> 'required'
			)
		);

		if($validator->fails()) {
			return Redirect::back()
					->withErrors($validator)
					->withInput();
		}else{	
			$subject	= Input::get('subject');
			$content	= Input::get('content');

			$clients = Clients::all();

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

			foreach ($clients as $client) {

				$nama = $client->title.".".$client->first_name." ".$client->last_name;

				Mail::send('emails.auth.newsletterformat', array('content' => $content, "name" => $nama, "subject" => $subject, "hotel" => $a['conf_hotel_name'], "address" => $a['conf_hotel_streetaddr']),
					function($message) use ($client)
					{
						$message->to($client->email, $client->title.".".$client->first_name." ".$client->last_name)
								->subject('Nebula System');
				});			

			}

			return  Redirect::route('newsletter')
						->with('flash_message', 'Send News Letter, Success!');
		}

		return  Redirect::route('newsletter')
						->with('flash_message', 'Please Try Again!');

		
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /newsletter/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}