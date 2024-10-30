<?php

use App\Http\Controllers\AbsenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Karyawan\IndexController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\QrCodeController;

Route::get('/verify/{token}', [AuthController::class, 'verify']);

// route middleware guest
Route::middleware(['guest'])->group(function () {

    // route auth
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginAction']);
    Route::get('forgot-password', [AuthController::class, 'forgotPassword']);
    Route::post('forgot-password', [AuthController::class, 'forgotPasswordAction']);
    Route::get('reset-password/{token}', [AuthController::class, 'resetPassword']);
    Route::put('reset-password/{token}/action', [AuthController::class, 'resetPasswordAction']);

});

// middleware auth
Route::group(['middleware' => 'auth'], function () {

    Route::middleware('role:Karyawan')->group(function () {
        Route::group(['prefix' => 'karyawan'], function () {
            Route::get('/', [IndexController::class, 'index'])->name('index');
            Route::get('/profile', [IndexController::class, 'profile'])->name('profile');
            Route::get('/wfo', [IndexController::class, 'wfo'])->name('wfo');
            Route::get('/wfh', [IndexController::class, 'wfh'])->name('wfh');
            Route::post('/absen', [AbsenController::class, 'absen']);
            Route::post('/absen-wfh', [AbsenController::class, 'absen_wfh']);
        });

    });

    // grup auth
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // grup backoffice
    Route::group(['prefix' => 'backoffice'], function () {

        // grup dashboard
        Route::group(['prefix' => 'dashboard'], function () {
            Route::get('/', [DashboardController::class, 'index']);
        });

        // grup user data
        Route::group(['prefix' => 'user-data'], function () {

            // grup role
            Route::group(['prefix' => 'role'], function () {
                Route::get('/', [RoleController::class, 'index']);
                Route::post('/create', [RoleController::class, 'create']);

                // grup role_id
                Route::group(['prefix' => '{role_id}'], function () {
                    Route::put('/update', [RoleController::class, 'update']);
                    Route::get('/delete', [RoleController::class, 'delete']);
                });

            });

            // grup user
            Route::group(['prefix' => 'user'], function () {
                Route::get('/', [UserController::class, 'index']);
                Route::post('/create', [UserController::class, 'create']);

                // grup user_id
                Route::group(['prefix' => '{user_id}'], function () {
                    Route::put('/update', [UserController::class, 'update']);
                    Route::get('/profile', [UserController::class, 'profile']);
                    Route::get('/edit-data', [UserController::class, 'editData']);
                    Route::get('/edit-password', [UserController::class, 'editPassword']);
                    Route::post('/update-data', [UserController::class, 'updateData']);
                    Route::post('/update-password', [UserController::class, 'updatePassword']);
                    Route::get('/delete', [UserController::class, 'delete']);
                });

            });

        });

        // grup absensi data
        Route::group(['prefix' => 'absensi-data'], function () {

            // grup qrcode
            Route::group(['prefix' => 'qrcode'], function () {
                Route::get('/', [QrCodeController::class, 'index']);
                Route::post('/generate', [QrCodeController::class, 'generate']);

                // grup qrcode_id
                Route::group(['prefix' => '{qrcode_id}'], function () {
                    Route::put('/update', [QrCodeController::class, 'update']);
                    Route::get('/delete', [QrCodeController::class, 'delete']);
                });

            });

            // grup absensi
            Route::group(['prefix' => 'absensi'], function () {
                Route::get('/', [AbsenController::class, 'index']);

                // grup absensi_id
                Route::group(['prefix' => '{absensi_id}'], function () {
                    Route::put('/update', [AbsenController::class, 'update']);
                    Route::get('/delete', [AbsenController::class, 'delete']);
                });
            });

            // grup pengajuan
            Route::group(['prefix' => 'pengajuan'], function () {
                Route::get('/', [PengajuanController::class, 'index']);
                Route::post('/create', [PengajuanController::class, 'create']);

                // grup pengajuan_id
                Route::group(['prefix' => '{pengajuan_id}'], function () {
                    Route::put('/update', [PengajuanController::class, 'update']);
                    Route::get('/delete', [PengajuanController::class, 'delete']);
                });
            });

        });

    });

});
