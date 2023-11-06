<?php

// namespace src\VIPSoft\Unzip;
// use src\VIPSoft\Unzip\Unzip;
use VIPSoft\Unzip\Unzip;

class ThemesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /themes
	 *
	 * @return Response
	 */
	

	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /themes/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /themes
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /themes/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		return View::make('admin.themes');
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /themes/{id}/edit
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
	 * PUT /themes/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{

		$themes		= Input::get('themes');
		$defaulth	= Input::get('defaulth');
		$defaultf	= Input::get('defaultf');
		$customeh	= Input::get('customeh');
		$customef	= Input::get('customef');

		if($themes==1){
			$query = DB::table('themes')
			            ->where('id', 1)
			            ->update(array('theme' => $themes, 'default_h' => $defaulth, 'default_f' => $defaultf));

		}else{
			$query = DB::table('themes')
			            ->where('id', 1)
			            ->update(array('theme' => $themes, 'custome_h' => $customeh, 'custome_f' => $customef));


			if(Input::hasFile('uploadtheme')){

				$file = Input::file('uploadtheme');
				$name = $file->getClientOriginalName();

				$file->move(public_path() .'/theme/', $name);
				
				$zipFilePath = public_path() .'/theme/'.$name;
				$extractToThisDir = public_path() .'/theme/';

				$unzip  = new Unzip();
				$filenames = $unzip->extract($zipFilePath, $extractToThisDir);

				unlink(public_path() .'/theme/'.$name);
			}


		}

		if($query) {
			return  Redirect::route('themes')
					->with('flash_message', 'Update Themes, Success!');
		}else{
			return  Redirect::back()
					->with('flash_message', 'Please try again');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /themes/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
