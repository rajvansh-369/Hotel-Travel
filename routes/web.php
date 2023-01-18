<?php

use App\Http\Controllers\ListingController;
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

// Route::get('/', function () {
    
//       $data =  new App\Models\Listing;

//     return $data->with('lisitng_amenities')->get();
// });

// Route::get('/', function () {
    
//     return view('pages.home');
// })->name('home');

Route::get('/', [ListingController::class, 'index'])->name('home');
Route::get('/hotels', [ListingController::class, 'hotels'])->name('hotels');
Route::get('/contact', [ListingController::class, 'contact'])->name('contact');




// Route::get('/contact', function () {
    
//     return view('pages.contact');
// })->name('contact');
