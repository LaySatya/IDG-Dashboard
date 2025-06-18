<?php

use App\Http\Controllers\MoodleServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('course')->controller(MoodleServiceController::class)->group(function () {
    Route::get('/categories', 'getAllCourseCategories');
    Route::get('/','getCoursesByCategory');
    Route::get('/participants','getParticipantsFromCourse');
    Route::get('/participant_courses','getEnrolledCoursesOfUser');
});
