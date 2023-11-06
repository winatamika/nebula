<?php

class EmailController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /email
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /email/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /email
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /email/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		$emails = Emails::all();

		return View::make('admin.emailcontent', compact('emails'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /email/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$emails = Emails::where('id', '=', $id);

		if($emails->count()) {
			$emails = $emails->first();

			return View::make('admin.emailcontentedit')
					->with('emails', $emails);
		}
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /email/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$validator = Validator::make(Input::all(),
			array(
				'subject'		=> 'required|max:60',
				'content'		=> 'required'
			)
		);

		if($validator->fails()) {
			return Redirect::back()
					->withErrors($validator)
					->withInput();
		}else{	
			$id 		= Input::get('id');	
			$email 	= Emails::find($id);
			$subject	= Input::get('subject');
			$content	= Input::get('content');

			// update
			$email->email_subject 		= $subject;
			$email->email_html 			= $content;

			if($email->save()) {
				return  Redirect::route('email')
						->with('flash_message', 'Update Email Content, Success!');
			}else{
				return  Redirect::back()
						->with('flash_message', 'Please try again');
			}
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /email/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}