<?php

class PromoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /promo
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /promo/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$rooms = Room::all();
		return View::make('admin.promo', compact('rooms'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /promo
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
				'name'		=> 'required',
				'total'		=> 'required'
			)
		);

		if($validator->fails()) {
			return Redirect::back()
					->withErrors($validator)
					->withInput();
		}else{	
			$id 			= Input::get('room');	
			$start			= Input::get('start');
			$finish			= Input::get('finish');
			$name			= Input::get('name');
			$total			= Input::get('total');
			$description	= Input::get('description');

			// insert
			$promo = Promo::create(array(
				'roomtype_id'		=> $id,
				'checkin_start'		=> $start,
				'checkin_finish'	=> $finish,
				'promo_name'		=> $name,
				'total_price'		=> $total,
				'description'		=> $description
			));

			if($promo) {
				return  Redirect::route('promo')
						->with('flash_message', 'Create Promo, Success!');
			}else{
				return  Redirect::back()
						->with('flash_message', 'Please try again');
			}

			echo $description;
		}
	}

	/**
	 * Display the specified resource.
	 * GET /promo/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		$promos = Promo::all();
		$rooms = Room::all();

		return View::make('admin.promolist', compact('promos', 'rooms'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /promo/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$promo = Promo::where('id', '=', $id);
		$rooms = Room::all();
		
		if($promo->count()) {
			$promo = $promo->first();

			return View::make('admin.promoedit')
					->with('promo', $promo)
					->with(compact('rooms'));
		}
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /promo/{id}
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
				'name'		=> 'required',
				'total'		=> 'required'
			)
		);

		if($validator->fails()) {
			return Redirect::back()
					->withErrors($validator)
					->withInput();
		}else{	
			$id 			= Input::get('id');
			$promo 			= Promo::find($id);
			$room 			= Input::get('room');	
			$start			= Input::get('start');
			$finish			= Input::get('finish');
			$name			= Input::get('name');
			$total			= Input::get('total');
			$description	= Input::get('description');

			//update
			$promo->roomtype_id			= $room;
			$promo->checkin_start		= $start;
			$promo->checkin_finish		= $finish;
			$promo->promo_name			= $name;
			$promo->total_price			= $total;
			$promo->description			= $description;

			if($promo->save()) {
				return  Redirect::route('promo')
						->with('flash_message', 'Update Promo, Success!');
			}else{
				return  Redirect::back()
						->with('flash_message', 'Please try again');
			}
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /promo/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		$promo = Promo::find(Input::get('id'))->delete();

		if($promo) {
			return  Redirect::route('promo')
						->with('flash_message', 'Delete Promo, Success!');
		}else{
			return  Redirect::back()
						->with('flash_message', 'Please try again');
		}
	}

}