<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\RemarkController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\SuperAdminMiddleware;
use App\Http\Middleware\ValidUser;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return redirect()->route('index');
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

Route::prefix('ticket')->group(function () {
    Route::get('/create', [TicketController::class, 'create'])->name('raise ticket')->middleware(ValidUser::class);
    Route::post('/', [TicketController::class, 'store'])->name('store'); 
    Route::get('/{ticket}/edit', [TicketController::class, 'edit'])->name('ticket.edit')->middleware(AdminMiddleware::class);
    Route::put('/{ticket}', [TicketController::class, 'update'])->name('ticket.update')->middleware(AdminMiddleware::class);
    Route::patch('/{ticket}', [TicketController::class, 'update'])->name('ticket.update')->middleware(AdminMiddleware::class);
    Route::delete('/{ticket}', [TicketController::class, 'destroy'])->name('ticket.destroy')->middleware(AdminMiddleware::class);
    Route::get('/{ticket}', [TicketController::class, 'show'])->name('ticket.show')->middleware(AdminMiddleware::class);
});

// Remarks CRUD
Route::post('/ticket/{ticket}/remarks', [RemarkController::class, 'store'])->name('remarks.store');
Route::resource('remarks', RemarkController::class)->only(['edit', 'update', 'destroy'])->middleware(AdminMiddleware::class);

Route::get('/users', [SuperadminController::class, 'showUsers'])->name('Users');
Route::get('/users/create', [SuperadminController::class, 'createUser'])->name('create.user');
Route::post('/users', [SuperadminController::class, 'storeUser'])->name('store.user');
// Route::post('user/{user}', [SuperadminController::class, 'destroy'])->name('user.destroy');
Route::delete('user/{user}', [SuperadminController::class, 'destroy'])->name('user.destroy');
