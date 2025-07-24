<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\GroupMemberController;
use App\Models\Group;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthenticatedSessionController::class)->group(function () {
    Route::get('/login', 'create')->name('login');
    Route::post('/login', 'store')->name('login');
    Route::post('/logout', 'destroy')->name('logout');
});
Route::get('/profile-edit', fn() => view('profile.edit'))->name('profile.edit');
Route::controller(RegisteredUserController::class)->group(function () {
    Route::get('/register', 'create')->name('register');
    Route::post('/register', 'store')->name('register');
});
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
    Route::get('/groups', [GroupController::class, 'index'])->name('index');
    Route::get('/groups/create', [GroupController::class, 'create']);
    Route::post('/groups/store', [GroupController::class, 'store']);
    Route::get('/groups/join', [GroupMemberController::class, 'create']);
    Route::post('/groups/join', [GroupMemberController::class, 'store']);
    Route::get('/groups/{id}', [GroupController::class, 'show']);
    Route::get('/groups/{id}/edit', [GroupController::class, 'edit']);
    Route::put('/groups/{id}', [GroupController::class, 'update']);
    Route::delete('/groups/{id}', [GroupController::class, 'destroy']);


    Route::get('expenses/{id}/create', [ExpenseController::class, 'create']);
    Route::post('expenses/{id}/store', [ExpenseController::class, 'store']);
});
