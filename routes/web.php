<?php

use App\Http\Controllers\Controller;
use App\Livewire\ViewNote;
use App\Livewire\CreateNote;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::controller(ViewNote::class)->group(function(){
        Route::get('/notes','render')->name('notes');
    });
  
});
Route::controller(CreateNote::class)->group(function(){
    Route::post('/save','save')->name('save');
});

