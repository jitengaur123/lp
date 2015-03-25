<?php

class postController extends \BaseController {

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
		
		$posts = Post::all();
		$data = [
			'posts' => $posts
		];
		
		return View::make('post.list', $data);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		return View::make('post.add');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		return Input::all();
		//
		$rules = [
			'page_name'		=> 'required',
			'description'	=> 'required'
		];

		$input = Input::all();

		$validation = Validator::make($input, $rules);

		if($validation->fails()){
			return Redirect::to( $this->prefix . '/post/create')->withErrors($validation);
		}

		try{

			Post::insert($input);
			return Redirect::to( $this->prefix . '/post/create' )->withStatus('Post has been successfully added.');

		}
		catch(Exception $e){
			//echo $e->getMessage();
			return Redirect::to( $this->prefix . '/post/create' )->withErrors([$e->getMessage()]);	
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
		$post = Post::whereId($id)->get();
		$data = [
			'post' => $post[0],
			
		];
		
		return View::make('post.view', $data);

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
		$post = Post::whereId($id)->get();

		
		$data = [
			'post'  	=> $post[0],
			
		];
		return View::make('post.edit', $data);
	}

	/**
	 * update worksite by post
	 *
	 * @param  int  
	 * @return Response
	 */
	public function update($id){

		//
		$rules = [
			'page_name'		=> 'required',
			'description'	=> 'required'
		];


		$input = Input::all();

		$validation = Validator::make($input, $rules);

		if($validation->fails()){
			return Redirect::to( $this->prefix . '/post/'.$id.'/edit')->withErrors($validation);
		}

		try{


			
			Post::where('id','=',$id)->update($input);

			

			return Redirect::to( $this->prefix . '/post/'.$id.'/edit')->withStatus('Post has been successfully updated.');

		}
		catch(Exception $e){
			//echo $e->getMessage();
			return Redirect::to( $this->prefix . '/post/'.$id.'/edit' )->withErrors([$e->getMessage()]);	
		}

	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
		//
		if(empty($id)) return Redirect::to($this->prefix.'/post');

		Post::find($id)->delete();

		return Redirect::to($this->prefix.'/post')->withStatus('Post has been successfully deleted.');
	}


	
}
