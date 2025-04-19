<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestsController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ItemsController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [RequestsController::class, 'index'])->middleware(['auth', 'verified']);

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('requests', RequestsController::class)->middleware(['auth', 'verified']);
Route::get('employees', [EmployeeController::class, 'index'])->name('employees.get')->middleware(['auth', 'verified']);
Route::get('items', [ItemsController::class, 'index'])->name('items.get')->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
