<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\UserController;
// use App\Http\Controllers\StudentController;
// use App\Http\Middleware\AgeCheck;
// use App\Http\Middleware\CountryCheck;




Route::get('/', function () {
    return view('login');
});

Route::view('login/', 'login')->name('login');
Route::post('login/', [UserController::class, 'login']);




Route::middleware('auth')->group(function () {
    Route::get('dashboard/', function () {
        return view('dashboard');
    });
    
    Route::view('dashboard/', 'dashboard');
    Route::get('dashboard/', [TaskController::class, 'dashboard']);
    Route::view('tasks/', 'task-list');
    Route::get('tasks/', [TaskController::class, 'getTasks']);
    Route::view('create-task/', 'create-task');
    Route::post('create-task/', [TaskController::class, 'addTasks']);


    Route::get('task/{id}', [TaskController::class, 'getSingleTask']);
    Route::post('update/{id}', [TaskController::class, 'updateTask']);

    
    Route::get('logout/', [UserController::class, 'logout']);
});

// Admin Views
Route::view('admin/adduser/', 'admin/adduser');
Route::post('admin/adduser/', [UserController::class, 'addUser']);





// Route::post('login/', [UserController::class, 'login']);



// Route::middleware('auth')->group(function () {
//     Route::get('profile/', function () {
//         return view('profile');
//     });
    
//     Route::get('adduser/', function () {
//         return redirect('register');
//     });
   

//     Route::post('student-form/addStudent/', [StudentController::class, 'addStudent']);
//     Route::view('student-form/', 'student-form');
//     Route::get('students/', [StudentController::class, 'getStudents']);
//     Route::get('students/delete/{id}', [StudentController::class, 'deleteStudent']);
    
//     Route::get('user', [UserController::class, 'getUser']);
    
//     // Upload file view
//     Route::view('upload/', 'upload');
//     Route::post('upload/', [UserController::class, 'upload']);
    
    
//     Route::get('logoutprofile/', [UserController::class, 'logoutProfile']);


//     // for session practice
//     // Route::view('profile', 'profile');
//     Route::get('logout/', [UserController::class, 'logout']);
// });
