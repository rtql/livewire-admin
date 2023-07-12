<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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



/* Special for Migration fresh  */

// Route::get('fresh',function (){
//     \Illuminate\Support\Facades\Session::flush();
//     \Illuminate\Support\Facades\Artisan::call('migrate:fresh');
//     \Illuminate\Support\Facades\Artisan::call('db:seed');
//     \Illuminate\Support\Facades\Artisan::call('optimize:clear');
// });

/* Special for Auth Routes  */

Auth::routes(['register' => false]);


/* Special Routes for Frontend Page with Localization */


Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect']],function() {

    /* Special Route for Livewire with Localization routes fix  */

    Route::post('livewire/message/{name}', '\Livewire\Controllers\HttpConnectionHandler');

    Route::get('/',\App\Http\Livewire\Front\_Home::class)->name('home');
   
});

