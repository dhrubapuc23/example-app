<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\StudentController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [UserController::class, 'index']);
// Route::get('/homepage', function () {
//     return view('homepage');
// });

Route::view('/homepage', 'homepage', ['title' => 'Homepage'])->name('hp');

Route::get('/greeting', function () {
    return 'Hello World';
});

// Route::redirect('/', '/homepage');
Route::get('/user/{id}/{name?}', function (string $id,string $name = null) {
    // return 'User '.$id.'Name '.$name;
    return view('userpage',['id' => $id, 'name' => $name]);
})->whereNumber('id')->whereAlpha('name');

Route::prefix('blog')->group(function () {
    Route::get('/view', function () {
        return 'This is the blog view page';
    });
    Route::get('/create', function () {
        return 'This is the blog create page';
    });
    Route::get('/update', function () {
        return 'This is the blog update page';
    });
    Route::get('/delete', function () {
        return 'This is the blog delete page';
    });
});

Route::fallback(function () {
    return 'This is a fallback route';
});

// Route::redirect('old url', 'new url');

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/feature', function () {
    return view('feature');
});

Route::get('/student', [StudentController::class, 'index']);
//Route::resource('photo', PhotoController::class);
Route::get('/getcourse', [StudentController::class, 'getcoursedetails']);
Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
Route::post('/student/store', [StudentController::class, 'store'])->name('student.store');
Route::get('/student/show', [StudentController::class, 'getData'])->name('student.show');
Route::get('/student/edit/{id}', [StudentController::class, 'Edit'])->name('student.edit');
Route::post('/student/update/{id}', [StudentController::class, 'Update'])->name('student.update');
Route::get('/student/delete/{id}', [StudentController::class, 'Destroy'])->name('student.delete');