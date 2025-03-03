<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use App\Http\Controllers\Admin\CourseCategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CourseLanguageController;
use App\Http\Controllers\Admin\CourseLevelController;
use App\Http\Controllers\Admin\CourseSubCategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InstructorRequestController;
use Illuminate\Support\Facades\Route;

Route::group(["middleware" => "guest:admin", "prefix" => "admin", "as" => "admin."], function () {

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.store');

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::group(["middleware" => "auth:admin", "prefix" => "admin", "as" => "admin."], function () {
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



    // dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // instructor request
    Route::get('instructor-doc-download/{user}', [InstructorRequestController::class, 'download'])->name('instructor-doc-download');
    Route::resource('instructor-requests', InstructorRequestController::class);

    // course languages
    Route::resource('course-languages', CourseLanguageController::class);

    // course level
    Route::resource('course-levels', CourseLevelController::class);

    // course category
    Route::get('/{course_category}/sub-categories', [CourseSubCategoryController::class, 'index'])->name('course-sub-categories.index');
    Route::get('/{course_category}/sub-categories/create', [CourseSubCategoryController::class, 'create'])->name('course-sub-categories.create');
    Route::post('/{course_category}/sub-categories', [CourseSubCategoryController::class, 'store'])->name('course-sub-categories.store');
    Route::get('/{course_category}/sub-categories/{course_sub_category}/edit', [CourseSubCategoryController::class, 'edit'])->name('course-sub-categories.edit');
    Route::put('/{course_category}/sub-categories/{course_sub_category}', [CourseSubCategoryController::class, 'update'])->name('course-sub-categories.update');
    Route::delete('/{course_category}/sub-categories/{course_sub_category}', [CourseSubCategoryController::class, 'destroy'])->name('course-sub-categories.destroy');
    Route::resource('course-categories', CourseCategoryController::class);


    // courses
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::put('/courses/{courses}/update-approval', [CourseController::class, 'updateApproval'])->name('courses.update-approval');
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/courses/create', [CourseController::class, 'storeBasicInfo'])->name('courses.store-basic-info');
    Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::post('/courses/update', [CourseController::class, 'update'])->name('courses.update');

    // // course content
    // Route::get('/courses-content/{course}/create-chapter', [CourseContentController::class, 'createChapterModel'])->name('courses-content.create-chapter');
    // Route::post('/courses-content/{course}/create-chapter', [CourseContentController::class, 'storeChapterModel'])->name('courses-content.store-chapter');
    // Route::get('/courses-content/{chapter}/edit-chapter', [CourseContentController::class, 'editChapterModel'])->name('courses-content.edit-chapter');
    // Route::put('/courses-content/{chapter}/update-chapter', [CourseContentController::class, 'updateChapterModel'])->name('courses-content.update-chapter');
    // Route::delete('/courses-content/{chapter}/chapter', [CourseContentController::class, 'destroyChapterModel'])->name('courses-content.destroy-chapter');

    // // course lesson
    // Route::get('/courses-content/create-lesson', [CourseContentController::class, 'createLesson'])->name('courses-content.create-lesson');
    // Route::post('/courses-content/create-lesson', [CourseContentController::class, 'storeLesson'])->name('courses-content.store-lesson');
    // Route::get('/courses-content/edit-lesson', [CourseContentController::class, 'editLesson'])->name('courses-content.edit-lesson');
    // Route::post('/courses-content/{id}/update-lesson', [CourseContentController::class, 'updateLesson'])->name('courses-content.update-lesson');
    // Route::delete('/courses-content/{id}/lesson', [CourseContentController::class, 'destroyLesson'])->name('courses-content.destroy-lesson');

    // // sort chapter
    // Route::get('/courses-content/{course}/sort-chapter', [CourseContentController::class, 'sortChapter']);
    // Route::post('/courses-content/{course}/sort-chapter', [CourseContentController::class, 'updateSortChapter']);

    // // sort lesson
    // Route::post('/courses-chapter/{chapter}/sort-lesson', [CourseContentController::class, 'sortLesson']);

    // laravel file manager route
    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth:admin']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});
