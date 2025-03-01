<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LaporanLemburanController;
use App\Http\Controllers\PengajuanLemburController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardKaryawanController;

Route::middleware('guest')->group(function () {

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::middleware(['role:admin'])->group(function () {
        Route::get('register', [RegisteredUserController::class, 'create'])
            ->name('register');
        Route::post('register', [RegisteredUserController::class, 'store']);

        Route::resource('/karyawan', KaryawanController::class)->except(['update']);
        Route::post('/karyawan/update/{id}', [KaryawanController::class, 'update'])->name('karyawan.update');
        Route::resource('/pengajuanlembur', PengajuanLemburController::class);
        Route::resource('/rekapanlaporan', LaporanLemburanController::class);
        Route::post('/pengajuanlembur/{id}/selesai', [PengajuanLemburController::class, 'selesai'])->name('pengajuanlembur.selesai');
        Route::get('/rekapanlaporan/{id}/pdf', [LaporanLemburanController::class, 'generatePDF'])->name('lembur.pdf');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/pengajuanlaporan/{id}/pdf', [PengajuanLemburController::class, 'generatePDF'])->name('pengajuan.lemburanpdf');
    });

    Route::middleware(['role:karyawan'])->group(function () {
        Route::get('/dashboardkaryawan', [DashboardKaryawanController::class, 'dashboardkaryawan'])->name('dashboard.karyawan');
        Route::get('/pengajuan', [PengajuanLemburController::class, 'pengajuan'])->name('pengajuan.karyawan');
        Route::post('/pengajuan', [PengajuanLemburController::class, 'simpanPengajuan'])->name('pengajuan.simpan');
        Route::get('/pengajuan/{id}/pdf', [PengajuanLemburController::class, 'generatePDF'])->name('pengajuan.pdf');
    });
});


Route::get('/', function () {
    return view('auth.login');
});
