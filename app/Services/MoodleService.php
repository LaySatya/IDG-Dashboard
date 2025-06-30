<?php

namespace App\Services;
use App\Services\MoodleBaseService;


class MoodleService extends MoodleBaseService
{

    // Get all course categories from moodle
    public function getAllCourseCategories(){
        $params = array_merge($this->getBaseParams(), [
            'wsfunction' => 'core_course_get_categories',
        ]);
        return $this->sendRequest($params);
    }

    // Get courses by course category from moodle
    public function getCoursesByCategory(int $categoryId){
        $params = array_merge($this->getBaseParams(), [
            'wsfunction' => 'local_idgqbank_get_courses_by_category',
            'categoryid' => $categoryId
        ]);
        return $this->sendRequest($params);
    }

    // Get participants in a course from moodle
    public function getParticipantsFromCourse(int $courseId){
        $params = array_merge($this->getBaseParams(), [
            'wsfunction' => 'core_enrol_get_enrolled_users',
            'courseid' => $courseId
        ]);
        return $this->sendRequest($params);
    }

    // Get courses of user which is enrolled
    public function getEnrolledCoursesOfUser(int $userId){
        $params = array_merge($this->getBaseParams(), [
            'wsfunction' => 'core_enrol_get_users_courses',
            'userid' => $userId
        ]);
        return $this->sendRequest($params);
    }

    // Get all users
    public function getAllUsers(?string $department, ?int $page, ?int $perPage){
        $params = array_merge($this->getBaseParams(), [
            'wsfunction' => 'local_idgqbank_get_all_users',
            'department' => $department,
            'page' => $page,
            'perpage' => $perPage
        ]);
        return $this->sendRequest($params);
    }
    // Get report in a course
    public function getUserGradeInCourse(int $courseId, ?int $userId){
        $params = array_merge($this->getBaseParams(), [
            'wsfunction' => 'gradereport_user_get_grade_items',
            'courseid' => $courseId,
            'userid' => $userId,
        ]);
        return $this->sendRequest($params);
    }

}
