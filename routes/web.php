<?php

use App\Http\Controllers\Admin\TicketController as AdminTicketController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TicketController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/services', [PageController::class, 'services'])->name('services');

Route::middleware(['auth', 'verified'])->group(function(){
    Route::resource('/message', MessageController::class);
    Route::resource('/ticket', TicketController::class);

    Route::middleware(['role:admin'])->name('admin.')->prefix('admin')->group(function(){
        Route::resource('ticket', AdminTicketController::class);
        Route::post('ticket/{ticket}/close', [AdminTicketController::class, 'close'])->name('ticket.close');
    });
});
