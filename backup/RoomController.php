<?php

class RoomController extends \BaseController { 
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		 //get all Room list
        $roomsList=Room::all();
        return View::make('rooms.index',compact('roomsList'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		 //add new ROOM form
       return View::make('rooms.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	
		$validator = Validator::make(Input::all(),
      array(
        'name_room'       =>'required',
        'adult_capacity'  =>'required',
        'child_capacity'  =>'required',
        'facility'        =>'required',
        'image'           =>'image',
        'count'           =>'required'
      )
    );
    
    if($validator->fails()) {
      return Redirect::back()
          ->withErrors($validator)
          ->withInput();
    }else{
          //get all book information
          $roomInfo = Input::all();


          $image = Input::file('image');
          $filename = $image->getClientOriginalName();
          $name_room = Input::get('name_room');
          $adult_capacity = Input::get('adult_capacity');
          $child_capacity = Input::get('child_capacity');
          $facility = Input::get('facility');
          $count = Input::get('count');

          $room = new Room;
          $room->name_room = $name_room;
          $room->adult_capacity = $adult_capacity;
          $room->child_capacity = $child_capacity;
          $room->facility = $facility;
          $room->image = $filename;
          $room->count = $count;

            $destinationPath = 'uploads/';
          $uploadSuccess = Input::file('image')->move($destinationPath, $filename);

          $thesave = $room->save();
          if($thesave){
            $this->regular_priceplan();

                return  Redirect::route('rooms.index')
                        ->with('flash_message', 'Successfully created room.');
                  
          }

      } //else
      //show error message
      return  Redirect::route('rooms.create')
            ->withInput()
            ->withErrors($validation)
            ->with('flash_message', 'Please Try Again!');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

  public function regular_priceplan(){

    $max_id = DB::select('select MAX(id) as maxid from rooms');
    foreach ($max_id as $idroom){
      $roomid = $idroom->maxid;
    }
          $start_date  = '0000-00-00';
          $end_date  = '0000-00-00';
          $sun = '0';
          $mon = '0';
          $tue = '0';
          $wed = '0';
          $thu = '0';
          $fri = '0';
          $sat = '0';
          $default_plan = '1';

      Priceplan::create(array('room_id' => $roomid , 'start_date' => $start_date ,'end_date' => $end_date , 'sun' => $sun , 'mon' => $mon , 'tue' => $tue , 'wed' => $wed , 'thu' => $thu , 'fri' => $fri , 'sat' => $sat , 'default_plan' =>$default_plan ));
  }
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		   //get the current book by id
        $room = Room::find($id);
        if (is_null($room))
        {
            return Redirect::route('rooms.index');
        }
        //redirect to update form
        return View::make('rooms.edit', compact('room'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		    $validator = Validator::make(Input::all(),
            array(
              'name_room'=>'required',
              'adult_capacity'=>'required',
              'child_capacity'=>'required',
              'facility'=>'required',
              'image'=>'image',
              'count' => 'required'
            )
        );

        if($validator->fails()) {
              return Redirect::back()
                  ->withErrors($validator)
                  ->withInput();
        }else{

          	//new
            $id               = Input::get('id');
            $image            = Input::file('image');
            $filename         = $image->getClientOriginalName();
            $name_room        = Input::get('name_room');
            $adult_capacity   = Input::get('adult_capacity');
            $child_capacity   = Input::get('child_capacity');
            $facility         = Input::get('facility');
            $count            = Input::get('count');
             

            if($image != ''){
           	    $destinationPath = 'uploads/';
                $uploadSuccess = Input::file('image')->move($destinationPath, $filename);
                $filename = $image->getClientOriginalName();

                $roomz = array(
                  'name_room'       =>	$name_room,
                  'adult_capacity'  => $adult_capacity,
                  'child_capacity'  => $child_capacity,
                  'facility'        => $facility ,
                  'image'           => $filename,
                  'count'           => $count
                );

            }else{
                $roomz = array(
                  'name_room'       =>	$name_room,
                  'adult_capacity'  => $adult_capacity,
                  'child_capacity'  => $child_capacity,
                  'facility'        => $facility ,
                  'count'           => $count
                );    

            }

             
            //$room = new Room; 
            $room = Room::find($id);
            $room->update($roomz);
            //end new 

            return  Redirect::route('rooms')
                  ->with('flash_message', 'Successfully updated Room.');
        }
        return  Redirect::back()
            ->with('flash_message', 'Please try again');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		 //delete book
        Room::find($id)->delete();
        return Redirect::route('rooms.index')
            ->withInput()
            ->with('message', 'Successfully deleted Book.');
	}


}
