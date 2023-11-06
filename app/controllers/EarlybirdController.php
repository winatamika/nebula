<?php

class EarlybirdController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /earlybird
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /earlybird/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$rooms = Room::all();
		return View::make('admin.earlybird', compact('rooms'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /earlybird
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(),
			array(
				'room'		=> 'required',
				'start'		=> 'required',
				'finish'	=> 'required',
				'min'		=> 'required',
				'days'		=> 'required',
				'discount'	=> 'required'
			)
		);

		if($validator->fails()) {
			return Redirect::back()
					->withErrors($validator)
					->withInput();
		}else{	
			$id 		= Input::get('room');	
			$start		= Input::get('start');
			$finish		= Input::get('finish');
			$min		= Input::get('min');
			$days		= Input::get('days');
			$discount	= Input::get('discount');

			// insert
			$earlybird = Earlybird::create(array(
				'roomtype_id'		=> $id,
				'checkin_start'		=> $start,
				'checkin_finish'	=> $finish,
				'minimum_stay'		=> $min,
				'earlybird_days'	=> $days,
				'discount'			=> $discount
			));

			if($earlybird) {
				return  Redirect::route('earlybird')
						->with('flash_message', 'Create Earlybird, Success!');
			}else{
				return  Redirect::back()
						->with('flash_message', 'Please try again');
			}
		}
	}

	/**
	 * Display the specified resource.
	 * GET /earlybird/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		$earlies = Earlybird::all();
		$rooms = Room::all();

		return View::make('admin.earlybirdlist', compact('earlies', 'rooms'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /earlybird/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$early = Earlybird::where('id', '=', $id);
		$rooms = Room::all();
		
		if($early->count()) {
			$early = $early->first();

			return View::make('admin.earlybirdedit')
					->with('early', $early)
					->with(compact('rooms'));
		}
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /earlybird/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$validator = Validator::make(Input::all(),
			array(
				'room'		=> 'required',
				'start'		=> 'required',
				'finish'	=> 'required',
				'min'		=> 'required',
				'days'		=> 'required',
				'discount'	=> 'required'
			)
		);

		if($validator->fails()) {
			return Redirect::back()
					->withErrors($validator)
					->withInput();
		}else{	
			$id 		= Input::get('id');
			$earlybird 	= Earlybird::find($id);
			$room 		= Input::get('room');	
			$start		= Input::get('start');
			$finish		= Input::get('finish');
			$min		= Input::get('min');
			$days		= Input::get('days');
			$discount	= Input::get('discount');

			//update
			$earlybird->roomtype_id			= $room;
			$earlybird->checkin_start		= $start;
			$earlybird->checkin_finish		= $finish;
			$earlybird->minimum_stay		= $min;
			$earlybird->earlybird_days		= $days;
			$earlybird->discount			= $discount;

			if($earlybird->save()) {
				return  Redirect::route('earlybird')
						->with('flash_message', 'Update Earlybird, Success!');
			}else{
				return  Redirect::back()
						->with('flash_message', 'Please try again');
			}
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /earlybird/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		$earlybird = Earlybird::find(Input::get('id'))->delete();

		if($earlybird) {
			return  Redirect::route('earlybird')
						->with('flash_message', 'Delete Earlybird, Success!');
		}else{
			return  Redirect::back()
						->with('flash_message', 'Please try again');
		}
	}

}