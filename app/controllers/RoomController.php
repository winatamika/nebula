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
      $facility=Facility::all();
       return View::make('rooms.create',compact('facility'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	
		    //create a rule validation
    $rules=array(
          'name_room'=>'required',
          'adult_capacity'=>'required',
          'child_capacity'=>'required',
          'desc'=>'required',
          'count' => 'required',
    );
    //get all book information
    $roomInfo = Input::all();
    //validate book information with the rules
      $validation=Validator::make($roomInfo,$rules);
      if($validation->passes())
      {
      	//end for upolad 

            $image = Input::file('image');
            $imagecopy = Input::file('image');
            $filename = $image->getClientOriginalName();
            $filenamecopy = $image->getClientOriginalName();

            $name_room = Input::get('name_room');
            $adult_capacity = Input::get('adult_capacity');
            $child_capacity = Input::get('child_capacity');
            $desc = Input::get('desc');
            $count = Input::get('count');
            $multi = Input::file('multiimage');
                      if(Input::get('facility') !=""){
                      $facility = json_encode(Input::get('facility'));
                      }
                      else{
                        $facility = "";
                      }
            $extrabed = Input::get('extrabed');
                      if(empty($extrabed)){
                        $extrabed = 0;
                      }

             $room = new Room;
             $room->name_room = $name_room;
             $room->adult_capacity = $adult_capacity;
             $room->child_capacity = $child_capacity;
             $room->desc = $desc;
             $room->image = $filename;
             $room->count = $count;
             $room->facility = $facility ;
             $room->extrabed = $extrabed;
             /*
       		  $destinationPath = 'uploads/';
            $image->move('uploads/large', $filename);

           
            $imagecopy->move('uploads/thumb', $filenamecopy);
            $resize = Image::make(sprintf('uploads/thumb/%s', $filename))->resize(120, 120)->save();
            */


            $types = array('-original.', '-thumbnail.', '-resiged.');
            // Width and height for thumb and resiged
            $sizes = array( array('60', '60'), array('700', '700') );
            $targetPath = 'uploads/';
            $targetPaththumb = 'uploads/thumb/';
            $file = Input::file('image');
            $fname = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();
            $nameWithOutExt = str_replace('.' . $ext, '', $fname);
            $original = $nameWithOutExt . array_shift($types) . $ext;

            $file->move($targetPath, $fname); // Move the original one first
            foreach ($types as $key => $type) {
                // Copy and move (thumb, resized)
                $newName = $nameWithOutExt . $type . $ext;
                File::copy($targetPath . $fname, $targetPath . $newName);
                Image::make($targetPath . $newName)
                      ->resize($sizes[$key][0], $sizes[$key][1])
                      ->save($targetPath . $newName);
            }


                      //disini multiple image
                      $i=0;
                      if($multi !=""){
                      foreach ($multi as $key => $n){
                        if($multi[$key] !=""){
                             $multiarray = $multi[$i]->getClientOriginalName();
                             $imagearrays[] = $multi[$i]->getClientOriginalName();

                                                            $types = array('-original.', '-thumbnail.', '-resiged.');
                                                            // Width and height for thumb and resiged
                                                            $sizes = array( array('60', '60'), array('700', '700') );
                                                            $targetPath = 'uploads/';                                      
                                                            $fname = $multi[$i]->getClientOriginalName();
                                                            $ext = $multi[$i]->getClientOriginalExtension();
                                                            $nameWithOutExt = str_replace('.' . $ext, '', $fname);
                                                            $original = $nameWithOutExt . array_shift($types) . $ext;
                                                            $multi[$i]->move($targetPath, $fname); // Move the original one first
                                                            foreach ($types as $key => $type) {
                                                                // Copy and move (thumb, resized)
                                                                $newName = $nameWithOutExt . $type . $ext;
                                                                File::copy($targetPath . $fname, $targetPath . $newName);
                                                                Image::make($targetPath . $newName)
                                                                      ->resize($sizes[$key][0], $sizes[$key][1])
                                                                      ->save($targetPath . $newName);
                                                            }


                             //$n->move($destinationPath,$multiarray);
                             $i++;
                        } 
                      }
                      $saveimagetodb = "";
                      foreach($imagearrays as $imagearray){
                      $saveimagetodb .= $imagearray.";";
                      }

                      $jsonimage = json_encode($imagearrays);
                      $room->multiimage = $jsonimage ;
                      }
                      //sampai sini

                                      
                                      $thesave = $room->save();
                                      if($thesave){
                                        $this->regular_priceplan();
                                      	       return Redirect::route('rooms.index')
                                                   ->withInput()
                                                   ->withErrors($validation)
                                                   ->with('message', 'Successfully created room.');
                                            
                                      }
                                      
      }
  
return Redirect::route('rooms.create')
->withInput()
->withErrors($validation)
->with('message', 'Some fields are incomplete.');
    
           
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
         $facility=Facility::all();
        return View::make('rooms.edit', compact('room','facility'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		       //create a rule validation
        $rules=array(
          'name_room'=>'required',
          'adult_capacity'=>'required',
          'child_capacity'=>'required',
          'desc'=>'required',
          'image'=>'image|mimes:jpg,gif,png,jpeg|max:3000',
          'count' => 'required',
        );
        $roomInfo = Input::all();
        $validation = Validator::make($roomInfo, $rules);
        if ($validation->passes())
        {

                      	            	//new
              $image = Input::file('image');
              $name_room = Input::get('name_room');
              $adult_capacity = Input::get('adult_capacity');
              $child_capacity = Input::get('child_capacity');
              $desc = Input::get('desc');
              $count  = Input::get('count');
              $facility = json_encode(Input::get('facility'));
              $extrabed = Input::get('extrabed');
                       if(empty($extrabed)){
                          $extrabed = 0;
                        }

                          //disini multiple image
                          $multi = Input::file('multiimage');
                          $img = Input::get('img');
                           $destinationPath = 'uploads/';
                          $i=0;
                          $jsonimage="";
                          if($img !=""){
                          foreach ($img as $imgg){
                            if($imgg !=""){
                               if($multi[$i] !=""){
                             $multiarray = $multi[$i]->getClientOriginalName();
                             $imagearrays[] = $multi[$i]->getClientOriginalName();

                                                            $types = array('-original.', '-thumbnail.', '-resiged.');
                                                            // Width and height for thumb and resiged
                                                            $sizes = array( array('60', '60'), array('700', '700') );
                                                            $targetPath = 'uploads/';                                      
                                                            $fname = $multi[$i]->getClientOriginalName();
                                                            $ext = $multi[$i]->getClientOriginalExtension();
                                                            $nameWithOutExt = str_replace('.' . $ext, '', $fname);
                                                            $original = $nameWithOutExt . array_shift($types) . $ext;
                                                            $multi[$i]->move($targetPath, $fname); // Move the original one first
                                                            foreach ($types as $key => $type) {
                                                                // Copy and move (thumb, resized)
                                                                $newName = $nameWithOutExt . $type . $ext;
                                                                File::copy($targetPath . $fname, $targetPath . $newName);
                                                                Image::make($targetPath . $newName)
                                                                      ->resize($sizes[$key][0], $sizes[$key][1])
                                                                      ->save($targetPath . $newName);
                                                            }

                              //$multi[$i]->move($destinationPath,$multiarray);
                            }else{
                               $imagearrays[] = $imgg;
                            }
                             $i++; 
                            }
                          }

                          $saveimagetodb = "";
                          foreach($imagearrays as $imagearray){
                           $saveimagetodb .= $imagearray.";";
                          }

                          $jsonimage = json_encode($imagearrays);
                          }
                          //sampai sini 

              if($image != ''){
               	  $destinationPath = 'uploads/';
                   $filename = $image->getClientOriginalName();
                        $types = array('-original.', '-thumbnail.', '-resiged.');
                        // Width and height for thumb and resiged
                        $sizes = array( array('60', '60'), array('700', '700') );
                        $targetPath = 'uploads/';
                        $file = Input::file('image');
                        $fname = $file->getClientOriginalName();
                        $ext = $file->getClientOriginalExtension();
                        $nameWithOutExt = str_replace('.' . $ext, '', $fname);
                        $original = $nameWithOutExt . array_shift($types) . $ext;
                        $file->move($targetPath, $fname); // Move the original one first
                        foreach ($types as $key => $type) {
                            // Copy and move (thumb, resized)
                            $newName = $nameWithOutExt . $type . $ext;
                            File::copy($targetPath . $fname, $targetPath . $newName);
                            Image::make($targetPath . $newName)
                                  ->resize($sizes[$key][0], $sizes[$key][1])
                                  ->save($targetPath . $newName);
                        }
                    //$uploadSuccess = Input::file('image')->move($destinationPath, $filename);

                   
              $roomz = array(
              'name_room' =>	$name_room,
              'adult_capacity' => $adult_capacity,
              'child_capacity' => $child_capacity,
              'desc' => $desc ,
              'image' => $filename,
              'count' => $count,
              'multiimage' =>  $jsonimage,
              'facility' => $facility,
              'extrabed' => $extrabed
                       	);
                  }else{
              $roomz = array(
              'name_room' =>	$name_room,
              'adult_capacity' => $adult_capacity,
              'child_capacity' => $child_capacity,
              'desc' => $desc ,
              'count' => $count,
              'multiimage' => $jsonimage,
              'facility' => $facility,
              'extrabed' => $extrabed
                       	);

                  }

                           

                           $room = Room::find($id);
                           $room->update($roomz);
                       
                          
                          return Redirect::route('rooms.index')
                              ->withInput()
                              ->withErrors($validation)
                              ->with('message', 'Successfully updated Room.');
           
        }
      
        return Redirect::route('rooms.edit', $id)
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
		 //delete book
        Room::find($id)->delete();
        return Redirect::route('rooms.index')
            ->withInput()
            ->with('message', 'Successfully deleted Book.');
	}


}
