<?php

class workreportController extends \BaseController {

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
		
		$reports = Workreport::with('client')->with('worksite')->with('submitby')->get();
		$data = [
			'reports' => $reports
		];
		
		return View::make('workreport.list', $data);
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
		$worksites = Worksite::all();

		$labours = User::where('role', '=', 4)->get();
		$data = [
			'clients' => $clients,
			'worksites' => $worksites,
			'labours'  => $labours
		];
		return View::make('workreport.add', $data);
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
			'client'		=> 'required',
			'site'			=> 'required',
			'date_create' 	=> 'required',
		];

		$input = Input::all();

		$validation = Validator::make($input, $rules);

		if($validation->fails()){
			return Redirect::to( $this->prefix . '/workreport/create')->withErrors($validation);
		}

		try{
			list($d,$m,$y) = explode('/', $input['date_create']);
			$date_create = date('Y-m-d H:i:s', mktime(0,0,0,$m,$d,$y));

			$data = [
				'job_number'	=> $input['job_number'],
				'client_id' 	=> $input['client'],
				'site_id' 		=> $input['site'],
				'date_create' 	=> $date_create,
				'description'	=> $input['description'],
				'submit_by'		=> Auth::user()->id
			]; 

			Workreport::insert($data);
			$id = DB::getPdo()->lastInsertId();
			$i =0;
			foreach($input['labour_id'] as $labour_id){
				$timesheet[] = [
					'labour_id' 		=> $labour_id,
					'class' 			=> $input['class_name'][$i],
					'reg_hour' 			=> $input['reg_hour'][$i],
					/*'reg_rate' 			=> $input['reg_rate'][$i],*/
					'ot_hour' 			=> $input['ot_hour'][$i],
					/*'ot_rate' 			=> $input['ot_rate'][$i],*/
					'dt_hour' 			=> $input['dt_hour'][$i],
					/*'dt_rate' 			=> $input['dt_rate'][$i],*/
					'workreport_id' 	=> $id
				];
				$i++;
			}

			Timesheet::insert($timesheet); 

			return Redirect::to( $this->prefix . '/workreport/create' )->withStatus('Work Report has been successfully added.');

		}
		catch(Exception $e){
			//echo $e->getMessage();
			return Redirect::to( $this->prefix . '/workreport/create' )->withErrors([$e->getMessage()]);	
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
		$reports = Workreport::whereId($id)->with('client')->with('worksite')->with('submitby')->get();

		$timesheet = Timesheet::where('workreport_id', '=', $id)->with('labor')->get();
		$total =0;
		foreach($timesheet as $row){
			$reg_amount = $row['reg_hour']*$row['reg_rate'];
			$ot_amount = $row['ot_hour']*$row['ot_rate'];
			$dt_amount = $row['dt_hour']*$row['dt_rate'];
			$total += $reg_amount+$ot_amount+$dt_amount;
		}

		$data = [
			'report' => $reports[0],
			'timesheet' => $timesheet,
			'total'     => $total
		];
		
		return View::make('workreport.view', $data);

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
		$clients = Client::all();
		$labours = User::where('role', '=', 4)->get();
		$reports = Workreport::whereId($id)->with('timesheet')->get();
		$clientData = Client::find($reports[0]['client_id']);
		$siteData = Worksite::find($reports[0]['site_id']);
		$worksite = Worksite::where('client_id' , '=', $reports[0]['client_id'])->get()->toArray();

		$data = [
			'clients' 	=> $clients,
			'worksites' => $worksite,
			'labours'  	=> $labours,
			'reports'  	=> $reports[0],
			'client_data' => $clientData,
			'site_data'	  => $siteData,
			'worksite_data' => $worksite
		];
		return View::make('workreport.edit', $data);
	}

	/**
	 * update worksite by post
	 *
	 * @param  int  
	 * @return Response
	 */
	public function updateReport($workreport_id){

		//
		$rules = [
			'client'		=> 'required',
			'site'			=> 'required',
			'date_create' 	=> 'required',
		];

		$input = Input::all();

		$validation = Validator::make($input, $rules);

		if($validation->fails()){
			return Redirect::to( $this->prefix . '/workreport/'.$workreport_id.'/edit')->withErrors($validation);
		}

		try{
			list($d,$m,$y) = explode('/', $input['date_create']);
			$date_create = date('Y-m-d H:i:s', mktime(0,0,0,$m,$d,$y));

			$data = [
				'client_id' 	=> $input['client'],
				'site_id' 		=> $input['site'],
				'date_create' 	=> $date_create,
				'description'	=> $input['description'],
				'submit_by'		=> Auth::user()->id
			];
			
			Workreport::where('id','=',$workreport_id)->update($data);

			$i =0;
			$updatetimesheet = $timesheet = [];
			foreach($input['labour_id'] as $labour_id){
				if($input['time_sheet_id'] != ""){
					$updatetimesheet[$input['time_sheet_id'][$i]] = [
						'labour_id' 		=> $labour_id,
						'class' 			=> $input['class_name'][$i],
						'reg_hour' 			=> $input['reg_hour'][$i],
						/*'reg_rate' 			=> $input['reg_rate'][$i],*/
						'ot_hour' 			=> $input['ot_hour'][$i],
						/*'ot_rate' 			=> $input['ot_rate'][$i],*/
						'dt_hour' 			=> $input['dt_hour'][$i],
						/*'dt_rate' 			=> $input['dt_rate'][$i],*/
					];
				}else{
					$timesheet[] = [
						'labour_id' 		=> $labour_id,
						'class' 			=> $input['class_name'][$i],
						'reg_hour' 			=> $input['reg_hour'][$i],
						/*'reg_rate' 			=> $input['reg_rate'][$i],*/
						'ot_hour' 			=> $input['ot_hour'][$i],
						/*'ot_rate' 			=> $input['ot_rate'][$i],*/
						'dt_hour' 			=> $input['dt_hour'][$i],
						/*'dt_rate' 			=> $input['dt_rate'][$i],*/
						'workreport_id'		=> $workreport_id
					];
				}
				
				$i++;
			}

			if(!empty($timesheet)){
				Timesheet::insert($timesheet); 	
			}

			if(!empty($updatetimesheet)){
				foreach ($updatetimesheet as $time_id => $update) {
					Timesheet::where('id','=', $time_id)->update($update);
				}
			}
			

			return Redirect::to( $this->prefix . '/workreport/'.$workreport_id.'/edit')->withStatus('Work Report has been successfully updated.');

		}
		catch(Exception $e){
			//echo $e->getMessage();
			return Redirect::to( $this->prefix . '/workreport/'.$workreport_id.'/edit' )->withErrors([$e->getMessage()]);	
		}

	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function deleteReport($id)
	{
		//
		if(empty($id)) return Redirect::to($this->prefix.'/workreport');

		Workreport::find($id)->delete();

		return Redirect::to($this->prefix.'/workreport')->withStatus('Work Report has been successfully deleted.');
	}


	public function editDeleteWorkReport(){

		$data = [
			'workreports' => Workreport::all()
		];
		return View::make('workreport.editdelete', $data);
	}

	
	public function postEditDeleteWorkReport(){

		$id = Input::get('id');
		if(empty($id)) return false;

		workreport::find($id)->delete();;

		return Redirect::to( $this->prefix . '/editdeletereport' )->withStatus('Work Report has been successfully deleted.');
	}


	public function getLabors(){

		$client_id = Input::get('client_id');
		$worksite_id = Input::get('worksite_id');
		$started_at = Input::get('started_at');

		$labors = Magnetboard::where('client_id','=', $client_id)->where('worksite_id','=',$worksite_id)->select('id')->get()->toArray();

		if(!empty($labors)) {
			$labour_data = MagnetboardUser::where('Magnetboard_id','=',$labors[0]['id'])->with('users')->get()->toArray();
			$labours = [];
			foreach($labour_data as $row){
				$labours[] = $row['users'];
			}
		}else{
			$labours = User::where('role', '=', 4)->get()->toArray();
		}
			

		return Response::json(['result'=>true, 'data'=> $labours]);
	}

	public function approve($id){

		if(empty($id)) return Redirect::to( $this->prefix . '/workreport');

		$data = [
			'status' => 1,
			'approve_by' => Auth::user()->id
		];
		Workreport::where('id', '=', $id)->update($data);

		return  Redirect::to( $this->prefix . '/workreport' )->withStatus('Work Report has been successfully approved.');
	}

	public function viewWorkreport(){

		$id = Input::get('id');
		if(empty($id)) return ['data'=>'Report Not Found'];

		$reports = Workreport::whereId($id)->with('client')->with('worksite')->with('submitby')->get();

		$timesheet = Timesheet::where('workreport_id', '=', $id)->with('labor')->get();
		$total =0;
		foreach($timesheet as $row){
			$reg_amount = $row['reg_hour']*$reports[0]['worksite']['labour_rate'];
			$ot_amount = $row['ot_hour']*$reports[0]['worksite']['ot_rate'];
			$dt_amount = $row['dt_hour']*$reports[0]['worksite']['dt_rate'];
			$total += $reg_amount+$ot_amount+$dt_amount;
		}

		$report = [
			'report' => $reports[0],
			'timesheet' => $timesheet,
			'total'     => $total
		];
		$data = View::make('workreport.view_model',$report)->render();
		return Response::Json(['data'=>$data]);

	}


	
}
