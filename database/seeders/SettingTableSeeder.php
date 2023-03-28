<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;
class SettingTableSeeder extends Seeder
{
    /**
	* Run the database seeds.
	* @return void
	*/
    public function run() {
        $settingArray = [
        	['name'=>'site_name', 'value' => 'Demo', 'status' => 'active' ],
        	['name'=>'contact_no', 'value' => '+91 1234567890', 'status' => 'active' ],
        	['name'=>'site_email', 'value' => 'demo@example.com', 'status' => 'active' ],
            ['name'=>'site_short_name', 'value' => 'Demo', 'status' => 'active' ],
            ['name'=>'app_version', 'value' => '1.0.0', 'status' => 'active' ],
            ['name'=>'copy_rights_credit_line', 'value' => 'Demo', 'status' => 'active' ],
            ['name'=>'copy_rights_year', 'value' => '2020-2021', 'status' => 'active' ],
            ['name'=>'google_map_api_key', 'value' => '111', 'status' => 'active' ],
            ['name'=>'moderation_queue', 'value' => 'on', 'status' => 'active' ],
            ['name'=>'fcm_server_key', 'value' => 'AAAAUot9YAc:APA91bF7IpPFZNq_3_FbXCTV67pbAyRgIaOm1wnnJK1', 'status' => 'active' ],
            ['name'=>'address', 'value' => '123 main street', 'status' => 'active' ],
            ['name'=>'logo', 'value' => 'default/logo.png', 'status' => 'active' ],
            ['name'=>'is_encrypt_decrypt', 'value' => '1', 'status' => 'active' ],
        ];
		foreach ($settingArray as $key => $value) {
			Setting::create($value);
        }
    }
}