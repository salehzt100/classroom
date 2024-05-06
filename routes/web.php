<?php

use App\Http\Controllers\Auth\TwoFactorAuthenticationController;
use App\Http\Controllers\ClassroomPeopleController;
use App\Http\Controllers\ClassroomsController;
use App\Http\Controllers\ClassworkController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\JoinClassroomController;
use App\Http\Controllers\LanguageSelectorsController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TopicsController;
use App\Http\Controllers\Webhooks\StripeController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//require __DIR__ . '/auth.php';

//Route::get('classrooms/create', [ClassroomsController::class, 'create'])->name('classrooms.create');
//Route::post('/classrooms', [ClassroomsController::class, 'store'])->name('classrooms.store');
//Route::get('/classrooms', [ClassroomsController::class, 'index'])->name('classrooms.index');
//Route::get('/classrooms/{classroom}/edit', [ClassroomsController::class, 'edit'])->name('classrooms.edit');
//Route::put('/classrooms/{classroom}', [ClassroomsController::class, 'update'])->name('classrooms.update')->where(['id' => '\d+']);
//Route::get('/classrooms/{classroom}', [ClassroomsController::class, 'show'])->name('classrooms.show');
//Route::delete('/classrooms/{classroom}', [ClassroomsController::class, 'destroy'])->name('classrooms.destroy');*/

Route::view('/profile', 'profile')->name('profile');

Route::view('/', 'home')->name('home');

Route::view('features', 'features')->name('features');
Route::get('pricing',[PlanController::class,'index'])->name('pricing');
Route::view('about-as', 'aboutAs')->name('aboutAs');
Route::view('contact', 'contact')->name('contact');


Route::middleware(['auth','verified'])->group(function () {

    Route::prefix('classrooms/trashed')
        ->as('classrooms.')->controller(ClassroomsController::class)
        ->group(function () {

            Route::get('/', 'trashed')->name('trashed');
            Route::put('/{classroom}', 'restore')->name('restore')->middleware('password.confirm');

            Route::delete('/{classroom}', 'forceDelete')->name('forceDelete')->middleware('password.confirm');


        });

    Route::get('/classrooms/{classroom}/join', [JoinClassroomController::class, 'create'])
        ->middleware('signed')
        ->name('classrooms.join');
    Route::post('/classrooms/{classroom}/join', [JoinClassroomController::class, 'store']);


    //// route model binding
    Route::resource('classrooms', ClassroomsController::class)->except(['destroy']);
    Route::delete('classrooms/{classroom}', [ClassroomsController::class, 'destroy'])
        ->name('classrooms.destroy')
        ->middleware('password.confirm');

    Route::resource('topics', TopicsController::class);
    Route::resource('classrooms.classworks', ClassworkController::class);

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



    Route::post('subscriptions',[SubscriptionController::class,'store'])
        ->name('subscriptions.store');

    Route::post('payments',[PaymentsController::class,'store'])
        ->name('payments.store');
    Route::get('payments/{subscription}/success',[PaymentsController::class,'success'])
        ->name('payments.success');
    Route::get('payments/{subscription}/cancel',[PaymentsController::class,'cancel'])
        ->name('payments.cancel');

    Route::get('subscriptions/{subscription}/pay',[PaymentsController::class,'create'])
        ->name('checkout');


    Route::get('2fa',[TwoFactorAuthenticationController::class,'create']);

    Route::get('classrooms/{classroom}/chat',[ClassroomsController::class,'chat'])
        ->name('classrooms.chat');


});

Route::post('language/change',LanguageSelectorsController::class)->name('locale');

Route::post('/payments/stripe/webhook',StripeController::class);


/*Route::get('/dashboard',[ClassroomsController::class,'index'])->middleware(['verified']);*/


