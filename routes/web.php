<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminproductController;
use App\Http\Controllers\AdminreservationController;
use App\Http\Controllers\AdminbakingschoolController;
use App\Http\Controllers\BakingschoolclassesController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\AdminhomeController;
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
    return view('index');
});
Route::get('/index', function () {
    return view('index');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/product', [ProductController::class, 'index'], function () {
    return view('product');
});
Route::get('/Bakingschool', [BakingschoolclassesController::class, 'index'],function () {
    return view('Bakingschool');
});

Route::get('/auth/login', function () {
    return view('auth.login');
});
Route::get('/auth/register', function () {
    return view('auth.register');
});


//Route::resource('/checkout', [ProductController::class, 'checkout'])->name('checkout');
Route::get('/checkout', function () {
    return view('checkout');
});
Route::post('/checkout', [ProductController::class, 'checkout'])->name('checkout');
Route::get('/paidproduct', [ProductController::class, 'paidproducts'])->name('paidproduct')->middleware('auth');

Route::get('cart', [ProductController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [ProductController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [ProductController::class, 'remove'])->name('remove.from.cart');

Route::post('/Bakingschool', [BakingschoolclassesController::class, 'reservePlace'])->name('reservation')->middleware('auth');
Route::get('/place', [PlaceController::class, 'index'])->name('place')->middleware('auth');
// Route::resource('/class', BakingschoolclassesController::class)->names('reservation')->middleware('auth');


Route::get('delete',[PlaceController::class, 'delete']);
Route::get('delete/{id}',[PlaceController::class, 'delete'])->middleware('auth');


Auth::routes();

Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/admin-index', [App\Http\Controllers\HomeController::class, 'indexadmin'])->name('admin.index')->middleware('role_admin');

Route::group(['middleware' => 'role_admin'], function () {
	Route::resource('/admin/products/index', App\Http\Controllers\AdminproductController::class);
	Route::get('/apiProducts', [App\Http\Controllers\AdminproductController::class, 'apiProducts'])->name('api.products');
	Route::resource('/admin/bakingschool/index-classes', App\Http\Controllers\AdminbakingschoolController::class);
	Route::get('/apiClasses', [App\Http\Controllers\AdminbakingschoolController::class, 'apiClasses'])->name('api.classes');
    Route::resource('/admin/reservation/index-places', App\Http\Controllers\AdminreservationController::class);
	Route::get('/apiPlaces', [App\Http\Controllers\AdminreservationController::class, 'apiPlaces'])->name('api.places');

});
