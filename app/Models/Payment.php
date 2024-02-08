<?php

namespace App\Models;

use App\Conserns\HasPrice;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory,HasPrice;
    protected $casts=[
        'data'=>'json',
    ];

    protected $fillable=[
        'user_id',
        'subscription_id',
        'currency_code',
        'status',
        'payment_gateway',
        'gateway_reference_id',
        'data',
        'amount',
    ];


}
