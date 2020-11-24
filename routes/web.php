<?php

use App\Http\Controllers\AccountTypeController;
use App\Http\Controllers\ArticleStatusController;
use App\Http\Controllers\BackUserController;
use App\Http\Controllers\BackUserRoleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FreqAskQuestionController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsLetterTypeController;
use App\Http\Controllers\NotificationTypeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PageRoleController;
use App\Http\Controllers\PageUserController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\ReportArticleTypeController;
use App\Http\Controllers\ReportUserTypeController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TopticController;
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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::resource('back-users', BackUserController::class);
        Route::resource('back-user-roles', BackUserRoleController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('account-types', AccountTypeController::class);
        Route::resource('toptics', TopticController::class);
        Route::resource('statuses', StatusController::class);
        Route::resource('article-statuses', ArticleStatusController::class);
        Route::resource(
            'report-article-types',
            ReportArticleTypeController::class
        );
        Route::resource('report-user-types', ReportUserTypeController::class);
        Route::resource('genders', GenderController::class);
        Route::resource('news-letter-types', NewsLetterTypeController::class);
        Route::resource(
            'notification-types',
            NotificationTypeController::class
        );
        Route::resource('page-roles', PageRoleController::class);
        Route::resource('freq-ask-questions', FreqAskQuestionController::class);
        Route::resource('payment-methods', PaymentMethodController::class);
        Route::resource('pages', PageController::class);
        Route::resource('users', UserController::class);
        Route::resource('page-users', PageUserController::class);
    });
