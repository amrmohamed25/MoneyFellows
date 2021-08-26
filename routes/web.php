<?php

use App\Models\Current;
use App\Models\User;
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
    $categories = \App\Models\Category::all();
    return view('welcome', compact('categories'));
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $user = auth()->user();
    $categories = \App\Models\Category::all();
    if ($user->email == 'admin@admin.com') {
        $currents = Current::all();
        $users = User::all();
        $user->createOrGetStripeCustomer();
        return view('admin', compact('currents', 'users', 'categories'));//Should have different dashboard
    } else {

        return view('dashboard', compact('categories'));
    }
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/category', '\App\Http\Controllers\CategoryController@index');
Route::middleware(['auth:sanctum', 'verified'])->post('/store_category', '\App\Http\Controllers\CategoryController@store');
Route::middleware(['auth:sanctum', 'verified'])->get('/edit_category/{category_id}', '\App\Http\Controllers\CategoryController@edit');
Route::middleware(['auth:sanctum', 'verified'])->post('/update_category/{category_id}', '\App\Http\Controllers\CategoryController@update');
Route::middleware(['auth:sanctum', 'verified'])->get('/delete_category/{current_id}', '\App\Http\Controllers\CategoryController@destroy');


Route::middleware(['auth:sanctum', 'verified'])->post('/checkout/{current_id}', '\App\Http\Controllers\CurrentsController@checkout');

Route::middleware(['auth:sanctum', 'verified'])->get('/gam3yatk', function () {
    $user = Auth::user();
    if ($user == null)
        return redirect(url('/login'));
    else if ($user->email == 'admin@admin.com') {
        return redirect(url('/dashboard'));
    } else
        return view('gam3yatk');
});

Route::middleware(['auth:sanctum', 'verified'])->get('join/{id}', '\App\Http\Controllers\CurrentsController@index');

Route::middleware(['auth:sanctum', 'verified'])->post('/store', '\App\Http\Controllers\CurrentsController@store');

Route::middleware(['auth:sanctum', 'verified'])->get('/read', '\App\Http\Controllers\CurrentsController@show');

Route::middleware(['auth:sanctum', 'verified'])->get('/edit/{current_id}', '\App\Http\Controllers\CurrentsController@edit');

Route::middleware(['auth:sanctum', 'verified'])->post('/update/{current_id}', '\App\Http\Controllers\CurrentsController@update');

Route::middleware(['auth:sanctum', 'verified'])->get('/delete/{current_id}', '\App\Http\Controllers\CurrentsController@destroy');

Route::middleware(['auth:sanctum', 'verified'])->get('/pay/{current_id}', '\App\Http\Controllers\CurrentsController@show');





Route::post('/subscribe', function (Request $request) {
    $request->user()->newSubscription(
        'default', 'price_monthly'
    )->create($request->paymentMethodId);
});
