<?php

use App\Http\Controllers\ProfileController;
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

use App\Http\Controllers\FileController;

Route::prefix('file')->group(function() {
    Route::view('upload', 'upload-file');
    Route::post('upload', [FileController::class , 'postUploadFile'])->name('post-upload-file');
});

use App\Http\Controllers\PaymentReminderController;

Route::get('test-email', [PaymentReminderController::class, 'enqueue']);

use App\Http\Controllers\PhotoController;

Route::get('photo/{username}/comment', [PhotoController::class, 'getNotifyUserForNewComment'])->name('get-notify-user-for-comment');

use App\Http\Controllers\CallBackController;
Route::get('request-callback', [CallBackController::class, 'requestCallBack']);

Route::get('notifications', [CallBackController::class, 'getNotifications']);

use App\Models\User;

Route::get('update-this-article/{id}', function(Request $request, $id) {

    $article = \App\Models\Article::find($id);

    $user = User::where('id', 2)->first();

    // $user = Auth::user();

    // if (!Gate::allows('update-article', $article)) {
    //     echo 'You are not owner';
    // } else {
    //     echo 'You are owner';
    // }

    if(Gate::forUser($user)->allows('update-article', $article)) {
        echo 'You are owner';
    } else {
        echo 'You are not owner';
    }

});











Route::get('update-article/{id}', function($id) {

    $article = \App\Models\Article::find($id);

    $user = Auth::user();

    if($user->can('updateArticle', $article))
    {
        echo 'you can update this article';
    }
    else
    {
        echo 'you cannot update';
    }

});



















use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

Route::get('create-token/{token}', function(Request $request) {

    $encToken = Crypt::encryptString($request->token);

    echo '<a href="/d/' . $encToken . '">Decrypt</a>';
    echo '<br />' . $encToken;
});

Route::get('/d/{token}', function(Request $request) {
    try {
        $decrypted = Crypt::decryptString($request->token);
        echo $decrypted;
    } catch (DecryptException $e) {
    //
    }
});








use Avinash\Seth\Greet;

Route::get('/greet/{name}', function ($name) {
    
    $greet = new Greet();
    
    return $greet->greet($name);

});












    

require __DIR__.'/auth.php';
