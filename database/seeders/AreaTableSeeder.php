<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Area;

class AreaTableSeeder extends Seeder
{
    /**
	* Run the database seeds.
	* @return void
	*/
    public function run(){
        $cityArray = [
			[1, 'Satellite', 1, '380015'],
			[2, 'Bopal', 1, '380058'],
			[3, 'Gota', 1, '380081'],
			[4, 'Science City', 1, '380060'],
		];
        foreach ($cityArray as $key => $value) {
            $createArray = [
				'title' 		=> $value[1],
				'city_id' 		=> $value[2],
				'postal_code' 	=> $value[3],
			];
			Area::create($createArray);
        }
    }
}