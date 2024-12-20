<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Tenants;
use App\Livewire\Tenants\Index;
use App\Livewire\Tenants\Payments;
use App\Livewire\Tenants\Create;
use App\Livewire\Tenants\Edit;
use App\Models\Tenant;
use App\Livewire\Home;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/tenants', Index::class)->name('tenants.index'); 
    Route::get('/tenants-payments', Payments::class)->name('tenants.payments');
    Route::get('/tenants-create', App\Livewire\Tenants\Create::class)->name('tenants.create');
    Route::get('/tenants/{tenant}/edit', Edit::class)->name('tenants.edit');
    Route::get('/home', Home::class)->name('home');

});

require __DIR__.'/auth.php';
