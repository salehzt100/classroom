<?php

namespace App\Models;

use App\Models\Scopes\UserClassroomScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class Classroom extends Model
{
    use HasFactory,SoftDeletes;

    public static string $disk='public';

    protected $fillable = [
        'name',
        'code',
        'status',
        'section',
        'subject',
        'room',
        'cover_image_path',
        'theme',
    ];

    public static function uploadCoverImage($file)
    {
        return  $file->store('/covers', [
           'disk'=> static::$disk
        ]);

    }
    protected static function booted()
    {
        static::addGlobalScope(new UserClassroomScope());


//        static::addGlobalScope('user',function (Builder $query){
//            $query->where('user_id','=',Auth::id());
//        });


        // I can use withoutGlobalScope({name of global scope }) or withoutGlobalScopes() to avoid  scopes

    }

    public static function deleteCoverImage($path)
    {
        if ($path && Storage::disk(static::$disk)->exists($path)){
            return Storage::disk(static::$disk)->delete($path);

        }
    }



    // local scopes

    public function scopeActive(Builder $query)
    {
        $query->where('status','=','active');
    }
    public function scopeRecent(Builder $query)
    {
        $query->orderBy('updated_at','DESC');
    }
    public function scopeStatus(Builder $query, String $status = 'active')
    {
        $query->where('status','=',$status);

    }

    public function join(string $user_id , string $role='student')
    {
       return DB::table('classroom_user')->insert([
            'classroom_id'=>$this->id ,
            'user_id'=>$user_id,
            'role'=>$role,
            'created_at'=>now(),
        ]);
    }
}
