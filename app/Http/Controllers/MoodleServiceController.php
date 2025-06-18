<?php

namespace App\Http\Controllers;

use App\Services\MoodleService;

class MoodleServiceController extends Controller
{
    protected MoodleService $moodleService;

    public function __construct(MoodleService $moodleService)
    {
        $this->moodleService = $moodleService;
    }

    public function getAllCourseCategories(){
        $courses = $this->moodleService->getAllCourseCategories();
        return response()->json($courses);
    }
}
