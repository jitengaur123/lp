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


	public function upload(){

		return View::make('repository.upload');

	}

	public function uploadfiles(){

		$input = Input::all();

		$user_name = Auth::user()->user_name;

		// getting all of the post data
		$files = Input::file('files');
		foreach($files as $file) {
			// validating each file.
			$rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
			$validator = Validator::make(array('file'=> $file), $rules);
			if($validator->passes()){
				// path is root/uploads
				$destinationPath = public_path().'/files/'.$user_name;
				$filename = uniqid().$file->getClientOriginalName();
				$upload_success = $file->move($destinationPath, $filename);
				// flash message to show success.
				
			} 
			else {
				// redirect back with errors.
				return Redirect::to($this->prefix . '/repository/upload' )->withInput()->withErrors($validator);
			}
		}

		return Redirect::to( $this->prefix . '/repository/upload' )->withStatus('Files has been successfully uploaded.');


	}

}
