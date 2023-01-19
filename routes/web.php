<?php

use App\Http\Controllers\HotelController;
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


// uuid_create()
// Route::get('/', function () {
    
//     return view('pages.home');
// })->name('home');
// Route::get('/hotels', function () {
    
//     return view('pages.hotels');
// })->name('hotels');
// Route::get('/contact', function () {
    
//     return view('pages.contact');
// })->name('contact');



Route::get('/', [HotelController::class, 'index'])->name('home');
Route::get('/hotels', [HotelController::class, 'hotels'])->name('hotels');
Route::get('/hotel-details/{id}', [HotelController::class, 'hotel_details'])->name('hotel-details');
Route::get('/contact', [HotelController::class, 'contact'])->name('contact');
