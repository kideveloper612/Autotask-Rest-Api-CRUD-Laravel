<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('landing');
});


/* Company CRUD */
Route::resource('company', 'CompanyController');

/* CompanyLocation CRUD */
Route::resource('location', 'CompanyLocationController');

/* Contact CRUD */
Route::resource('contact', 'ContactController');

/* Ticket CRUD */
Route::resource('ticket', 'TicketController');