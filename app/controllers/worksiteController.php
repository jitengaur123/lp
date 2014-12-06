<?php

class worksiteController extends \BaseController {

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
		$worksiteList = Worksite::where('id','!=', 0)->with('client')->get()->toArray();
		$data = [
			'worksites' => $worksiteList
		];
		
		return View::make('worksite.worksitelist', $data);
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
		$data = ['clients' => $clients];
		return View::make('worksite.addworksite', $data);
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
			return Redirect::to( $this->prefix . '/worksite/create')->withErrors($validation);
		}

		try{

			$input = Input::all();
			$input['work_auto_id'] = "AMA-WS-".uniqid();
			$input['started_at'] = date('Y-m-d H:i:s' , strtotime($input['started_at']));
			Worksite::insert($input);

			return Redirect::to( $this->prefix . '/worksite/create' )->withStatus('worksite has been successfully added.');

		}
		catch(Exception $e){
			//echo $e->getMessage();
			return Redirect::to( $this->prefix . '/worksite/create' )->withErrors([$e->getMessage()]);	
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
		return View::make('worksite/viewworksite', $data);

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
		return View::make('worksite/editworksite', $data);
	}

	/**
	 * update worksite by post
	 *
	 * @param  int  
	 * @return Response
	 */
	public function updateSite($worksite_id){

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
			return Redirect::to( $this->prefix . '/worksite/'.$worksite_id.'/edit')->withErrors($validation);
		}

		try{

			$input = Input::all();
			$input['started_at'] = date('Y-m-d H:i:s', strtotime($input['started_at']));
			Worksite::whereId($worksite_id)->update($input);

			return Redirect::to( $this->prefix . '/worksite/'.$worksite_id.'/edit' )->withStatus('Worksite has been successfully updated.');

		}
		catch(Exception $e){
			//echo $e->getMessage();
			return Redirect::to( $this->prefix . '/worksite/'.$worksite_id.'/edit')->withErrors([$e->getMessage()]);	
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
		if(empty($id)) return Redirect::to($this->prefix.'/worksite');

		Worksite::find($id)->delete();

		return Redirect::to($this->prefix.'/worksite')->withStatus('Worksite has been successfully deleted.');
	}


	public function editDeleteWorkSite(){

		$data = [
			'worksites' => Worksite::all()
		];
		return View::make('worksite.editdeleteworksite', $data);
	}

	
	public function postEditDeleteWorkSite(){

		$id = Input::get('id');
		if(empty($id)) return false;

		Worksite::find($id)->delete();

		return Redirect::to( $this->prefix . '/editdeletesite' )->withStatus('WorkSite has been successfully deleted.');
	}


	public function clientWorksite(){
		$id = Input::get('id');
		if(empty($id)) return Response::json(['result'=>false]);

		$data = Worksite::where('client_id' , '=', $id)->get()->toArray();

		return Response::json(['result'=>true, 'data'=>$data]);
	}

}
