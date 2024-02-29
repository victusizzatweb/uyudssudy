<?php

use App\Http\Controllers\AboutInfoController;
use App\Http\Controllers\CatigoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\InformationAboutUsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\InformationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get("/",[FrontController::class,'index'])->name('index');
Route::get('/admin', function () {
    return view('dashboard.index');
});
Route::resource('/settings', SettingController::class);
Route::resource('/abouts', AboutController::class);
Route::resource('/boxs', BoxController::class);
Route::resource('/information', InformationController::class);
Route::resource('/aboutInfo', AboutInfoController::class);
Route::resource('/category', CatigoryController::class);
Route::resource('/product', ProductController::class);
Route::resource('/gallery', GalleryController::class);
Route::resource('/informationAboutUs', InformationAboutUsController::class);
Route::get('/products',[FrontController::class,'category'])->name('category');
Route::resource('/consultation', ConsultationController::class);
Route::resource('/order',OrderController::class);
Route::resource('/frontend',FrontendController::class);
Route::resource('/comment',CommentController::class);
Route::get('/locale/{locale}', function (string $locale) {
    if (! in_array($locale, ['uz', 'en', 'ru'])) {
        abort(400);
    }
    // App::setLocale($locale);
    // return App::getLocale();
    // App::setLocale($locale);
    session()->put('locale',$locale);
    return redirect('/');
});