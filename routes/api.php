<?php

use App\Http\Controllers\MoodleServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('courses')->controller(MoodleServiceController::class)->group(function () {
    Route::get('/categories', 'getAllCourseCategories');
});
