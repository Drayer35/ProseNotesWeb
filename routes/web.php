<?php

use App\Http\Controllers\Controller;
use App\Livewire\Note\ViewNote;
use App\Livewire\Note\CreateNote;
use App\Livewire\Etiquette\ViewEtiquette;
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
    Route::controller(ViewEtiquette::class)->group(function(){
        Route::get('/etiquettes','render')->name('etiquettes');
    });
});
Route::controller(CreateNote::class)->group(function(){
    Route::post('/save','save')->name('save');
});

