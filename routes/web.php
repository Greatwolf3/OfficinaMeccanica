<?php

use Illuminate\Support\Facades\Route;

Route::get('/language/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'it'])) {
        abort(404);
    }
    session()->put('locale', $locale);
    app()->setLocale($locale);
    return redirect()->back();
})->name('language.switch');

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
