<?php

class LastminuteController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /lastminute
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /lastminute/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$rooms = Room::all();
		return View::make('admin.lastminute', compact('rooms'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /lastminute
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
			$lastminute = Lastminute::create(array(
				'roomtype_id'		=> $id,
				'checkin_start'		=> $start,
				'checkin_finish'	=> $finish,
				'minimum_stay'		=> $min,
				'lastminute_days'	=> $days,
				'discount'			=> $discount
			));

			if($lastminute) {
				return  Redirect::route('lastminute')
						->with('flash_message', 'Create Lastminute, Success!');
			}else{
				return  Redirect::back()
						->with('flash_message', 'Please try again');
			}
		}
	}

	/**
	 * Display the specified resource.
	 * GET /lastminute/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		$lasts = Lastminute::all();
		$rooms = Room::all();

		return View::make('admin.lastminutelist', compact('lasts', 'rooms'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /lastminute/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$last = Lastminute::where('id', '=', $id);
		$rooms = Room::all();
		
		if($last->count()) {
			$last = $last->first();

			return View::make('admin.lastminuteedit')
					->with('last', $last)
					->with(compact('rooms'));
		}
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /lastminute/{id}
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
			$lastminute = Lastminute::find($id);
			$room 		= Input::get('room');	
			$start		= Input::get('start');
			$finish		= Input::get('finish');
			$min		= Input::get('min');
			$days		= Input::get('days');
			$discount	= Input::get('discount');

			//update
			$lastminute->roomtype_id		= $room;
			$lastminute->checkin_start		= $start;
			$lastminute->checkin_finish		= $finish;
			$lastminute->minimum_stay		= $min;
			$lastminute->lastminute_days	= $days;
			$lastminute->discount			= $discount;

			if($lastminute->save()) {
				return  Redirect::route('lastminute')
						->with('flash_message', 'Update Lastminute, Success!');
			}else{
				return  Redirect::back()
						->with('flash_message', 'Please try again');
			}
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /lastminute/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		$lastminute = Lastminute::find(Input::get('id'))->delete();

		if($lastminute) {
			return  Redirect::route('lastminute')
						->with('flash_message', 'Delete Lastminute, Success!');
		}else{
			return  Redirect::back()
						->with('flash_message', 'Please try again');
		}
	}

}