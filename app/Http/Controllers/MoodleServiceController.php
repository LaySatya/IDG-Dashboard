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

    // Get enrolled courses of user
    public function getEnrolledCoursesOfUser(Request $request){
         $userId = $request->input('userid');

        if(empty($userId)){
            return response()->json([
                'message'=> 'User id is required!',
            ]);
        }

        $enrolledCourses = $this->moodleService->getEnrolledCoursesOfUser($userId);

        return response()->json($enrolledCourses);
    }

    // Get all users
    public function getAllUsers(Request $request){
         $department = $request->input('department');
         $page = $request->input('page');
         $perPage = $request->input('per_page');


        $users = $this->moodleService->getAllUsers($department, $page, $perPage);

        return response()->json($users);
    }
    // Get users report in a course
    public function getUserGradeInCourse(Request $request){
         $courseId = $request->input('courseid');
         $userId = $request->input('userid');

         if(empty($courseId)){
            return response()->json([
                'message' => 'Course id is required!',
            ]);
         }
        $grades = $this->moodleService->getUserGradeInCourse($courseId, $userId);



        return response()->json($grades);
    }

}
