<?php

use App\Http\Controllers\AuthController;
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

// Route::get('/getData', function () {
    
//       $data =  new App\Models\Address;

//     return $data->get();
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



// Route::get('/sessionRoute', function(){

//         dd(session()->all());

// });

Route::get('/', [HotelController::class, 'index'])->name('home');
Route::get('/hotels', [HotelController::class, 'hotels'])->name('hotels');
Route::get('/hotel-details/{id}', [HotelController::class, 'hotel_details'])->name('hotel-details');
Route::get('/contact', [HotelController::class, 'contact'])->name('contact');
Route::post('/searchHotels', [HotelController::class, 'searchHotels'])->name('searchHotels');
Route::get('/searchResult', [HotelController::class, 'searchResult'])->name('searchResult');

// Route::middleware(['middleware' => 'auth'], function () {
    
    
    Route::post('/pre-booking', [HotelController::class, 'preBooking'])->name('preBooking');
    Route::get('/booking', [HotelController::class, 'booking'])->name('booking');
    Route::get('/confirmBooking', [HotelController::class, 'confirmBooking'])->name('confirmBooking');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// });



Route::get('/login', [AuthController::class, 'loginView'])->name('loginView');
Route::get('/authLogin', [AuthController::class, 'authLogin'])->name('authLogin'); //WIthout Livewire


Route::get('/register', [AuthController::class, 'registerView'])->name('registerView');


