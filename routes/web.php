<?php

use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Models\Ticket;

// //clicking on ticket will view the raisetaicke blade file 
Route::get('/ticket', [TicketController::class, 'create'])->name('raise ticket');
Route::get('/Search', function () {return view('SearchTicket'); })->name('Search Ticket');
Route::get('/Admin', function() { return view('Admin'); })->name('Admin');
Route::get('/Report', function () { return view('Report', ['tickets' => Ticket::all()]); })->name('Report');

//raisecontroller
Route::post('/ticket', [TicketController::class, 'store'])->name('store'); //Handles form submissions to /ticket by calling the store method in TicketController
Route::get('/', [TicketController::class, 'index'])->name('index');

// Route::get('/edit-form/{$sub}','TicketController@edit');
Route::get('/ticket/{ticket}/edit', [TicketController::class, 'edit'])->name('ticket.edit');
Route::put('/ticket/{ticket}', [TicketController::class, 'update'])->name('ticket.update');
Route::delete('/ticket/{ticket}', [TicketController::class, 'destroy'])->name('ticket.destroy');
Route::get('/ticket/create', [TicketController::class, 'create'])->name('ticket.create');
Route::get('/ticket/{ticket}', [TicketController::class, 'show'])->name('ticket.show');     