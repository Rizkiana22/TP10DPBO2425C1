<?php
include_once __DIR__ . '/../models/Lecturer.php';

class LecturerViewModel
{
    private $lecturer;
    
    public function __construct()
    {
        $this->lecturer = new Lecturer();
    }

    public function getLecturerList()
    {
        return $this->lecturer->getAll();
    }

    public function getLecturerById($id)
    {
        return $this->lecturer->getById($id);
    }

    public function addLecturer($lecturer_name, $phone)
    {
        return $this->lecturer->create($lecturer_name, $phone);
    }

    public function updateLecturer($lecturer_id, $lecturer_name, $phone)
    {
        return $this->lecturer->update($lecturer_id, $lecturer_name, $phone);
    }

    public function deleteLecturer($lecturer_id)
    {
        return $this->lecturer->delete($lecturer_id);
    }
}