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


	


}
