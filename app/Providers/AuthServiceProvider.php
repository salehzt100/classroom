<?php

namespace App\Providers;

 use App\Models\Classroom;
 use App\Models\Classwork;
 use App\Models\Scopes\UserClassroomScope;
 use App\Models\User;
 use Illuminate\Auth\Access\Response;
 use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Defined Gates (abilities)


////// -------  for  {filter} , this call before any {Gate} --------
//        Gate::before(function (User $user){
//            if ($user->super_admin)
//            {
//                return true
//            }
//
//        });


//        Gate::define('classwork.view',function (User $user,Classwork $classwork){
//
//                $isTeacher=$user
//                ->classrooms()
//                ->wherePivot('classroom_id','=',$classwork->classroom_id)
//                ->wherePivot('role','=','teacher')
//                ->exists();
//                $isAssigned=$user
//                    ->classworks()
//                    ->wherePivot('classwork_id','=',$classwork->id)
//                    ->exists();
//                return $isTeacher || $isAssigned;
//
//        });
//        Gate::define('classwork.create',function (User $user,Classroom $classroom){
//            $result= $user
//                ->classrooms()
//                ->withoutGlobalScope(UserClassroomScope::class)
//                ->wherePivot('classroom_id','=',$classroom->id)
//                ->wherePivot('role','=','teacher')
//                ->exists();
//            return $result
//                ?Response::allow()
//                :Response::deny("you aren't a teacher in this classroom");
//
//        });
//        Gate::define('classwork.update',function (User $user,Classwork $classwork){
//            return
//                $classwork->user_id == $user->id
//                &&
//                $user
//                ->classrooms()
//                ->wherePivot('classroom_id','=',$classwork->classroom_id)
//                ->wherePivot('role','=','teacher')
//                ->exists();
//
//        });
//        Gate::define('classwork.delete',function (User $user,Classwork $classwork){
//            return
//                $classwork->user_id == $user->id
//                &&
//                $user
//                ->classrooms()
//                ->wherePivot('classroom_id','=',$classwork->classroom_id)
//                ->wherePivot('role','=','teacher')
//                ->exists();
//
//        });

        Gate::define('submission.create',function (User $user,Classwork $classwork){

            $isTeacher=$user
                ->classrooms()
                ->wherePivot('classroom_id','=',$classwork->classroom_id)
                ->wherePivot('role','=','teacher')
                ->exists();
            if ($isTeacher)
            {
                return false;
            }

            return $user
                ->classworks()
                ->wherePivot('classwork_id','=',$classwork->id)
                ->exists();
        });

    }
}
