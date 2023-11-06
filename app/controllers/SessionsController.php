<?php

class SessionsController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('sessions.login');
	}

	public function accountList()
	{
		$users = User::all();

		return View::make('admin.accountlist', compact('users'));
	}

	public function create()
	{
		return View::make('admin.account');
	}

	public function createPost()
	{
		$validator = Validator::make(Input::all(),
			array(
				'fname'			=> 'required|max:10',
				'lname'			=> 'required|max:10',
				'username'		=> 'required|max:10',
				'email'			=> 'required|email',
				'password'		=> 'required|min:4',
				'passwordr'		=> 'required|min:4|same:password',
				'level'			=> 'required'
			)
		);

		if($validator->fails()) {
			return Redirect::route('create')
					->withErrors($validator)
					->withInput();
		}else{	

			$username	= Input::get('username');
			$f_name		= Input::get('fname');
			$l_name		= Input::get('lname');
			$email 		= Input::get('email');
			$password 	= Input::get('password');
			$level		= Input::get('level');
			$status		= Input::get('status');

			$usercek = User::where('username', '=', $username);
			
			if($usercek->count()) {
				return  Redirect::route('create')
						->with('flash_message', 'Username is Taken')
						->withInput();
			}else{
				
				$create = User::create(array(
					'username'	=> $username,
					'f_name'	=> $f_name,
					'l_name'	=> $l_name,
					'email'		=> $email,
					'password'	=> Hash::make($password),
					'status'	=> 1,
					'level'		=> $level,
					'status'	=> $status,
				));

				if($create) {
					return  Redirect::route('account')
							->with('flash_message', 'Create Account, Success!');
				}else{
					return  Redirect::route('create')
							->with('flash_message', 'Please try again');
				}
			}
		}
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$remember = (Input::has('remember')) ? true : false;

		$attempt = Auth::attempt([
			'username' => $input['username'],
			'password' => $input['password']
		], $remember);

		if($attempt) return Redirect::intended('/')
							->with('flash_message', 'You have been login!');

		return Redirect::back()->with('flash_message', 'Email/Password wrong')->withInput();
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// return View::make('admin.accountedit');
		
		$user = User::where('id', '=', $id);

		if($user->count()) {
			$user = $user->first();

			return View::make('admin.accountedit')
					->with('user', $user);
		}

		return App::abort(404);
	}

	public function editPost()
	{
		$validator = Validator::make(Input::all(),
			array(
				'fname'			=> 'required|max:10',
				'lname'			=> 'required|max:10',
				'email'			=> 'required|email',
				'password'		=> 'max:20',
				'passwordr'		=> 'max:20|same:password',
				'level'			=> 'required'
			)
		);

		if($validator->fails()) {
			return Redirect::back()
					->withErrors($validator)
					->withInput();
		}else{	

			$id 		= Input::get('id');	
			$user 		= User::find($id);
			
			$f_name		= Input::get('fname');
			$l_name		= Input::get('lname');
			$password 	= Input::get('password');
			$level		= Input::get('level');
			$status		= Input::get('status');

			if(!empty($password)) {

				$user->f_name 		= $f_name;
				$user->l_name		= $l_name;
				$user->password		= Hash::make($password);
				$user->status		= 1;
				$user->level		= $level;
				$user->status		= $status;

			}else{
				$user->f_name 		= $f_name;
				$user->l_name		= $l_name;
				$user->status		= 1;
				$user->level		= $level;
				$user->status		= $status;
			}

			if($user->save()) {
				return  Redirect::route('account')
						->with('flash_message', 'Update Account, Success!');
			}else{
				return  Redirect::back()
						->with('flash_message', 'Please try again');
			}

		}
	}

	public function del()
	{
		$user = User::find(Input::get('id'))->delete();

		if($user) {
			return  Redirect::route('account')
						->with('flash_message', 'Delete Account, Success!');
		}else{
			return  Redirect::back()
						->with('flash_message', 'Please try again');
		}
	}


	// password
	public function change()
	{
		return View::make('admin.accountchange');
	}

	// password 
	public function changepass()
	{
		$input = Input::all();

		$validator = Validator::make(Input::all(),
			array(
				'password'			=> 'max:20',
				'password-repeat'	=> 'max:20|same:password'
			)
		);

		if($validator->fails()) {
			return Redirect::back()
					->withErrors($validator);
		}else{
			$password = Input::get('password');

			$user = User::find(Auth::user()->id);
			$user->password = Hash::make($password);

			if($user->save()) {
				return  Redirect::route('account')
						->with('flash_message', 'Change Password, Success!');
			}else{
				return  Redirect::route('account')
						->with('flash_message', 'Please, Try Again!');
			}
		}

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();

		return Redirect::route('login')
				->with('flash_message', 'You have been logout!');
	}


}
