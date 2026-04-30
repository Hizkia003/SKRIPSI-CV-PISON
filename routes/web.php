<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\VisionController;
use App\Http\Controllers\Admin\MissionController;
use App\Http\Controllers\Admin\AdvantageController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TiktokController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\SiteContentController;
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
Route::get('/projects', [PageController::class, 'projects'])->name('projects');
Route::get('/certificates', [PageController::class, 'certificates'])->name('certificates');
Route::get('/tiktok', [PageController::class, 'tiktok'])->name('tiktok');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'storeContact'])->name('contact.store');

// ============================================
// AUTH ROUTES (Google OAuth)
// ============================================
Route::prefix('admin')->name('admin.')->group(function () {
    // Login Routes (hanya untuk guest)
    Route::middleware('guest')->group(function () {
        Route::get('login', [AuthController::class, 'showLogin'])->name('login');
        Route::get('auth/google', [AuthController::class, 'redirectToGoogle'])->name('google.redirect');
        Route::get('auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('google.callback');
    });

    // Logout (hanya untuk auth)
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
});

// ============================================
// ADMIN ROUTES (Auth Required)
// ============================================
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {

    // Redirect /admin ke /admin/dashboard
    Route::redirect('/', 'admin/dashboard');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // About
    Route::get('about', [AboutController::class, 'edit'])->name('about.edit');
    Route::put('about', [AboutController::class, 'update'])->name('about.update');
    // Visi
    Route::get('visions/data', [VisionController::class, 'data'])->name('visions.data');
    Route::post('visions', [VisionController::class, 'store'])->name('visions.store');
    Route::put('visions/{vision}', [VisionController::class, 'update'])->name('visions.update');
    Route::delete('visions/{vision}', [VisionController::class, 'destroy'])->name('visions.destroy');

    // Misi
    Route::get('missions/data', [MissionController::class, 'data'])->name('missions.data');
    Route::post('missions', [MissionController::class, 'store'])->name('missions.store');
    Route::put('missions/{mission}', [MissionController::class, 'update'])->name('missions.update');
    Route::delete('missions/{mission}', [MissionController::class, 'destroy'])->name('missions.destroy');

    // Keunggulan
    Route::get('advantages/data', [AdvantageController::class, 'data'])->name('advantages.data');
    Route::post('advantages', [AdvantageController::class, 'store'])->name('advantages.store');
    Route::put('advantages/{advantage}', [AdvantageController::class, 'update'])->name('advantages.update');
    Route::delete('advantages/{advantage}', [AdvantageController::class, 'destroy'])->name('advantages.destroy');

    // Supply Material
    Route::resource('supply-materials', SupplyMaterialController::class)->except(['show']);

    // Jasa Konstruksi
    Route::resource('jasa-konstruksi', JasaKonstruksiController::class)->except(['show']);

    // Projects
    Route::resource('projects', ProjectController::class)->except(['show']);

    // Certificates
    Route::resource('certificates', CertificateController::class)->except(['show']);

    // TikTok
    Route::resource('tiktoks', TiktokController::class)->except(['show']);

    // Contacts
    Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('contacts/{id}', [ContactController::class, 'show'])->name('contacts.show');
    Route::delete('contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');
    Route::patch('contacts/{id}/read', [ContactController::class, 'markAsRead'])->name('contacts.read');

    Route::get('contact-info/edit', [ContactInfoController::class, 'edit'])->name('contact-info.edit');
    Route::put('contact-info/update', [ContactInfoController::class, 'update'])->name('contact-info.update');

    // SITE CONTENTS (HOME)
    Route::get('site-contents', [SiteContentController::class, 'edit'])->name('site-contents.edit');
    Route::put('site-contents', [SiteContentController::class, 'update'])->name('site-contents.update');
});