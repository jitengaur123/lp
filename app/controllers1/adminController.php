<?php

class adminController extends \BaseController {

	public $prefix = '';

	function __construct(){
		$this->prefix = Config::get('constants.PREFIX');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function adminDashboard()
	{

		if(Auth::user()->is_complete == 0){
			return Redirect::to($this->prefix.'/editprofile');
		}
		return View::make('dashboard.admin');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function document()
	{
		return View::make('dashboard.document');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function chart()
	{
		return View::make('dashboard.chart');
	}
		

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function instruction()
	{
		return View::make('dashboard.instruction');
	}


}
