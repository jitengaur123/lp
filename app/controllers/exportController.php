<?php

class exportController extends \BaseController {

	public $prefix = '';

	/**
	 * [__construct description]
	 */
	function __construct(){
		$this->prefix = Config::get('constants.PREFIX');
	}

	/**
	 * [user_export description]
	 * @return [type] [description]
	 */
	public function user_export(){

		Excel::create('User', function($excel) {

		    $excel->sheet('User', function($sheet) {

		        $users = User::where('id', '!=', Auth::user()->id)->withTrashed()->with('userrole')->get();// User::all();
		        $sheet->loadView('export.user')->with('users', $users);

		    });

		})->export('csv');
	}

	/**
	 * [client_export description]
	 * @return [type] [description]
	 */
	public function client_export(){

		Excel::create('Client', function($excel) {

		    $excel->sheet('Client', function($sheet) {

		    	$clientList = Client::all();
		        $sheet->loadView('export.client')->with('clients', $clientList);

		    });

		})->export('csv');
	}

	/**
	 * [worksite_export description]
	 * @return [type] [description]
	 */
	public function worksite_export(){

		Excel::create('Worksite', function($excel) {

		    $excel->sheet('Worksite', function($sheet) {

		    	$worksiteList = Worksite::where('id','!=', 0)->with('client')->get()->toArray();
		        $sheet->loadView('export.worksite')->with('worksites', $worksiteList);

		    });

		})->export('csv');
	}

	/**
	 * [magnet_export description]
	 * @return [type] [description]
	 */
	public function magnet_export(){

		Excel::create('Magnet Board', function($excel) {

		    $excel->sheet('Magnet Board', function($sheet) {

		    	$m = new Magnetboard;
				$Magnetboard = $m->fetchMagnetBoardWithUser(Input::get('start_date'), Input::get('end_date'))->get();
		        $sheet->loadView('export.magnet')->with('magnetboard', $Magnetboard);

		    });

		})->export('csv');
	}


	/**
	 * [workreport_export description]
	 * @return [type] [description]
	 */
	public function workreport_export(){

		Excel::create('Work Report', function($excel) {

		    $excel->sheet('Work Report', function($sheet) {

		    	$start_date = Input::get('start_date');
		    	$end_date = Input::get('end_date');

				$reports = Workreport::with('client')->with('worksite')->with('submitby');
				if(Input::has('start_date') && Input::has('end_date'))
			   	{
			   		$reports->whereBetween(DB::raw('DATE(date_create)'), array($start_date, $end_date))->get();
			   	}
			   	elseif(Input::has('start_date') && !Input::has('end_date'))
			   	{
			   		$reports->where(DB::raw('DATE(date_create)'), '=', $start_date)->get();
			   	}
				$reports = $reports->get();
		        $sheet->loadView('export.workreport')->with('reports', $reports);

		    });

		})->export('csv');
	}


	
}
