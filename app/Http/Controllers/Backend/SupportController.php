<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

use App\Models\Helpers\CommonHelper;
use App\Models\User;

class SupportController extends Controller
{
	use CommonHelper;
	
	/*
	 *----------------------
	 * Clear Cache
	 *----------------------
	*/
	public function clear_cache(){
		Artisan::call('config:clear');
		echo 'Config cleared </br>';
		Artisan::call('route:clear');
		echo 'Route cleared </br>';
		Artisan::call('cache:clear');
		echo 'Cache cleared </br>';
		Artisan::call('view:clear');
		echo 'View cleared </br>';
    }
	
	/*
	 *----------------------
	 * Create Cache
	 *----------------------
	*/
	public function caches(){
		Artisan::call('config:cache');
		echo 'Config cached </br>';
		Artisan::call('route:cache');
		echo 'Route cached </br>';
		Artisan::call('optimize');
		echo 'Optimize';
    }
	
	/*
	 *----------------------
	 * Run Migration
	 *----------------------
	*/
	public function migration(){
		Artisan::call('migrate');
		return "Migrate run successfully!!";
    }
	
	/*
	 *----------------------
	 * Run Database Seeder
	 *----------------------
	*/
	public function seeding(){
		//Artisan::call('db:seed');
		return "Seeder run successfully!!";
    }
	
	// ENCRYPT DECRYPT
	public function encrypt_decrypt($type = ''){
		if($type == ''){ exit('Invalid Type'); }
		
		exit("Can't access this function directly");
		$users = User::get();
		if(!empty($users)){
			$query = 0;
			foreach($users as $list){
				$array = [
					'name' => $this->make_encrypt_decrypt($list->name, $type),
					'email' => $this->make_encrypt_decrypt($list->email, $type),
					'phone_number' => $this->make_encrypt_decrypt($list->phone_number, $type),
				];

				$query = User::where('id', $list->id)->update($array);
			}
			if($query){
				exit(ucfirst($type).' Successfully!!');
			}
		}
	}

	/* GENERATE FORMATE */
	public function make_encrypt_decrypt($text, $type = ''){
		//IF ENCRYPT
		if($type == 'encrypt'){
			return CommonHelper::encryptData($text);
		}
		if($type == 'decrypt'){
			return CommonHelper::decryptData($text);
		}
	}
}