<?php

class Helpers
{
	
	/**
	* Prefix url function based on level
	* like (admin, supervisor and auditor)
	*
	* @return string
	*/
	public static function prefixUrl(){
		
		$prefix = '';
		if(Auth::check()){
			$prefix = 'admin';
				
			if(Auth::user()->level == 2){
				
				$prefix = 'supervisor';
			
			}elseif(Auth::user()->level == 3){
			
				$prefix = 'field';
			
			}  
		}
		return $prefix;
	}
}