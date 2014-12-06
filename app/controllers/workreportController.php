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
		
		$reports = Workreport::with('client')->with('worksite')->with('submit_by')->get();
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


			$data = [
				'job_number'	=> $input['job_number'],
				'client_id' 	=> $input['client'],
				'site_id' 		=> $input['site'],
				'date_create' 	=> date('Y-m-d H:i:s', strtotime($input['date_create'])),
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
					'reg_rate' 			=> $input['reg_rate'][$i],
					'ot_hour' 			=> $input['ot_hour'][$i],
					'ot_rate' 			=> $input['ot_rate'][$i],
					'dt_hour' 			=> $input['dt_hour'][$i],
					'dt_rate' 			=> $input['dt_rate'][$i],
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
		$reports = Workreport::whereId($id)->with('timesheet')->with('client')->with('worksite')->with('submit_by')->get();

		$data = [
			'report' => $reports[0]
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
		$worksites = Worksite::all();
		$labours = User::where('role', '=', 4)->get();
		$reports = Workreport::whereId($id)->with('timesheet')->get();

		$clientData = Client::find($reports[0]['client_id']);
		$siteData = Worksite::find($reports[0]['site_id']);

		$data = [
			'clients' 	=> $clients,
			'worksites' => $worksites,
			'labours'  	=> $labours,
			'reports'  	=> $reports[0],
			'client_data' => $clientData,
			'site_data'	  => $siteData
		];
		return View::make('workreport.edit', $data);
	}

	/**
	 * update worksite by post
	 *
	 * @param  int  
	 * @return Response
	 */
	public function updateSite($workreport_id){

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


			$data = [
				'client_id' 	=> $input['client'],
				'site_id' 		=> $input['site'],
				'date_create' 	=> date('Y-m-d H:i:s', strtotime($input['date_create'])),
				'description'	=> $input['description'],
				'submit_by'		=> Auth::user()->id
			]; 
			Workreport::find($workreport_id)->update($data);
			$id = DB::getPdo()->lastInsertId();
			$i =0;
			foreach($input['labour_id'] as $labour_id){
				if($input['time_sheet_id'] != ""){
					$updatetimesheet[$input['time_sheet_id']] = [
						'labour_id' 		=> $labour_id,
						'class' 			=> $input['class_name'][$i],
						'reg_hour' 			=> $input['reg_hour'][$i],
						'reg_rate' 			=> $input['reg_rate'][$i],
						'ot_hour' 			=> $input['ot_hour'][$i],
						'ot_rate' 			=> $input['ot_rate'][$i],
						'dt_hour' 			=> $input['dt_hour'][$i],
						'dt_rate' 			=> $input['dt_rate'][$i],
					];
				}else{
					$timesheet[] = [
						'labour_id' 		=> $labour_id,
						'class' 			=> $input['class_name'][$i],
						'reg_hour' 			=> $input['reg_hour'][$i],
						'reg_rate' 			=> $input['reg_rate'][$i],
						'ot_hour' 			=> $input['ot_hour'][$i],
						'ot_rate' 			=> $input['ot_rate'][$i],
						'dt_hour' 			=> $input['dt_hour'][$i],
						'dt_rate' 			=> $input['dt_rate'][$i],
						'workreport_id'	=> $workreport_id
					];
				}
				
				$i++;
			}
			if(!empty($timesheet)){
				Timesheet::insert($timesheet); 	
			}

			if(!empty($updatetimesheet)){
				foreach ($updatetimesheet as $time_id => $update) {
					Timesheet::find($time_id)->update($update);
				}
			}
			

			return Redirect::to( $this->prefix . '/workreport'.$workreport_id.'/edit')->withStatus('Work Report has been successfully updated.');

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
	public function deleteSite($id)
	{
		//
		if(empty($id)) return Redirect::to($this->prefix.'/workreport');

		Workreport::find($id)->delete();

		return Redirect::to($this->prefix.'/workreport')->withStatus('Work Report has been successfully deleted.');
	}


	public function editDeleteWorkSite(){

		$data = [
			'workreports' => Workreport::all()
		];
		return View::make('workreport.editdelete', $data);
	}

	
	public function postEditDeleteWorkSite(){

		$id = Input::get('id');
		if(empty($id)) return false;

		workreport::find($id)->delete();;

		return Redirect::to( $this->prefix . '/editdeletereport' )->withStatus('WorkSite has been successfully deleted.');
	}


}
