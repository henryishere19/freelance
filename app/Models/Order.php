<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    
    protected $fillable = [
		'custom_order_id','owner_id','user_id', 'address_id', 'address','contact_person','contact_email','contact_phone_number',
		'coupon_id','item_count','tax','discount','delivery_fee','item_total','grand_total',
		'payment_tracking_id','payment_method_id','payment_mode','payment_status',
		'order_notes','order_date','delivery_date','status','tracking_id','goods_received'
	];

    // Get User detail
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    // Get address detail
    public function address(){
        return $this->belongsTo(Address::class,'address_id');
    }

    // Get order items
    public function order_items(){
        return $this->hasMany(OrderItem::class, 'order_id','id');
    }

    // Get payment Gateway Details
    public function payment(){
        return $this->belongsTo(Payment::class,'payment_method_id');
    }

    // Get coupon detail
    public function coupon(){
        return $this->belongsTo(Coupon::class,'coupon_id');
    }
}