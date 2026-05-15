<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\ProjectController;  // frontend
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController; // alias admin
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\ContactInfoController;
use App\Http\Controllers\Admin\SupplyMaterialController;
use App\Http\Controllers\Admin\JasaKonstruksiController;

// ============================================
// FRONTEND ROUTES
// ============================================
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/supply-material', [PageController::class, 'supplyMaterial'])->name('supply-material');
Route::get('/jasa-konstruksi', [PageController::class, 'jasaKonstruksi'])->name('jasa-konstruksi');

// ✅ Frontend project routes (gunakan ProjectController dari Frontend)
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/project/{slug}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/certificates', [PageController::class, 'certificates'])->name('certificates');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'storeContact'])->name('contact.store');

// ============================================
// AUTH ROUTES (Google OAuth)
// ============================================
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', [AuthController::class, 'showLogin'])->name('login');
        Route::get('auth/google', [AuthController::class, 'redirectToGoogle'])->name('google.redirect');
        Route::get('auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('google.callback');
    });
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
});

// ============================================
// ADMIN ROUTES (Auth Required)
// ============================================
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::redirect('/', 'admin/dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // ✅ Gunakan AdminProjectController untuk CRUD
    Route::resource('supply-materials', SupplyMaterialController::class)->except(['show']);
    Route::resource('jasa-konstruksi', JasaKonstruksiController::class)->except(['show']);
    Route::resource('projects', AdminProjectController::class)->except(['show']);
    Route::resource('certificates', CertificateController::class)->except(['show']);

    Route::get('contact-info/edit', [ContactInfoController::class, 'edit'])->name('contact-info.edit');
    Route::put('contact-info/update', [ContactInfoController::class, 'update'])->name('contact-info.update');
});