<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    /**    const CREATED_AT = 'created_at';
     * const UPDATED_AT = 'updated_at';
     * protected $connection='mysql';
     *
     * protected $table='topics';
     * protected $primaryKey='id';
     * protected $keyType='int';
     * public $incrementing=true;
     */


    protected $fillable = [
        'name',
        'classroom_id',
        'user_id'
    ];

    public $timestamps = false;

    public function classrooms()
    {
        return $this->hasMany(Classwork::class);
    }


}
