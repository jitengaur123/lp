<?php

class repositoryController extends \BaseController {

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
		return View::make('repository.list');
	}

	function access($attr, $path, $data, $volume) {
			return strpos(basename($path), '.') === 0       // if file/folder begins with '.' (dot)
				? !($attr == 'read' || $attr == 'write')    // set read+write to false, other (locked+hidden) set to true
				:  null;                                    // else elFinder decide it itself
		}

	function filemanager(){


		$opts = array(
			// 'debug' => true,
			'roots' => array(
				array(
					'driver'        => 'LocalFileSystem',   // driver for accessing file system (REQUIRED)
					'path'          => '../files/',         // path to files (REQUIRED)
					'URL'           => dirname($_SERVER['PHP_SELF']) . '/../files/', // URL to files (REQUIRED)
					'accessControl' => 'access'             // disable and hide dot starting files (OPTIONAL)
				)
			)
		);

		// run elFinder
		$connector = new elFinderConnector(new elFinder($opts));
		$connector->run();
	}
}
