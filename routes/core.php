<?php

use App\Http\Controllers\CoreController;
use Illuminate\Support\Facades\Route;

Route::get('/language/{locale}', function ($locale) {
    app()->setlocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
})->name('actions.language.index');

Route::group(['prefix' => '/admin', 'middleware' => ['auth']], function () {
    Route::get('/dashboard', [CoreController::class, 'index_view'])->name('views.core.index');
    Route::get('/patch', [CoreController::class, 'patch_view'])->name('views.core.patch');

    Route::patch('/patch', [CoreController::class, 'patch_action'])->name('actions.core.patch');
});
