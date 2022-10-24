<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('album', 'AlbumCrudController');
    Route::crud('artist', 'ArtistCrudController');
    Route::crud('track', 'TrackCrudController');
    Route::crud('bookmark', 'BookmarkCrudController');
    Route::crud('category', 'CategoryCrudController');
//    Route::crud('comment', 'CommentCrudController');
    Route::crud('contact-us', 'ContactUsCrudController');
    Route::crud('user', 'UserCrudController');
    Route::crud('like', 'LikeCrudController');
    Route::crud('dmcas', 'DmcasCrudController');
    Route::crud('faq', 'FaqCrudController');
    Route::crud('privacy', 'PrivacyCrudController');
    Route::crud('terms-of-service', 'TermsOfServiceCrudController');
}); // this should be the absolute last line of this file
