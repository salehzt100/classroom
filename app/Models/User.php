<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];




    public function classrooms() :BelongsToMany
    {
        return $this->belongsToMany(
            Classroom::class,           // related model
            'classroom_user',       // pivot table
            'user_id', // FK for current model in pivot table
            'classroom_id',      // FK for related model in pivot table
            'id',               // PK for currant model
            'id'                // PK for related model

        )->withPivot(['role','created_at']);
    }

    public function createdClassroom() :HasMany
    {
        return $this->hasMany(Classroom::class,'user_id');
    }

    public function classworks() :BelongsToMany
    {
        return $this->belongsToMany(Classwork::class)
            ->withPivot(['grade','submitted_at','status','created_at'])
            ->using(ClassworkUser::class);
    }

    public function comments() :HasMany
    {
        return $this->hasMany(Comment::class);
    }

    protected $appends =['user_image'];
    public function getUserImageAttribute()
    {
        $name=explode(' ',$this->name);
        return "https://ui-avatars.com/api/?name={$name[0]}}+{$name[1]}";
    }


}
