<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

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

require __DIR__.'/auth.php';


//my routing 
Route::get('/', [TicketController::class, 'index'])->name('index');
Route::get('/search', [TicketController::class, 'search'])->name('Search Ticket'); 
// Route::get('/Report', function () { return view('Report');})->name('Report');
Route::get('/Admin', [TicketController::class,'showadmin'])->name('Admin');


Route::get('/ticket/create', [TicketController::class, 'create'])->name('raise ticket');
Route::post('/ticket', [TicketController::class, 'store'])->name('store'); //Handles form submissions to /ticket by calling the store method in TicketController
Route::get('/ticket/{ticket}/edit', [TicketController::class, 'edit'])->name('ticket.edit');
Route::put('/ticket/{ticket}', [TicketController::class, 'update'])->name('ticket.update');
Route::delete('/ticket/{ticket}', [TicketController::class, 'destroy'])->name('ticket.destroy');
Route::get('/ticket/{ticket}', [TicketController::class, 'show'])->name('ticket.show');    


