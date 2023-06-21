<?php

use App\Models\Methodology;
use App\Models\News;
use App\Models\Team;
use App\Models\Article;
use App\Models\Highlight;

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

Route::get('/api/news/{lang}', function (string $lang) {
    return News::getTranslate($lang);
});

Route::get('/api/highlights/{lang}', function (string $lang) {
    return Highlight::getTranslate($lang);
});

Route::get('/api/team/{lang}', function (string $lang) {
    return Team::getTranslate($lang);
});

Route::get('/api/articles/{lang}', function (string $lang) {
    return Article::getTranslate($lang);
});

Route::get('/api/methodologies/{lang}', function (string $lang) {
    return Methodology::getTranslate($lang);
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
