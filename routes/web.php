<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\EmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PageController::class, 'index'])->name('home');

// Employee CRUD
Route::group(['prefix'=>'employee'], function(){
    Route::get('/manage', [EmployeeController::class, 'index'])->name('employee.manage');
    Route::get('/create', [EmployeeController::class, 'create'])->name('employee.create');
    Route::post('/store', [EmployeeController::class, 'store'])->name('employee.store');
    Route::get('/edit/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::post('/update/{id}', [EmployeeController::class, 'update'])->name('employee.update');
    Route::post('/destroy/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
});


// Bydefault After install Laravel
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
