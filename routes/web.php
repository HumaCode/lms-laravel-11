<?php

use App\Http\Controllers\Frontend\CourseContentController;
use App\Http\Controllers\Frontend\CourseController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\InstructorDashboardController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\StudentDashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/', [FrontendController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth:web', 'verified', 'check_role:student'], 'prefix' => 'student', 'as' => 'student.'], function () {
    Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('dashboard');
    Route::get('/become-instructor', [StudentDashboardController::class, 'becomeInstructor'])->name('become-instructor');
    Route::post('/become-instructor/{user}', [StudentDashboardController::class, 'becomeInstructorUpdate'])->name('become-instructor.update');

    // profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/update', [ProfileController::class, 'profileUpdate'])->name('profile.profile-update');
    Route::post('/profile/update-password', [ProfileController::class, 'profilePassword'])->name('profile.profile-password');
    Route::post('/profile/update-social', [ProfileController::class, 'profileSocial'])->name('profile.profile-social');
});

Route::group(['middleware' => ['auth:web', 'verified', 'check_role:instructor'], 'prefix' => 'instructor', 'as' => 'instructor.'], function () {
    Route::get('/dashboard', [InstructorDashboardController::class, 'index'])->name('dashboard');

    // profile
    Route::get('/profile', [ProfileController::class, 'indexProfilInstructor'])->name('profile.index');
    Route::post('/profile/update', [ProfileController::class, 'profileUpdate'])->name('profile.profile-update');
    Route::post('/profile/update-password', [ProfileController::class, 'profilePassword'])->name('profile.profile-password');
    Route::post('/profile/update-social', [ProfileController::class, 'profileSocial'])->name('profile.profile-social');

    // course
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/courses/create', [CourseController::class, 'storeBasicInfo'])->name('courses.store-basic-info');
    Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::post('/courses/update', [CourseController::class, 'update'])->name('courses.update');

    // course content
    Route::get('/courses-content/{course}/create-chapter', [CourseContentController::class, 'createChapterModel'])->name('courses-content.create-chapter');
    Route::post('/courses-content/{course}/create-chapter', [CourseContentController::class, 'storeChapterModel'])->name('courses-content.store-chapter');
    Route::get('/courses-content/{chapter}/edit-chapter', [CourseContentController::class, 'editChapterModel'])->name('courses-content.edit-chapter');
    Route::put('/courses-content/{chapter}/update-chapter', [CourseContentController::class, 'updateChapterModel'])->name('courses-content.update-chapter');
    Route::delete('/courses-content/{chapter}/chapter', [CourseContentController::class, 'destroyChapterModel'])->name('courses-content.destroy-chapter');

    // course lesson
    Route::get('/courses-content/create-lesson', [CourseContentController::class, 'createLesson'])->name('courses-content.create-lesson');
    Route::post('/courses-content/create-lesson', [CourseContentController::class, 'storeLesson'])->name('courses-content.store-lesson');
    Route::get('/courses-content/edit-lesson', [CourseContentController::class, 'editLesson'])->name('courses-content.edit-lesson');
    Route::post('/courses-content/{id}/update-lesson', [CourseContentController::class, 'updateLesson'])->name('courses-content.update-lesson');
    Route::delete('/courses-content/{id}/lesson', [CourseContentController::class, 'destroyLesson'])->name('courses-content.destroy-lesson');

    // sort chapter
    Route::get('/courses-content/{course}/sort-chapter', [CourseContentController::class, 'sortChapter']);
    Route::post('/courses-content/{course}/sort-chapter', [CourseContentController::class, 'updateSortChapter']);

    // sort lesson
    Route::post('/courses-chapter/{chapter}/sort-lesson', [CourseContentController::class, 'sortLesson']);

    // laravel file manager route
    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});


require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
