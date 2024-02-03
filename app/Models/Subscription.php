<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable=[
        'plan_id' ,
        'user_id' ,
        'expired_at' ,
        'price'  ,
    ];
    public function user() :BelongsTo
    {
       return $this->belongsTo(User::class);
    }
    public function plan() :BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }
}
