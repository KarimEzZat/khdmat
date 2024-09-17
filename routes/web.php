<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SeoController;
use App\Http\Controllers\ServicseController;
use App\Http\Controllers\FaqsController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\SitemapGenerator;

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

Route::get('/', [ThemeController::class, 'index'])->name('khdmat');

//Route::get('blog-page', [BlogPageController::class, 'index'])->name('blog.index');
Route::resource('services', ServicseController::class);



Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...

]);

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('companies', CompaniesController::class);

    Route::resource('articles', ArticlesController::class);
    Route::resource('seos', SeoController::class);
//    User Routes
    Route::get('users', [UsersController::class, 'index'])->name('users.index');
    Route::get('users/profile', [UsersController::class, 'edit'])->name('users.edit-profile');
    Route::put('users/profile/{user}', [UsersController::class, 'update'])->name('users.update-profile');
    Route::resource('faqs', FaqsController::class);

    Route::get('logout', [LoginController::class, 'logout']);
});
Route::get("generate-sitemap", function () {

    SitemapGenerator::create('https://khdmat.riyadh-insulation.com/')->writeToFile(public_path('sitemap.xml'));
});
