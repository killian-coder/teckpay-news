<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewController;

Route::get( '/', [ NewController::class, 'showTopHeadlinesForm' ] );
Route::post( '/top-headlines', [ NewController::class, 'topHeadlines' ] );
Route::get( '/everything', [ NewController::class, 'showEverythingForm' ] );
Route::post( '/everything', [ NewController::class, 'everything' ] );
Route::get( '/sources', [ NewController::class, 'showSourcesForm' ] );
Route::post( '/sources', [ NewController::class, 'sources' ] );
Route::get( '/search-news', [ NewController::class, 'searchNews' ] );