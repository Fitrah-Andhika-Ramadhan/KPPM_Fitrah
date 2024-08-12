<?php

use App\Http\Controllers\Admin\AboutmeController;
use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Admin\ComplaintController; // Tambahkan ComplaintController
use App\Http\Controllers\Admin\PortfolioController; // Add PortfolioController

use App\Http\Controllers\Admin\UserController; // Add UserController
use App\Http\Controllers\Admin\PortfolioSlideController; // Add PortfolioSlideController
use App\Http\Controllers\Admin\SourceController;
use App\Http\Controllers\Admin\SliderController; // Add SliderController
use App\Http\Controllers\Admin\PermohonanInformasiController;
use App\Http\Controllers\Admin\GuestbookController as AdminGuestbookController; // Use alias for Admin GuestbookController
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\VideoController; // Add VideoController
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Front-End Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentication Routes
Auth::routes();

// Admin Panel Routes
Route::middleware(['auth', 'isAdmin'])->name('admin.')->prefix('/admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');

    

    // Category Routes
  


    // routes/web.php


//videos
    Route::resource('videos', VideoController::class);






    Route::resource('admin/portfolio', PortfolioController::class);


    // About Me Routes
    Route::get('aboutme', [AboutmeController::class, 'index'])->name('aboutme.index');
    Route::get('aboutme/create', [AboutmeController::class, 'create'])->name('aboutme.create');
    Route::post('aboutme', [AboutmeController::class, 'store'])->name('aboutme.store');
    Route::get('aboutme/{id}/edit', [AboutmeController::class, 'edit'])->name('aboutme.edit');
    Route::put('aboutme/{id}', [AboutmeController::class, 'update'])->name('aboutme.update');
    Route::delete('aboutme/{id}', [AboutmeController::class, 'destroy'])->name('aboutme.destroy');


    // Guestbook Routes
    Route::resource('guestbook', AdminGuestbookController::class);
    Route::get('guestbook/export', [AdminGuestbookController::class, 'export'])->name('guestbook.export'); // Export route
    

    // Source Routes
    Route::resource('sources', SourceController::class);

    // Permohonan Informasi Routes
    Route::resource('permohonan_informasi', PermohonanInformasiController::class);

    // Slider Routes
    Route::resource('sliders', SliderController::class);
    Route::get('/admin/slider', [SliderController::class, 'index'])->name('admin.slider.index');
    Route::get('/admin/slider/create', [SliderController::class, 'create'])->name('admin.slider.create');
    Route::post('/admin/slider/store', [SliderController::class, 'store'])->name('admin.slider.store');
    Route::get('/admin/slider/edit/{slider}', [SliderController::class, 'edit'])->name('admin.slider.edit');
    Route::put('/admin/slider/update/{slider}', [SliderController::class, 'update'])->name('admin.slider.update');
    Route::delete('/admin/slider/destroy/{slider}', [SliderController::class, 'destroy'])->name('admin.slider.destroy');
    
    // Complaint Routes
    Route::resource('complaints', ComplaintController::class);
    Route::get('/admin/complaints', [ComplaintController::class, 'index'])->name('admin.complaints.index');
    Route::get('/admin/complaints/create', [ComplaintController::class, 'create'])->name('admin.complaints.create');
    Route::post('/admin/complaints/store', [ComplaintController::class, 'store'])->name('admin.complaints.store');

    // user Routes
    Route::resource('users', UserController::class);

    // Portfolio Slide Routes

    Route:: resource('portfolioslide', PortfolioSlideController::class);
    Route::get('/admin/portfolioslide', [PortfolioSlideController::class, 'index'])->name('admin.portfolioslide.index');
    Route::get('/admin/portfolioslide/create', [PortfolioSlideController::class, 'create'])->name('admin.portfolioslide.create');
    Route::post('/admin/portfolioslide/store', [PortfolioSlideController::class, 'store'])->name('admin.portfolioslide.store');
    Route::get('/admin/portfolioslide/edit/{portfolioslide}', [PortfolioSlideController::class, 'edit'])->name('admin.portfolioslide.edit');
    Route::put('/admin/portfolioslide/update/{portfolioslide}', [PortfolioSlideController::class, 'update'])->name('admin.portfolioslide.update');
    Route::delete('/admin/portfolioslide/destroy/{portfolioslide}', [PortfolioSlideController::class, 'destroy'])->name('admin.portfolioslide.destroy');
    



});

