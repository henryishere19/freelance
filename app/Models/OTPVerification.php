<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OTPVerification extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'otp_verifications';

    protected $fillable = ['phone_number','email','code','status'];

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
   
}
