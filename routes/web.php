<?php

use App\Http\Controllers\ProfileController;
use App\Models\ShortUrls;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/s/{hash}', [\App\Http\Controllers\ShortUrlController::class, 'view'])->middleware(\App\Http\Middleware\ShortUrlLogger::class);

Route::get('/upload', function () {
    return view('upload');
})->name('upload');

Route::post('/upload', [App\Http\Controllers\UploadController::class, 'importFromCsv'])->name('uploads.import');

Route::get('/urls', function() {
    return view('urls', ['urls' => ShortUrls::all()]);
})->name('urls');

Route::get('/analytics', [App\Http\Controllers\AnalyticsController::class, 'view'])->name('analytics');

Route::get('/analytics/{hash}', [App\Http\Controllers\AnalyticsController::class, 'details'])->name('analytics.hash');


require __DIR__.'/auth.php';
