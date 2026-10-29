<?php

use App\Http\Controllers\Admin\AdminDoctorController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PkrsCategoryAdminController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Frontend\DashboardFrontController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PkrsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PkrsGalleryController;
use App\Http\Controllers\Admin\PkrsPostController;
use App\Http\Controllers\Frontend\PpidController;
use App\Http\Controllers\Frontend\ProfileController;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardFrontController::class, 'index'])->name('dashboard');
Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');
Route::get('/lang/{locale}', function ($locale) {

    if (!in_array($locale, ['id', 'en'])) {
        abort(404);
    }

    session()->put('locale', $locale);

    session()->save(); // Tambahkan ini

    return back();
})->name('lang.switch');
Route::get('/pkrs', [PkrsController::class, 'index'])
    ->name('pkrs.index');
Route::get('/pkrs/{id}', [PkrsController::class, 'show'])
    ->name('frontend.pkrs.show');
Route::post('/pkrs/{id}/view', [PkrsController::class, 'view'])
    ->name('pkrs.view');
Route::get('/ppid', [PpidController::class, 'index'])->name('ppid');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

// Admin Auth (Guest)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Admin Panel (Authenticated)
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::redirect('/', '/admin/dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::patch('doctors/{doctor}/toggle-active', [AdminDoctorController::class, 'toggleActive'])
        ->name('doctors.toggle-active');

    Route::resource('doctors', AdminDoctorController::class);
    Route::prefix('news')->name('news.')->group(function () {
        Route::get('/', [NewsController::class, 'adminIndex'])->name('index');
        Route::get('/create', [NewsController::class, 'create'])->name('create');
        Route::post('/', [NewsController::class, 'store'])->name('store');
        Route::get('/{news}/edit', [NewsController::class, 'edit'])->name('edit');
        Route::put('/{news}', [NewsController::class, 'update'])->name('update');
        Route::delete('/{news}', [NewsController::class, 'destroy'])->name('destroy');
        Route::delete('/image/{image}', [NewsController::class, 'destroyImage'])->name('image.destroy');
    });
    Route::resource('pkrs-categories', PkrsCategoryAdminController::class)->except('show');

    Route::patch('pkrs-posts/{pkrsPost}/toggle-publish', [PkrsPostController::class, 'togglePublish'])
        ->name('pkrs-posts.toggle-publish');

    Route::resource('pkrs-posts', PkrsPostController::class);
    Route::prefix('pkrs-posts/{post}')
        ->name('pkrs-posts.')
        ->group(function () {
            Route::resource('galleries', PkrsGalleryController::class)->except('show');
        });

    // Settings
    Route::get('/settings', [SettingsController::class, 'edit'])->name('settings.edit');
    Route::put('/settings', [SettingsController::class, 'update'])->name('settings.update');
    Route::post('/settings/delete-image/{field}', [SettingsController::class, 'deleteImage'])->name('settings.delete-image');
});
