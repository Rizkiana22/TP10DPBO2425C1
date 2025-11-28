<?php
include_once __DIR__ . '/../config/DB.php';

class Student
{
    private $conn;
    private $table = "student";

    public function __construct()
    {
        $database = new DB();
        $this->conn = $database->getConnection();
    }

    // Get all student
    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get student by ID
    public function getById($student_id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE student_id = :student_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':student_id', $student_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Create new student
    public function create($full_name, $major, $entry_year)
    {
        $query = "INSERT INTO " . $this->table . " (full_name, major, entry_year)
                  VALUES (:full_name, :major, :entry_year)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':full_name', $full_name);
        $stmt->bindParam(':major', $major);
        $stmt->bindParam(':entry_year', $entry_year);
        return $stmt->execute();
    }

    // Update student data
    public function update($student_id, $full_name, $major, $entry_year)
    {
        $query = "UPDATE " . $this->table . "
                  SET full_name = :full_name, major = :major, entry_year = :entry_year 
                  WHERE student_id = :student_id";
                  
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':student_id', $student_id);
        $stmt->bindParam(':full_name', $full_name);
        $stmt->bindParam(':major', $major);
        $stmt->bindParam(':entry_year', $entry_year);

        return $stmt->execute();
    }

    // Delete student
    public function delete($student_id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE student_id = :student_id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':student_id', $student_id);
        return $stmt->execute();
    }
}
