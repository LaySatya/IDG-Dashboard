<?php

namespace App\Http\Controllers;


use App\Services\MoodleService;
use Illuminate\Http\Request;
class MoodleServiceController extends Controller
{
    protected MoodleService $moodleService;

    public function __construct(MoodleService $moodleService)
    {
        $this->moodleService = $moodleService;
    }

    // Get all course catgories
    public function getAllCourseCategories(){
        $categories = $this->moodleService->getAllCourseCategories();
        return response()->json($categories);
    }

    // Get courses by category
    public function getCoursesByCategory(Request $request){
        $categoryId = $request->input('categoryid');

        if(empty($categoryId)){
            return response()->json([
                'message' => 'Category id is required!',
        ]);
        }

        $courses = $this->moodleService->getCoursesByCategory($categoryId);

        return $courses;
    }

    // Get participants by course
    public function getParticipantsFromCourse(Request $request){
        $courseId = $request->input('courseid');

        if(empty($courseId)){
            return response()->json([
                'message'=> 'Course id is required!',
            ]);
        }

        $participants = $this->moodleService->getParticipantsFromCourse($courseId);

        return response()->json($participants);
    }

}
