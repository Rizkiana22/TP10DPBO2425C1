<?php
include_once __DIR__ . '/../models/Enrollment.php';

class EnrollmentViewModel
{
    private $enrollment;

    public function __construct()
    {
        $this->enrollment = new Enrollment();
    }

    public function getEnrollmentList()
    {
        return $this->enrollment->getAll();
    }

    public function getEnrollmentById($enrollment_id)
    {
        return $this->enrollment->getById($enrollment_id);
    }

    public function addEnrollment($student_id, $course_id, $grade)
    {
        return $this->enrollment->create($student_id, $course_id, $grade);
    }

    public function updateEnrollment($enrollment_id, $student_id, $course_id, $grade)
    {
        return $this->enrollment->update($enrollment_id, $student_id, $course_id, $grade);
    }

    public function deleteEnrollment($enrollment_id)
    {
        return $this->enrollment->delete($enrollment_id);
    }
}
