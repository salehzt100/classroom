<?php

namespace App\Models;

use App\Conserns\HasPrice;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory,HasPrice;

    public function features()
    {
        return $this->belongsToMany(Feature::class,'plan_features')
            ->withPivot(['feature_value']);

    }

    public function subscriptions()
    {

        return $this->hasMany(Subscription::class);

    }

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->using(Subscription::class);

    }


}
