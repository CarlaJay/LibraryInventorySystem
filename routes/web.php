<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Books;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', Books::class);

