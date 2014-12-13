<?php

class clientController extends \BaseController {

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
		$clientList = Client::all();
		$data = [
			'clients' => $clientList
		];
		return View::make('client.clientlist', $data);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		
		return View::make('client.addclient');
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
			'first_name'	=> 'required',
			'last_name'		=> 'required',
			'company_name'	=> 'required',
			'phone_office' 	=> 'required',
			'mobile1' 		=> 'required',
			'email' 		=> 'required|email|unique:client',
			'fax'			=> 'required',
			'address'		=> 'required',
			'city'			=> 'required',
			'state' 		=> 'required',
			'postal_code' 	=> 'required',
			'country' 		=> 'required',
		];

		$input = Input::all();

		$validation = Validator::make($input, $rules);

		if($validation->fails()){
			return Redirect::to( $this->prefix . '/client/create')->withErrors($validation);
		}

		try{

			$input = Input::all();
			$input['client_auto_id'] = 'AMA-CL-'.uniqid();
			Client::insert($input);

			return Redirect::to( $this->prefix . '/client/create' )->withStatus('Client has been successfully added.');

		}
		catch(Exception $e){
			//echo $e->getMessage();
			return Redirect::to( $this->prefix . '/client/create' )->withErrors([$e->getMessage()]);	
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
		$client = Client::find($id);

		$data = [
			'client' => $client
		];
		return View::make('client/viewclient', $data);

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
		$client = Client::find($id);

		$data = [
			'client' => $client
		];
		return View::make('client/editclient', $data);
	}

	/**
	 * update client by post
	 *
	 * @param  int  
	 * @return Response
	 */
	public function updateClient($client_id){

		$rules = [
			'first_name'	=> 'required',
			'last_name'		=> 'required',
			'company_name'	=> 'required',
			'phone_office' 	=> 'required',
			'mobile1' 		=> 'required',
			'fax'			=> 'required',
			'address'		=> 'required',
			'city'			=> 'required',
			'state' 		=> 'required',
			'postal_code' 	=> 'required',
			'country' 		=> 'required',
		];

		$input = Input::all();

		$validation = Validator::make($input, $rules);

		if($validation->fails()){
			return Redirect::to( $this->prefix . '/client/'.$client_id.'/edit')->withErrors($validation);
		}

		try{

			$input = Input::all();
			Client::whereId($client_id)->update($input);

			return Redirect::to( $this->prefix . '/client/'.$client_id.'/edit' )->withStatus('Client has been successfully updated.');

		}
		catch(Exception $e){
			//echo $e->getMessage();
			return Redirect::to( $this->prefix . '/client/'.$client_id.'/edit')->withErrors([$e->getMessage()]);	
		}

	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function deleteUser($id)
	{
		//
		if(empty($id)) return Redirect::to($this->prefix.'/client');

		Client::find($id)->delete();

		return Redirect::to($this->prefix.'/client')->withStatus('Client has been successfully deleted.');
	}


	public function editDeleteClient(){

		$data = [
			'clients' => Client::all()
		];
		return View::make('client.editdeleteclient', $data);
	}

	
	public function postEditDeleteClient(){

		$id = Input::get('id');
		if(empty($id)) return false;

		Client::find($id)->delete();

		return Redirect::to( $this->prefix . '/editdeleteclient' )->withStatus('Client has been successfully deleted.');
	}


	public function viewClient(){

		$id = Input::get('client_id');
		if(empty($id)) return ['data'=>'Client Not Found'];

		$client = Client::find($id)->toArray();
		$data = View::make('client.view_model')->with('client', $client)->render();
		return Response::Json(['data'=>$data]);

	}


}
