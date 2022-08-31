<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Route::get("/login", [UserController::class, 'index'])->name("login");
Route::post("/login", [UserController::class, 'authentikasi'])->name("login_store");
Route::get("/logout", [UserController::class, 'logout'])->name("logout");

Route::middleware(["auth", "userAccess:Admin"])->prefix("article")->group(function () {
    Route::post("/", [ArticleController::class, 'store'])->name("article_store");
    Route::get("/create", [ArticleController::class, 'create'])->name("article_create");
    Route::get("/edit/{id}", [ArticleController::class, 'edit'])->name("article_edit");
    Route::put("/edit/{id}", [ArticleController::class, 'update'])->name("article_update");
    Route::delete("/{id}", [ArticleController::class, 'destroy'])->name("article_delete");
});

Route::middleware(["auth", "userAccess:Admin,User"])->prefix("article")->group(function () {
    Route::get("/{id}", [ArticleController::class, 'show'])->name("article_show");
    Route::get("/", [ArticleController::class, 'index'])->name("article");
});