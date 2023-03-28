<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaymentMethod;
class PaymentMethodSeeder extends Seeder
{
    /**
	* Run the database seeds.
	* @return void
	*/
    public function run() {
        $DataArray = [
        	['title'=>'COD', 'description' => 'Pay with cash upon delivery.', 'slug' => 'cod', 'status' => 'active'],
        	['title'=>'Online Razorpay', 'description' => 'Pay via Razorpay you can pay with your credit card if you don’t have a PayPal account.', 'slug' => 'razorpay', 'status' => 'active'],
        ];
		foreach ($DataArray as $key => $value){
			PaymentMethod::create($value);
        }
    }
}