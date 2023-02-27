<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\AnswerRecordController;
use App\Http\Controllers\QuestionController;
use App\Models\Answer;
use App\Models\AnswerRecord;
use Illuminate\Support\Facades\Auth;
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


Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
    'home' => false
]);
Route::middleware(['auth'])->group(function () {
    Route::controller(AdminsController::class)->prefix('Admins')->group(function () {
        Route::get('/', 'index')->name('AdminsIndex');
        Route::get('add', 'create')->name('AdminsAdd');
        Route::post('store', 'store')->name('AdminsStore');
        Route::get('edit/{id}', 'edit')->name('AdminsEdit');
        Route::post('update', 'update')->name('AdminUpdate');
        Route::delete('delete', 'destroy')->name('AdminsDelete');
    });
    Route::controller(QuestionController::class)->prefix('Questions')->group(function () {
        Route::get('/', 'show')->name('QuestionShow');
        Route::get('add', 'create')->name('QuestionAdd');
        Route::post('store', 'store')->name('QuestionStore');
        Route::get('edit/{id}', 'edit')->name('QuestionEdit');
        Route::put('update', 'update')->name('QuestionUpdate');
        Route::get('delete/{id}', 'destroy')->name('QuestionDelete');
    });
    Route::controller(AnswerRecordController::class)->prefix('Answers')->group(function () {
        Route::get('/', 'show')->name('AnswersShow');
        Route::get('/{id}', 'index')->name('AnswerData');
        Route::get('pdf/{id}', 'print')->name('AnswersPrint');
    });
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
});
