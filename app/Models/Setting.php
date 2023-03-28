<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Helpers\CommonHelper;

class Setting extends Model
{
    protected $table = 'setting';

    protected $fillable = ['name','value','status'];
    
	public static function get($name){
    	$value = Setting::where('name',$name)->first();
    	return $value->value; 
    }
    
	public static function has($name){
    	$value = Setting::where('name',$name)->first();
    	if($value){
    		return true;
    	} else {
    		return false;
    	}
    }
	
	public static function decryptData($data){
		if(empty($data)){ return; }
		
		return CommonHelper::decryptData($data);
    }
}