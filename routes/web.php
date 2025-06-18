<?php

use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Models\Ticket;

//clicking on ticket will view the raisetaicke blade file 

Route::get('/home', function () {return view('welcome'); })->name('home');
Route::get('/Search', function () {return view('SearchTicket'); })->name('Search Ticket');
Route::get('/Report', function () {return view('Report'); })->name('Report');
Route::get('/ticket', function() {return view('raiseticket'); })->name('raise ticket');
Route::get('/login', function() { return view('login'); })->name('login');



//raisecontroller
Route::post('/ticket', [TicketController::class, 'store'])->name('store');

Route::post('/', [TicketController::class,'index'])->name('indeex');

//printing the data
Route::get('/', [TicketController::class, 'index']);

Route::get('/Report', function () { return view('Report', ['tickets' => \App\Models\Ticket::all()]); })->name('Report');
