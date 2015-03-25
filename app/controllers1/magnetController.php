<?php
use Carbon\Carbon;
class magnetController extends \BaseController {

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
		$Magnetboard = Magnetboard::with('magnet_users')->with('supervisor')->with('worksite')->get();
		$data = [
			'magnetboard' => $Magnetboard
		];
		
		return View::make('magnet.list', $data);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		$start_date = Carbon::now();
		
		Carbon::setToStringFormat('Y-m-d');
		if(Input::has('started_at')){
			list($d,$m,$y) = explode('/', Input::get('started_at'));
			$start_date = $start_date->setDate($y, $m, $d);
		}

		$worksites = DB::table('worksite')
					->leftjoin('magnet_board', function($join) use ($start_date) {
						$join->on('worksite.id', '=', 'magnet_board.worksite_id')
							->on(Db::raw('DATE(magnet_board.started_at)'),	 '=', Db::raw("'".$start_date."'"));
					})
					->select('worksite.id', 'worksite.job_name', 'magnet_board.id as m_id', 'magnet_board.supervisor_id')
					->get();



		$magnetUser = $this->magnetUsers($start_date);

		$usersData = User::whereIn('role',[3,4])->select('id', 'first_name', 'last_name', 'user_name', 'email', 'role', 'profile_pic')->get()->toArray();
		$users = [];
		foreach($usersData as $row){
			$users[$row['id']] = $row;
		}
		Carbon::setToStringFormat('d/m/Y');

