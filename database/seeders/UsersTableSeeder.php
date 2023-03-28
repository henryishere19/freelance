<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
	* Run the database seeds.
	* @return void
	*/
    public function run()
    {
        for ($i=0; $i < 3; $i++) {
	    	if($i == 0){
	    		$id 			= '8';
	    		$name 			= 'XBBcR7SBj4TodAKaAecF';
	    		$role 			= 'Developer';
	    		$email 			= 'fBBcR7SB76PvcQqZB+EHqdZ7K/PHig==';
	    		$country_code 	= '+91';
	    		$phone_number 	= 'N0IGGuDJlve2LA==';
	    		$password 		= '$2y$10$6cV.otGGMzmAQaGH3FqG3.l8N/GoN9C3J.wqyR5oW1yYgA7oEBlOa';
	    	} else if($i == 1){
				$id 			= '2';
	    		$name 			= 'fARCSKe5y63pew==';
	    		$role 			= 'superAdmin';
				$email 			= 'fARCSKe5y63pey+SA+YI4sdnaA==';
	    		$country_code 	= '+91';
	    		$phone_number 	= 'PkMBGeDOlvC3LQ==';
				$password 		= '$2y$10$vBrOFl3aXxxE6oObf1mzI.Yv5Zok2zKYhGOv2kbAO9tasIWWP9Sxq';
	    	} else if($i == 2){
				$id 			= '3';
	    		$name 			= 'XBBcR7SBj4TodAKaAecF';
	    		$role 			= 'Customer';
				$email 			= 'exlXXrSWxaH5JV/HIugJrc1kK/PHig==';
	    		$country_code 	= '+91';
	    		$phone_number 	= 'N0IGGuDJlve2LQ==';
				$password 		= '$2y$10$6cV.otGGMzmAQaGH3FqG3.l8N/GoN9C3J.wqyR5oW1yYgA7oEBlOa';
	    	}
	    	$user = User::firstOrCreate([
			            'id' 				=> $id,
			            'name' 				=> $name,
			            'email' 			=> $email,
			            'country_code' 		=> $country_code,
			            'phone_number' 		=> $phone_number,
			            'password' 			=> $password,
			            'user_type' 		=> $role,
			            'profile_image' 	=> '',
			            'dob' 				=> NULL,
			            'status' 			=> 'active',
			            'email_verified_at' => date('Y-m-d H:i:s'),
			        ]);
   			//$user->assignRole([$role->id]);
    	}
    }
}