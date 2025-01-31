<?php

use App\Models\ShortUrlsLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// A route to grab all log entries
Route::get('/urls', function () {
    return ShortUrls::all();
});

// Route to get a specific data for a URL ID in the short_url table
Route::get('/urls/{hash}', function (string $hash) {
    return ShortUrls::where('hash', $hash)->first();
});

// A route to grab all log entries
Route::get('/analytics', function () {
    return ShortUrlsLog::all();
});

// Route to get a specific data for a URL ID in the short_url table
Route::get('/analytics/{id}', function (string $id) {
    return ShortUrlsLog::where('id', '=', $id)->first();
});
