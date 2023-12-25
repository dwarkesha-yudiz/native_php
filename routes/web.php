<?php

use App\Livewire\Addreminder;
use App\Livewire\Reminders;
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

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');
// Guest Routes
Route::get('reminder-app', Reminders::class)->name('reminder-app');

Route::get('/add-reminder', Addreminder::class)->name('add-reminder');
