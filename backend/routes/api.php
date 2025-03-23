<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavouritesController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\SnippetsController;
use App\Http\Controllers\SnippetTagController;
use App\Http\Controllers\TagController;


Route::group(["middleware" => "auth:api"], function(){

    Route::group(["prefix" => "user"], function(){
        Route::post('/addsnippet', [SnippetsController::class, 'addSnippet']);
        Route::post('/addlanguage', [LanguageController::class, 'addLanguage']);
        Route::post('/addtofavourites', [FavouritesController::class, 'addToFavourites']);
        Route::post('/removefromfavourites', [FavouritesController::class, 'removeFromFavourites']);
        Route::post('/deletesnippet', [SnippetsController::class, 'deleteSnippet']);
        Route::post('/updatesnippet', [SnippetsController::class, 'updateSnippet']);
        Route::post('/searchbytag', [SnippetTagController::class, 'searchByTag']);
        Route::post('/getlanguages', [LanguageController::class, "getLanguages"]);

    });
});

Route::group(["prefix" => "guest"], function(){
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/signup', [AuthController::class, 'signup']);
    Route::post('/test', [TagController::class, "test"]);
});
