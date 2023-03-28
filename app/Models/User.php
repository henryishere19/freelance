<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
	//use HasRoles;
    use Notifiable;
	use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone_number',
		'user_type','status','is_subscribed','added_by_id','profile_image','country_code','dob','gender',
		'noti_via_nitification','noti_via_email','show_order_notification',
		'vendor_approved','verified_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

	// Get Device Details
    public function device_detail(){
        return $this->hasOne(DeviceDetail::class, 'user_id','id');
    }
	
	// Get Orders
    public function orders(){
        return $this->hasMany(Order::class, 'user_id','id');
    }
	
	// Get Addresses
    public function address(){
        return $this->hasMany(Address::class, 'user_id');
    }
}