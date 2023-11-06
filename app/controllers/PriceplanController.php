<?php

class PriceplanController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$thePriceplan = DB::select('select * from rooms, priceplan where rooms.id = priceplan.room_id');
		$Roomlist= Room::Lists('name_room','id');
		return View::make('priceplan.index',array('thePriceplan'=>$thePriceplan , 'Roomlist' => $Roomlist));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$Roomlist= Room::Lists('name_room','id');
		return View::make('priceplan.create')->with('Roomlist',$Roomlist);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$rules = array(
			'room_id' => 'required',
			'start_date' => 'required',
			'end_date' => 'required',
			'sun' => 'required',
			'mon' => 'required',
			'tue'=>'required',
			'wed' => 'required',
			'thu' => 'required',
			'fri'=>'required',
			'sat'=> 'required'
			);

$room_id = Input::get('room_id');
$start_date = Input::get('start_date');
$end_date = Input::get('end_date');
$pricescan = DB::select('select * from priceplan where room_id='.$room_id.' and "'.$start_date.'" between start_date and end_date ');

if (empty($pricescan))
{
		$priceinfo = Input::all();
		$validation = Validator::make($priceinfo, $rules);
		if($validation->passes()){
			Priceplan::create($priceinfo);
			return Redirect::route('priceplan.index')
				->withInput()
				->withErrors($validation)
				->with('message', 'success create priceplan');

		}
		   //show error message
      return Redirect::route('priceplan.create')
           ->withInput()
           ->withErrors($validation)
           ->with('message', 'Some fields are incomplete.');
} 
else{
     return Redirect::route('priceplan.create')
           ->with('message', 'There are same data.');
}
/*

  */
      

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		$processprice = Input::get('priceid');
		if($processprice != "select"){
		$thePriceplan = DB::select('select * from rooms, priceplan where rooms.id = priceplan.room_id and priceplan.room_id = '.$processprice.'');
		$Roomlist= Room::Lists('name_room','id');
		return View::make('priceplan.show',array('thePriceplan'=>$thePriceplan , 'Roomlist' => $Roomlist));
		}
		else {
			return View::make('priceplan.null');
		}
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$price = Priceplan::find($id);
		 if (is_null($price))
        {
            return Redirect::route('priceplan.index');
        }
        //redirect to update form

        $Roomlist= Room::Lists('name_room','id');
        return View::make('priceplan.edit', compact('price'))->with('Roomlist',$Roomlist);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		    //create a rule validation
    		$rules = array(
		
			'room_id' => 'required',
			'start_date' => 'required',
			'end_date' => 'required',
			'sun' => 'required',
			'mon' => 'required',
			'tue'=>'required',
			'wed' => 'required',
			'thu' => 'required',
			'fri'=>'required',
			'sat'=> 'required'
			);

        $priceinfo = Input::all();
        $validation = Validator::make($priceinfo, $rules);
        if ($validation->passes())
        {
            $priceupdate = Priceplan::find($id);
            $priceupdate->update($priceinfo);
            return Redirect::route('priceplan.index')
                ->withInput()
                ->withErrors($validation)
                ->with('message', 'Successfully updated Book.');
        }
        return Redirect::route('priceplan.edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		        Priceplan::find($id)->delete();
        return Redirect::route('priceplan.index')
            ->withInput()
            ->with('message', 'Successfully deleted Book.');
	}


}
