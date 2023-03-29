<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;

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
    return view('dashboard');
});

// -------
// EVENTS
Route::get('/eventlist', [EventController::class, 'index']);
// Add event
Route::get('/addevent', [EventController::class, 'create']);
Route::post('/addevent', [EventController::class, 'store']);
// Edit event
Route::get('/editevent/{event}', [EventController::class, 'edit']);
Route::post('/editevent/{event}', [EventController::class, 'update']);
// Delete event
Route::delete('/eventlist/{event}', [EventController::class, 'destroy']);
// -----------------------------------------------------------------------

// -------
// USERS
Route::get('/users', [UserController::class, 'index']);
Route::post('/usersByRole', [UserController::class, 'usersByRole']);
// Add user
Route::get('/adduser', [UserController::class, 'create']);
Route::post('/adduser', [UserController::class, 'store']);
// Edit user
Route::get('/edituser/{user}', [UserController::class, 'edit']);
Route::post('/edituser/{user}', [UserController::class, 'update']);
// Delete user
Route::delete('/users/{user}', [UserController::class, 'destroy']);
// -----------------------------------------------------------------