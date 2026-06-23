<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\ProjectController as FrontendProjectController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SupplyMaterialController;
use App\Http\Controllers\Admin\JasaKonstruksiController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\ContactInfoController;

// ============================================
// REDIRECT: /admin ke /admin/login
// ============================================
Route::redirect('/admin', '/admin/login');

// ============================================
// FRONTEND ROUTES
// ============================================
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/supply-material', [PageController::class, 'supplyMaterial'])->name('supply-material');
Route::get('/jasa-konstruksi', [PageController::class, 'jasaKonstruksi'])->name('jasa-konstruksi');
Route::get('/projects', [FrontendProjectController::class, 'index'])->name('projects.index');
Route::get('/project/{slug}', [FrontendProjectController::class, 'show'])->name('projects.show');
Route::get('/certificates', [PageController::class, 'certificates'])->name('certificates');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// ============================================
// ADMIN ROUTES
// ============================================
Route::prefix('admin')->name('admin.')->group(function () {

    // Guest (belum login)
    Route::middleware('guest')->group(function () {
        Route::get('login', [AuthController::class, 'showLogin'])->name('login');
        Route::get('auth/google', [AuthController::class, 'redirectToGoogle'])->name('google.redirect');
        Route::get('auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('google.callback');
    });

    // Auth (sudah login)
    Route::middleware('auth')->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Resource CRUD
        Route::resource('supply-materials', SupplyMaterialController::class)->except(['show']);
        Route::resource('jasa-konstruksi', JasaKonstruksiController::class)->except(['show']);
        Route::resource('projects', ProjectController::class)->except(['show']);
        Route::resource('certificates', CertificateController::class)->except(['show']);

        // Info Kontak
        Route::get('contact-info/edit', [ContactInfoController::class, 'edit'])->name('contact-info.edit');
        Route::put('contact-info/update', [ContactInfoController::class, 'update'])->name('contact-info.update');
    });

});