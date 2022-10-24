<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\PostController;
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

Route::get('/browse', 'App\Http\Controllers\BrowseController@featuredTracks')->name('browse');

Route::get('/popular', 'App\Http\Controllers\BrowseController@popularTracks')->name('popular');

Route::get('/latest', 'App\Http\Controllers\BrowseController@latestTracks')->name('latest');

Route::get('/podcast', 'App\Http\Controllers\BrowseController@podcasts')->name('podcast');

Route::get('/travel', 'App\Http\Controllers\BrowseController@travelTracks')->name('travel');

Route::get('/top-charts', 'App\Http\Controllers\TopChartController@topOfWeek')->name('topCharts');

Route::get('/top-songs-month', 'App\Http\Controllers\TopChartController@topOfMonth')->name('topSongsMonth');

Route::get('/top-songs-of-all-time', 'App\Http\Controllers\TopChartController@topOfAlltime')->name('topSongsOfAllTime');

Route::get('/top-artists', 'App\Http\Controllers\TopChartController@topArtists')->name('topArtists');

Route::get('/album-tracks/{id}', 'App\Http\Controllers\AlbumTrackController@index')->name('album-tracks');

Route::get('/app-notification', function () {return view('pages.app-notification');})->name('appNotification');

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');

Route::get('/categories', 'App\Http\Controllers\CategoryController@index')->name('category');

Route::get('/categories/{id}', 'App\Http\Controllers\CategoryController@category')->name('categoryDetail');

Route::get('/artists', 'App\Http\Controllers\ArtistController@index')->name('artist');

Route::get('/artists-detail/{id}', 'App\Http\Controllers\ArtistController@artist')->name('artistDetail');

Route::get('/tracks', 'App\Http\Controllers\TrackController@index')->name('tracks');

Route::get('/tracks/{id}', 'App\Http\Controllers\TrackController@tracks')->name('trackDetail');

Route::get('/privacy-policy', 'App\Http\Controllers\PagesController@privacyPolicy')->name('privacy');

Route::get('/terms-of-services', 'App\Http\Controllers\PagesController@termsOfServices')->name('termsOfServices');

Route::get('/dmca', 'App\Http\Controllers\PagesController@dmca')->name('dmca');

Route::get('/faq', 'App\Http\Controllers\PagesController@faq')->name('faq');

Route::view('/contact-us', 'pages.contact-us')->name('contact');

Route::get('/albums', 'App\Http\Controllers\AlbumController@index')->name('album');

Route::get('/albums-detail/{id}', 'App\Http\Controllers\AlbumController@album')->name('albumDetail');

Route::get('/likes', 'App\Http\Controllers\FavoriteController@likes')->name('likes');

Route::get('/bookmarks', 'App\Http\Controllers\FavoriteController@bookmarks')->name('bookmark');

Route::get('/follow-artists', 'App\Http\Controllers\FavoriteController@followArtists')->name('followArtists');

Route::get('/follow-categories', 'App\Http\Controllers\FavoriteController@followCategories')->name('followCategories');

Route::get('/profile/edit', 'App\Http\Controllers\ProfileController@updateIndex')->name('edit');

Route::post('/profile/edit', 'App\Http\Controllers\ProfileController@updateProfile')->name('editProfile');

Route::get('/profile', 'App\Http\Controllers\ProfileController@index')->middleware(['auth'])->name('dashboard');

Route::get('/increment/{id}', 'App\Http\Controllers\TrackController@increment')->name('increment');

Route::get('/share-track/{id}',[\App\Http\Controllers\TrackShareController::class, 'index'])->name('trackShare');

Route::get('/app', function () {return view('pages.app');})->name('app');

require __DIR__ . '/auth.php';
