<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\FileController;

use GuzzleHttp\Middleware;

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


Route::post('issue/{id}/note', ['App\Http\Controllers\IssueController','note'])->middleware('auth');
Route::post('file/upload', ['App\Http\Controllers\FileController','store'])->middleware('auth');
Route::get('file/{id}', ['App\Http\Controllers\FileController','get'])->middleware('auth');
Route::get('file/{id}/delete', ['App\Http\Controllers\FileController','destroy'])->middleware('auth');

Route::get('issue/note/delete/{id}', ['App\Http\Controllers\IssueController','note_delete'])->middleware('auth');

Route::resource('project', ProjectController::class)->middleware('auth');
Route::resource('team', TeamController::class)->middleware('auth');
Route::resource('issue', IssueController::class)->middleware('auth');
Route::resource('home', HomeController::class)->middleware('auth');
Route::get('admin', ['App\Http\Controllers\AdminController','index'])->middleware('isAdmin');