<?php
include_once __DIR__ . '/../models/Student.php';

class StudentViewModel
{
    private $student;
    
    public function __construct()
    {
        $this->student = new Student();
    }

    public function getstudentList()
    {
        return $this->student->getAll();
    }

    public function getstudentById($id)
    {
        return $this->student->getById($id);
    }

    public function addstudent($full_name, $major, $entry_year)
    {
        return $this->student->create($full_name, $major, $entry_year);
    }

    public function updatestudent($student_id, $student_name, $major, $entry_year)
    {
        return $this->student->update($student_id, $student_name, $major, $entry_year);
    }

    public function deletestudent($student_id)
    {
        return $this->student->delete($student_id);
    }
}