<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Tasks\TaskController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\Employees\EmployeeController;
use App\Http\Controllers\Departments\DepartmentController;


Route::get('/', function () {return redirect('/dashboard');})->middleware('auth');

	Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
	Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
	Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');

    Route::group(['middleware' => 'auth'], function () {

	Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::prefix('employees')->group(function () {
        Route::get('/list', [EmployeeController::class, 'index'])->name('employees.index');
        Route::post('/search', [EmployeeController::class, 'index'])->name('employees.search');
        Route::get('create', [EmployeeController::class, 'create'])->name('employees.create');
        Route::post('/save', [EmployeeController::class, 'store'])->name('employees.store');
        Route::get('/edit/{employee}', [EmployeeController::class, 'edit'])->name('employees.edit');
        Route::post('/update/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
        Route::get('/delete/{employee}', [EmployeeController::class, 'delete'])->name('employees.delete');
    });

    Route::group(['prefix' => 'tasks'], function () {
        Route::get('/list', [TaskController::class, 'index'])->name('tasks.index');
        Route::get('create', [TaskController::class, 'create'])->name('tasks.create');
        Route::post('/save', [TaskController::class, 'store'])->name('tasks.store');
        Route::get('/edit/{task}', [TaskController::class, 'edit'])->name('tasks.edit');
        Route::post('/update/{task}', [TaskController::class, 'update'])->name('tasks.update');
        Route::get('/delete/{task}', [TaskController::class, 'delete'])->name('tasks.delete');
    });

    Route::group(['prefix' => 'departments'], function () {
        Route::get('/list', [DepartmentController::class, 'index'])->name('departments.index');
        Route::get('create', [DepartmentController::class, 'create'])->name('departments.create');
        Route::post('/save', [DepartmentController::class, 'store'])->name('departments.store');
        Route::get('/edit/{department}', [DepartmentController::class, 'edit'])->name('departments.edit');
        Route::post('/update/{department}', [DepartmentController::class, 'update'])->name('departments.update');
        Route::get('/delete/{department}', [DepartmentController::class, 'delete'])->name('departments.delete');
    });


});
