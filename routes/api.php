<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

use App\Models\User;

Route::get('users', function() {

    $users = User::all();

    return response()->json($users);


});

Route::get('user/{id}', function($id) {

    $user = User::find($id);

    return response()->json($user);

});

Route::get('delete-user/{id}', [UserController::class, 'deleteUser'])->name('api-delete-user');
