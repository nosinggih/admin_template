<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Public Route (Landing Page)
Route::get('/', [PageController::class, 'landing'])->name('landing');

// Protected Routes (Required Auth)
Route::middleware(['auth'])->group(function () {
    // Dashboard Group
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/analytics', [DashboardController::class, 'analytics'])->name('dashboard.analytics');

    // UI Components Group
    Route::prefix('components')->name('components.')->controller(ComponentController::class)->group(function () {
        Route::get('/buttons', 'buttons')->name('buttons');
        Route::get('/alerts', 'alerts')->name('alerts');
        Route::get('/cards', 'cards')->name('cards');
        Route::get('/avatars', 'avatars')->name('avatars');
        Route::get('/modals', 'modals')->name('modals');
        Route::get('/navigation', 'navigation')->name('navigation');
        Route::get('/progress', 'progress')->name('progress');
        Route::get('/overlays', 'overlays')->name('overlays');
        Route::get('/lists', 'lists')->name('lists');
        Route::get('/empty', 'empty')->name('empty');
        Route::get('/datatables', 'datatables')->name('datatables');
    });

    // Tables Group
    Route::prefix('tables')->name('tables.')->controller(TableController::class)->group(function () {
        Route::get('/basic', 'basic')->name('basic');
        Route::get('/interactive', 'interactive')->name('interactive');
        Route::get('/stats', 'stats')->name('stats');
    });

    // Forms Group
    Route::prefix('forms')->name('forms.')->controller(FormController::class)->group(function () {
        Route::get('/inputs', 'inputs')->name('inputs');
        Route::get('/controls', 'controls')->name('controls');
        Route::get('/validation', 'validation')->name('validation');
        Route::get('/upload', 'upload')->name('upload');
        Route::get('/layout', 'layout')->name('layout');
        Route::get('/advanced', 'advanced')->name('advanced');
    });

    // Charts Group
    Route::get('/charts', [ChartController::class, 'index'])->name('charts.index');

    // Users Group (CRUD)
    Route::prefix('users')->name('users.')->controller(UserController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/{user}', 'show')->name('show');
    });

    // Profile & Settings
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/settings', [ProfileController::class, 'settings'])->name('profile.settings');

    // General Pages
    Route::get('/icons', [PageController::class, 'icons'])->name('pages.icons');
    Route::get('/blank', [PageController::class, 'blank'])->name('pages.blank');
});

require __DIR__.'/auth.php';

