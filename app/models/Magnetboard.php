<?php

class Magnetboard extends Eloquent {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'magnet_board';

	
	/**
	 * The attributes from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fiilable = array('id','client_id', 'worksite_id');

	/**
	 * [client description]
	 * @return [type] [description]
	 */
	public function client()
	{
		return $this->belongsTo('Client', 'client_id');
	}

	/**
	 * [supervisor description]
	 * @return [type] [description]
	 */
	public function supervisor()
	{
		return $this->belongsTo('User', 'supervisor_id');	
	}

	/**
	 * [worksite description]
	 * @return [type] [description]
	 */
	public function worksite()
	{
		return $this->belongsTo('Worksite','worksite_id');
	}

	/**
	 * [magnet_users description]
	 * @return [type] [description]
	 */
	public function magnet_users()
	{
		return $this->hasMany('MagnetboardUser');
	}

	public static function experiment()
	{
        return $this->hasManyThrough('User', 'MagnetboardUser');

	}

	/**
	 * [fetchMagnetBoardWithUser description]
	 * @return [type] [description]
	 */
	public static function fetchMagnetBoardWithUser($start_date = NULL, $end_date = NULL)
	{

		$result = DB::table('magnet_board')
			->join('worksite', function ($join){
	        	$join->on('magnet_board.worksite_id', '=', 'worksite.id');
	        })
	        ->leftJoin('magnet_board_user', function($join)
	        {
	            $join->on('magnet_board.id', '=', 'magnet_board_user.magnetboard_id');
	        })
	        ->join('users', function ($join){
	        	$join->on('magnet_board_user.user_id', '=', 'users.id');
	        })
	        ->join('user_role', function ($join){
	        	$join->on('users.role', '=', 'user_role.id');
	        })

	        ->orderBy('magnet_board.id', 'desc')
	        ->select('magnet_board.started_at', 'worksite.job_name','users.job_title','users.first_name', 'users.last_name','users.role', 'user_role.title');

	   	if($start_date != NULL && $end_date != NULL)
	   	{
	   		$result->whereBetween(DB::raw('DATE(magnet_board.started_at)'), array($start_date, $end_date));
	   	}
	   	elseif($start_date != NULL && $end_date == NULL)
	   	{
	   		$result->where(DB::raw('DATE(magnet_board.started_at)'), '=', $start_date);
	   	}
	   	$result->orderBy(DB::raw('DATE(magnet_board.started_at)'),'desc');
	        //$result->get();

	     return $result;

	}
}