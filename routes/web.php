<?php

use App\Http\Controllers\ClassroomPeopleController;
use App\Http\Controllers\ClassroomsController;
use App\Http\Controllers\ClassworkController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\JoinClassroomController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TopicsController;
use App\Models\Submission;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

//Route::get('classrooms/create', [ClassroomsController::class, 'create'])->name('classrooms.create');
//Route::post('/classrooms', [ClassroomsController::class, 'store'])->name('classrooms.store');
//Route::get('/classrooms', [ClassroomsController::class, 'index'])->name('classrooms.index');
//Route::get('/classrooms/{classroom}/edit', [ClassroomsController::class, 'edit'])->name('classrooms.edit');
//Route::put('/classrooms/{classroom}', [ClassroomsController::class, 'update'])->name('classrooms.update')->where(['id' => '\d+']);
//Route::get('/classrooms/{classroom}', [ClassroomsController::class, 'show'])->name('classrooms.show');
//Route::delete('/classrooms/{classroom}', [ClassroomsController::class, 'destroy'])->name('classrooms.destroy');*/


Route::view('/', 'welcome')->name('home');

Route::middleware(['auth'])->group(function () {

    Route::prefix('classrooms/trashed')
        ->as('classrooms.')->controller(ClassroomsController::class)
        ->group(function () {

            Route::get('/', 'trashed')->name('trashed');
            Route::put('/{classroom}', 'restore')->name('restore');
            Route::delete('/{classroom}', 'forceDelete')->name('forceDelete');

        });

    Route::get('/classrooms/{classroom}/join', [JoinClassroomController::class, 'create'])
        ->middleware('signed')
        ->name('classrooms.join');
    Route::post('/classrooms/{classroom}/join', [JoinClassroomController::class, 'store']);


    //// route model binding
    Route::resources([
        'classrooms' => ClassroomsController::class,
        'topics' => TopicsController::class,
        'classrooms.classworks' => ClassworkController::class
    ]);

//    Route::resource('classrooms.classworks',ClassworkController::class)
//        ->shallow();

    Route::get('classrooms/{classroom}/people',[ClassroomPeopleController::class,'index'])
        ->name('classrooms.people');
    Route::delete('classrooms/{classroom}/people',[ClassroomPeopleController::class,'destroy'])
        ->name('classrooms.people.destroy');

    Route::post('comments',[CommentController::class,'store'])
        ->name('comments.store');

    Route::post('classrooms/{classroom}/posts',[PostController::class,'store'])
        ->name('posts.store');

    Route::post('classworks/{classwork}/submissions',[SubmissionController::class,'store'])
        ->name('submissions.store');

    Route::get('submissions/{submission}/file',[SubmissionController::class,'file'])
        ->name('submissions.file');



    Route::post('subscriptions',[SubscriptionController::class,'store'])->name('subscriptions.store');

    Route::get('plans',[PlanController::class,'index']);

});

