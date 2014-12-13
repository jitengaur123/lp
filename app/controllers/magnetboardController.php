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
			'users'		=> $users,
			'input'		=> ''
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

		$validation = Validator::make($input, $rules);

		if($validation->fails()){
			return Redirect::to( $this->prefix . '/magnet/create')->withErrors($validation);
		}
		list($d,$m,$y) = explode('/', $input['started_at']);
		$started_at = date('Y-m-d H:i:s', mktime(0,0,0,$m,$d,$y));


		$mData = Magnetboard::where('started_at','=',$started_at)
				->whereClientId($input['client_id'])
				->whereWorksiteId($input['worksite_id'])
				->get()->toArray();

		if(!empty($mData)){
			return Redirect::to( $this->prefix . '/magnet/create')->withErrors(['Board Allready Exits.']);
		}
		
		try{

			$input = Input::all();
			$input['started_at'] = $started_at;
			$users = $input['users'];
			$start_time = $input['start_time'];
			$end_time = $input['end_time'];
			unset($input['users']);
			unset($input['start_time']);
			unset($input['end_time']);
			
			Magnetboard::insert($input);
			$id = DB::getPdo()->lastInsertId();

			$magnet_users = [];
			foreach($users as $user){
				$magnet_users[] = [
					'user_id' 		=> $user,
					'magnetboard_id'=> $id,
					'start_time' 	=> $start_time[$user],
					'end_time' 		=> $end_time[$user],
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
		$Magnetboard = Magnetboard::where('id','=',$id)->with('magnet_users')->with('client')->with('worksite')->get();


		$MagnetboardUser = MagnetboardUser::where('magnetboard_id','=',$id)->with('users')->get();
		
		$data = [
			'Magnetboard' => $Magnetboard,
			'MagnetboardUser' => $MagnetboardUser
		];
		//return $data;
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
		$magnetboard = Magnetboard::find($id);
		$clients = Client::all();
		$users = User::where('role','=', 4)->get();
		$m_users =  MagnetboardUser::where('magnetboard_id','=', $id)->select('user_id', 'start_time','end_time')->get()->toArray();

		$magnetuser = $selectdUser = [];
		foreach($m_users as  $row){
			$magnetuser[] = $row['user_id'];

			$selectdUser[$row['user_id']]['start_time'] = $row['start_time'];
			$selectdUser[$row['user_id']]['end_time'] = $row['end_time'];
		}
		$data = [
			'clients' 	  => $clients,
			'users'		  => $users,
			'worksite'    => Worksite::where('client_id','=',$magnetboard['client_id'])->get(),
			'magnetboard' => $magnetboard,
			'magnetuser'  => $magnetuser,
			'selectdUser' => $selectdUser
		];
		//return $data;
		return View::make('magnet_board.edit', $data);
	}

	/**
	 * update worksite by post
	 *
	 * @param  int  
	 * @return Response
	 */
	public function update($magnet_id){

		$rules = [
			'started_at'	=> 'required',
			'client_id'		=> 'required',
			'worksite_id'	=> 'required',
			'users' 		=> 'required',
		];

		$input = Input::all();

		$validation = Validator::make($input, $rules);

		if($validation->fails()){
			return Redirect::to( $this->prefix . '/magnet/'.$magnet_id.'/edit')->withErrors($validation);
		}

		list($d,$m,$y) = explode('/', $input['started_at']);
		$started_at = date('Y-m-d H:i:s', mktime(0,0,0,$m,$d,$y));

		$mData = Magnetboard::where('started_at','=',$started_at)
				->whereClientId($input['client_id'])
				->whereWorksiteId($input['worksite_id'])
				->where('id','!=',$magnet_id)
				->get()->toArray();

		if(!empty($mData)){
			return Redirect::to( $this->prefix . '/magnet/'.$magnet_id.'/edit')->withErrors(['Board Allready Exits.']);
		}

		try{


			$input = Input::all();
			$input['started_at'] = $started_at;
			$users = $input['users'];
			$start_time = $input['start_time'];
			$end_time = $input['end_time'];
			unset($input['users']);
			unset($input['start_time']);
			unset($input['end_time']);
			
			Magnetboard::whereId($magnet_id)->update($input);

			MagnetboardUser::where('magnetboard_id','=',$magnet_id)->delete();
			$magnet_users = [];
			foreach($users as $user){
				$magnet_users[] = [
					'user_id' => $user,
					'magnetboard_id'=> $magnet_id,
					'start_time' 	=> $start_time[$user],
					'end_time' 		=> $end_time[$user],
				];
			}
			MagnetboardUser::insert($magnet_users);
		
			return Redirect::to( $this->prefix . '/magnet/'.$magnet_id.'/edit' )->withStatus('Magnetboard has been successfully updated.');

		}
		catch(Exception $e){
			//echo $e->getMessage();
			return Redirect::to( $this->prefix . '/magnet/'.$magnet_id.'/edit')->withErrors([$e->getMessage()]);	
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


	function checkBoardExists(){

		$input = Input::all();

		$mData = Magnetboard::where('started_at','=',date('Y-m-d H:i:s' , strtotime($input['started_at'])))
				->whereClientId($input['client_id'])
				->whereWorksiteId($input['worksite_id'])
				->get()->toArray();
		if(empty($mData)){
			$data = ['result'=>false];
		}else{
			$data = ['result'=>true];
		}
		
		return Response::json($data);
	}

	public function viewMagnet(){

		$id = Input::get('id');
		if(empty($id)) return ['data'=>'Magnet Board Not Found'];

		$Magnetboard = Magnetboard::where('id','=',$id)->with('magnet_users')->with('client')->with('worksite')->get();
		$MagnetboardUser = MagnetboardUser::where('magnetboard_id','=',$id)->with('users')->get();
		
		$mdata = [
			'Magnetboard' => $Magnetboard[0],
			'MagnetboardUser' => $MagnetboardUser
		];
		$data = View::make('magnet_board.view_model', $mdata)->render();
		return Response::Json(['data'=>$data]);

	}

}