		$data = [
			'worksites'	=> $worksites,
			'users'		=> $users,
			'magnetUser'=>$magnetUser,
			'start_date'=> $start_date
		];
		return View::make('magnet.add', $data);
	}


	/**
	 * [updateboard description]
	 * @return [type] [description]
	 */
	function updateboard(){

		$input = Input::all();

		$this->deletePreviousBoardUser($input);
		
		if( !Input::has('worksiteid') ) 
			return Response::json(['removeJob'=>true]);

		if( Input::has('jobid') ){
			if( Input::has('roleid') && $input['roleid'] == 3){
				Magnetboard::where('id','=', $input['jobid'])->update(['supervisor_id'=>$input['userid']]);
			}else{
				$magnet_users = [
					'user_id' 		=> $input['userid'],
					'magnetboard_id'=>  $input['jobid'],
				];
				MagnetboardUser::insert($magnet_users);
			}
			$result = [ 'jobid' => $input['jobid']];
		}else{

			list($d,$m,$y) = explode('/', $input['date_started']);
			$dt = Carbon::now();
			$start_date = $dt->setDate($y, $m, $d)->toDateTimeString();
			
			$insertData = [
				'started_at'	=> $start_date,
				'worksite_id'	=> $input['worksiteid'],
			];

			if( Input::has('roleid') && $input['roleid'] == 3){
				$insertData['supervisor_id'] = $input['userid'];
			}

			Magnetboard::insert($insertData);
			$id = DB::getPdo()->lastInsertId();
			
			if( Input::has('roleid') && $input['roleid'] == 4 ){
				$magnet_users = [
					'user_id' 		=> $input['userid'],
					'magnetboard_id'=>  $id,
				];
				MagnetboardUser::insert($magnet_users);
			}
			$result = [ 'jobid' => $id];
		}
		return Response::json($result);
	}

	function deletePreviousBoardUser($input){

		if( Input::has('previousjobid') ){
			if( Input::has('roleid') && $input['roleid']== 3){
				Magnetboard::where('id','=', $input['previousjobid'])
							->update(['supervisor_id'=>0]);
			}else{
				
				MagnetboardUser::where('magnetboard_id','=', $input['previousjobid'])
								->where('user_id','=', $input['userid'])
								->delete();
			}
		}
	}


	function magnetUsers($start_date){

		$user = [];
		$board = [];
		$Magnetboard = Magnetboard::where(Db::raw('DATE(started_at)'), '=', Db::raw("'".$start_date."'"))->with('magnet_users')->get();

		foreach ($Magnetboard as $key => $value) {
			$i =0;
			$user[] = $value['supervisor_id'];
			$board[$value['id']][$i]['user_id'] = $value['supervisor_id'];
			$i++;
			foreach ($value['magnet_users'] as  $row) {
				$user[] = $row['user_id'];
				$board[$value['id']][$i]['user_id'] = $row['user_id'];
				$board[$value['id']][$i]['start_time'] = $row['start_time'];
				$board[$value['id']][$i]['end_time'] = $row['end_time'];
				$i++;
			}
		}
		return ['users'=>$user, 'board' => $board];
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
			'worksite_id'	=> 'required',
			'user_id' 		=> 'required',
			'supervisor_id' => 'required',
		];

		$input = Input::all();


		$validation = Validator::make($input, $rules);

		if($validation->fails()){
			//return Redirect::to( $this->prefix . '/magnet/create')->withErrors($validation);
			$data = ['result' => false, 'errors'=>$validation];
			return Response::json($data);
		}


		list($d,$m,$y) = explode('/', $input['started_at']);
		$started_at = date('Y-m-d H:i:s', mktime(0,0,0,$m,$d,$y));


		$mData = Magnetboard::where('started_at','=',$started_at)
				->whereWorksiteId($input['worksite_id'])
				->get()->toArray();

		if(!empty($mData)){
			//return Redirect::to( $this->prefix . '/magnet/create')->withErrors(['Board Allready Exits.']);
			$data = ['result' => false, 'errors'=>['Board Allready Exits.']];
			return Response::json($data);
		}
		
		try{

			$input = Input::all();
			$input['started_at'] = $started_at;
			$users = $input['user_id'];
			$start_time = $input['start_time'];
			$end_time = $input['end_time'];
			
			unset($input['user_id']);
			unset($input['start_time']);
			unset($input['end_time']);
			
			Magnetboard::insert($input);
			$id = DB::getPdo()->lastInsertId();

			$magnet_users = [];
			$i = 0;

			foreach($users as $user){

				$start = (isset($start_time[$user])) ? $start_time[$user] : '0';
				$end 	= (isset($end_time[$user])) ? $end_time[$user] : '0';

				$magnet_users[] = [
					'user_id' 		=> $user,
					'magnetboard_id'=> $id,
					'start_time' 	=> $start,
					'end_time' 		=> $end,
				];
				$i++;
			}

			MagnetboardUser::insert($magnet_users);

			$data = ['result' => true, 'message'=>'Magnetboard has been successfully added.'];
			return Response::json($data);
			//return Redirect::to( $this->prefix . '/magnet/create' )->withStatus('Magnetboard has been successfully added.');

		}
		catch(Exception $e){
			//echo $e->getMessage();3
			$data = ['result' => false, 'errors'=>[$e->getMessage()]];
			return Response::json($data);
			//return Redirect::to( $this->prefix . '/magnet/create' )->withErrors([$e->getMessage()]);	
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
		$Magnetboard = Magnetboard::where('id','=',$id)->with('magnet_users')->with('supervisor')->with('worksite')->get();


		$MagnetboardUser = MagnetboardUser::where('magnetboard_id','=',$id)->with('users')->get();
		
		$data = [
			'Magnetboard' => $Magnetboard,
			'MagnetboardUser' => $MagnetboardUser
		];
		//return $data;
		return View::make('magnet.view', $data);

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$magnetboard = Magnetboard::find($id);
		$Useroccupied = $this->magnetOccupiedUser($magnetboard['started_at']);

		if(!empty($Useroccupied)){
			$users = User::whereIn('role',[3,4])->whereNotIn('id', $Useroccupied)->select('id', 'first_name', 'last_name', 'user_name', 'email', 'role')->get()->toArray();
		}else{
			$users = User::whereIn('role',[3,4])->select('id', 'first_name', 'last_name', 'user_name', 'email', 'role')->get()->toArray();
		}


		
		$m_users =  MagnetboardUser::where('magnetboard_id','=', $id)->select('user_id', 'start_time','end_time')->get()->toArray();

		$magnetuser = $selectdUser = [];
		foreach($m_users as  $row){
			$magnetuser[] = $row['user_id'];

			$selectdUser[$row['user_id']]['start_time'] = $row['start_time'];
			$selectdUser[$row['user_id']]['end_time'] = $row['end_time'];
		}

		$m_users = User::whereIn('id',$magnetuser)->select('id', 'first_name', 'last_name', 'user_name', 'email', 'role')->get()->toArray();
		$s_users = User::where('id','=', $magnetboard['supervisor_id'])->select('id', 'first_name', 'last_name', 'user_name', 'email', 'role')->get()->toArray();


		$data = [
			'users'		  => $users,
			'worksites'    => Worksite::all(),
			'magnetboard' => $magnetboard,
			'selectdUser' => $selectdUser,
			'm_users'	  => $m_users,
			's_user'		=> $s_users[0]
		];
		//return $data;
		return View::make('magnet.edit', $data);
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
			'worksite_id'	=> 'required',
			'user_id' 		=> 'required',
			'supervisor_id' => 'required',
		];

		$input = Input::all();

		$validation = Validator::make($input, $rules);

		if($validation->fails()){
			//return Redirect::to( $this->prefix . '/magnet/'.$magnet_id.'/edit')->withErrors($validation);
			$data = ['result' => false, 'errors'=>$validation];
			return Response::json($data);
		}

		list($d,$m,$y) = explode('/', $input['started_at']);
		$started_at = date('Y-m-d H:i:s', mktime(0,0,0,$m,$d,$y));

		$mData = Magnetboard::where('started_at','=',$started_at)
				->whereWorksiteId($input['worksite_id'])
				->where('id','!=',$magnet_id)
				->get()->toArray();

		if(!empty($mData)){
			//return Redirect::to( $this->prefix . '/magnet/'.$magnet_id.'/edit')->withErrors(['Board Allready Exits.']);
			$data = ['result' => false, 'errors'=>['Board Allready Exits.']];
			return Response::json($data);
		}

		try{


			$input = Input::all();
			$input['started_at'] = $started_at;
			$users = $input['user_id'];
			$start_time = $input['start_time'];
			$end_time = $input['end_time'];
			unset($input['user_id']);
			unset($input['start_time']);
			unset($input['end_time']);
			
			Magnetboard::whereId($magnet_id)->update($input);

			MagnetboardUser::where('magnetboard_id','=',$magnet_id)->delete();
			$magnet_users = [];
			$i = 0;
			foreach($users as $user){
				$start = (isset($start_time[$user])) ? $start_time[$user] : '0';
				$end 	= (isset($end_time[$user])) ? $end_time[$user] : '0';
				$magnet_users[] = [
					'user_id' => $user,
					'magnetboard_id'=> $magnet_id,
					'start_time' 	=> $start,
					'end_time' 		=> $end,
				];
				$i++;
			}
			MagnetboardUser::insert($magnet_users);
		
			//return Redirect::to( $this->prefix . '/magnet/'.$magnet_id.'/edit' )->withStatus('Magnetboard has been successfully updated.');
			$data = ['result' => true, 'message'=>'Magnetboard has been successfully updated.'];
			return Response::json($data);

		}
		catch(Exception $e){
			//echo $e->getMessage();
			$data = ['result' => false, 'errors'=>[$e->getMessage()]];
			return Response::json($data);
			//return Redirect::to( $this->prefix . '/magnet/'.$magnet_id.'/edit')->withErrors([$e->getMessage()]);	
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
		if(empty($id)) return Redirect::to($this->prefix.'/magnetboard');

		Magnetboard::find($id)->delete();

		MagnetboardUser::where('magnetboard_id','=',$id)->delete();

		return Redirect::to($this->prefix.'/magnetboard')->withStatus('Magnetboard has been successfully deleted.');
	}


	function checkBoardExists(){

		$input = Input::all();
		list($d,$m,$y) = explode('/', $input['started_at']);
		$started_at = date('Y-m-d H:i:s', mktime(0,0,0,$m,$d,$y));

		$mData = Magnetboard::where('started_at','=',date('Y-m-d H:i:s' , strtotime($started_at)))
				->whereWorksiteId($input['worksite_id'])
				->get()->toArray();

		if(empty($mData)){
			
			$Useroccupied = $this->magnetOccupiedUser($started_at);

			if(!empty($Useroccupied)){
				$users = User::whereIn('role',[3,4])->whereNotIn('id', $Useroccupied)->select('id', 'first_name', 'last_name', 'user_name', 'email', 'role')->get()->toArray();
			}else{
				$users = User::whereIn('role',[3,4])->select('id', 'first_name', 'last_name', 'user_name', 'email', 'role')->get()->toArray();
			}
			
			$data = ['result'=>false, 'users'=>$users];

		}else{
			$data = ['result'=>true];
		}
		
		return Response::json($data);
	}


	function magnetOccupiedUser($started_at){
		$board = Magnetboard::where('started_at','=',date('Y-m-d H:i:s' , strtotime($started_at)))->select('id', 'supervisor_id')->get()->toArray();
		$Useroccupied = $boardIds = [];
		if(!empty($board)){
			
			foreach ($board as $value) {
				$boardIds[] = $value['id'];
				$Useroccupied[] = $value['supervisor_id'];
			}


			$magnetUseroccupied = MagnetboardUser::whereIn('magnetboard_id',$boardIds)->select('user_id')->get()->toArray();
			if(!empty($magnetUseroccupied)){
				foreach ($magnetUseroccupied as $value) {
					$Useroccupied[] = $value['user_id'];
				}
			}
		}
		return $Useroccupied;
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
		$data = View::make('magnet.view_model', $mdata)->render();
		return Response::Json(['data'=>$data]);

	}

}
