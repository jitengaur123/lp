<?php

class magnetboardController extends \BaseController {

	public $prefix = '';

	function __construct(){
		$this->prefix = Config::get('constants.PREFIX');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$Magnetboard = Magnetboard::with('magnet_users')->with('client')->with('worksite')->get();
		$data = [
			'magnetboard' => $Magnetboard
		];
		
		return View::make('magnet_board.list', $data);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$clients = Client::all();
		$users = User::where('role','=', 4)->get();

		$data = [
			'clients' 	=> $clients,
			'users'		=> $users
		];
		return View::make('magnet_board.add', $data);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$rules = [
			'started_at'	=> 'required',
			'client_id'		=> 'required',
			'worksite_id'	=> 'required',
			'users' 		=> 'required',
		];

		$input = Input::all();

		//return $input;

		$validation = Validator::make($input, $rules);

		if($validation->fails()){
			return Redirect::to( $this->prefix . '/magnet/create')->withErrors($validation);
		}

		try{

			$input = Input::all();
			$input['started_at'] = date('Y-m-d H:i:s' , strtotime($input['started_at']));
			$users = $input['users'];
			unset($input['users']);
			
			Magnetboard::insert($input);
			$id = DB::getPdo()->lastInsertId();

			$magnet_users = [];
			foreach($users as $user){
				$magnet_users[] = [
					'user_id' => $user,
					'magnetboard_id'=> $id
				];
			}

			MagnetboardUser::insert($magnet_users);

			return Redirect::to( $this->prefix . '/magnet/create' )->withStatus('Magnetboard has been successfully added.');

		}
		catch(Exception $e){
			//echo $e->getMessage();
			return Redirect::to( $this->prefix . '/magnet/create' )->withErrors([$e->getMessage()]);	
		}

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$worksite = Worksite::whereId($id)->with('client')->get();
		
		$data = [
			'worksite' => $worksite
		];
		return View::make('magnet_board.view', $data);

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
		$worksite = Worksite::find($id);
		$clients = Client::all();
		$data = [
			'worksite' => $worksite,
			'clients'  => $clients
		];
		return View::make('magnet_board.edit', $data);
	}

	/**
	 * update worksite by post
	 *
	 * @param  int  
	 * @return Response
	 */
	public function update($worksite_id){

		$rules = [
			'started_at'	=> 'required',
			'client_id'		=> 'required',
			'job_name'		=> 'required',
			'description' 	=> 'required',
			'address' 		=> 'required',
			'city' 			=> 'required',
			'state'			=> 'required',
			'postal_code'	=> 'required',
			'country'		=> 'required',
			'ocip' 			=> 'required',
			'pm' 			=> 'required',
			'billing_type' 	=> 'required',
			'cret_pr' 		=> 'required'
		];

		$input = Input::all();

		$validation = Validator::make($input, $rules);

		if($validation->fails()){
			return Redirect::to( $this->prefix . '/magnet/'.$worksite_id.'/edit')->withErrors($validation);
		}

		try{

			$input = Input::all();
			$input['started_at'] = date('Y-m-d H:i:s', strtotime($input['started_at']));
			Worksite::whereId($worksite_id)->update($input);

			return Redirect::to( $this->prefix . '/magnet/'.$worksite_id.'/edit' )->withStatus('Worksite has been successfully updated.');

		}
		catch(Exception $e){
			//echo $e->getMessage();
			return Redirect::to( $this->prefix . '/magnet/'.$worksite_id.'/edit')->withErrors([$e->getMessage()]);	
		}

	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
		//
		if(empty($id)) return Redirect::to($this->prefix.'/magnet');

		Magnetboard::find($id)->delete();

		MagnetboardUser::where('magnetboard_id','=',$id)->delete();

		return Redirect::to($this->prefix.'/magnet')->withStatus('Magnetboard has been successfully deleted.');
	}

}
