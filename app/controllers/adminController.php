<?php

class adminController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function adminDashboard()
	{
		
		return View::make('dashboard.admin');
	}




}
