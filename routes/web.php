<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\{
    EnviarArquivosComponent,
    EnviarEmailComponent,
    IndexComponent,
    ShowTweets
};

Route::get('/',IndexComponent::class);
Route::get('tweets',ShowTweets::class);
Route::get('enviar-arquivos',EnviarArquivosComponent::class);
Route::get('enviar-email',EnviarEmailComponent::class);

// Route::get('/', function () {
//     return view('welcome');
// });
