<?php
include_once __DIR__ . '/../models/Course.php';

class CourseViewModel
{
    private $course;

    public function __construct()
    {
        $this->course = new Course();
    }

    public function getCourseList()
    {
        return $this->course->getAll();
    }

    public function getCourseById($course_id)
    {
        return $this->course->getById($course_id);
    }

    public function addCourse($lecturer_id, $course_name, $credits)
    {
        return $this->course->create($lecturer_id, $course_name, $credits);
    }

    public function updateCourse($course_id, $lecturer_id, $course_name, $credits)
    {
        return $this->course->update($course_id, $lecturer_id, $course_name, $credits);
    }

    public function deleteCourse($course_id)
    {
        return $this->course->delete($course_id);
    }
}
