<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

//
// Authentication Routes
//

Route::get('/login', [AuthenticationController::class, 'loginPage'])->name('login');
Route::post('/authenticate', [AuthenticationController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');
Route::get('/admin', function () { return redirect()->route('login'); });

//
// Admin Routes
//

Route::middleware('auth:admins')->group(function () {

    //
    // Loan
    //

    Route::get('/loan', [AdminController::class, 'bookLoan'])->name('loan');
    Route::get('/loan/create', [AdminController::class, 'loanCreate'])->name('loan-create');
    Route::post('/loan/create/process', [AdminController::class, 'loanCreateProcess'])->name('loan-create-process');
    Route::get('/loan/return/{loan_id}', [AdminController::class, 'loanReturn'])->name('loan-return');
    Route::post('/loan/return/process', [AdminController::class, 'loanReturnProcess'])->name('loan-return-process');


    //
    // Book Data
    //

    Route::get('/book', [AdminController::class, 'bookData'])->name('book');
    Route::get('/book/create', [AdminController::class, 'bookCreate'])->name('book-create');
    Route::post('/book/create/process', [AdminController::class, 'bookCreateProcess'])->name('book-create-process');
    Route::post('/book/copy/create/process', [AdminController::class, 'bookCopyCreateProcess'])->name('book-copy-create-process');

    // 
    // Member Data
    //

    Route::get('/member', [AdminController::class, 'memberData'])->name('member');
    Route::get('/member/create', [AdminController::class, 'memberCreate'])->name('member-create');
    Route::post('/member/create/process', [AdminController::class, 'memberCreateProcess'])->name('member-create-process');
});




