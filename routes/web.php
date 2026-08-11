<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/user/dashboard',function(){
    // $users = Auth::user();
    return view('user-dashboard');
})->name('user.dashboard')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Post route
// Route::resource('/post', PostController::class)->middleware('auth');
// Route::resource('/post', PostController::class)->middleware('auth')->middleware('can:update');
// Route::resource('/post', PostController::class)->middleware(['auth','can:update']);

// Route::get('/post',function(){
//     //return redirect()->route('post.create');
//     return to_route('post.create');
// })->name('post.index');
// Route::get('/post/create', function () {
//     return "Post Create";
// })->name('post.create');
Route::get('/post', [PostController::class,'index'])->name('post.index');
Route::get('/post',[PostController::class,'create'])->name('post.create');


//Mail Sending
Route::get('/send-mail',function(){
    return view('send-mail');
});

Route::post('/send-mail',function(Request $request){

    // Mail::raw($request->message,function($message) use ($request){
    //     $message->to($request->email)
    //     ->subject('Larabel Test mail');
    // });

    Mail::to($request->email)->send(new SendMail($request->message));
})->name('send-mail');
