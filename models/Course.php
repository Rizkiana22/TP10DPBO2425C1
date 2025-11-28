<?php
include_once __DIR__ . '/../config/DB.php';

class Course
{
    private $conn;
    private $table = "course";

    public function __construct()
    {
        $database = new DB();
        $this->conn = $database->getConnection();
    }

    // Get all courses with lecturer data
    public function getAll()
    {
        $query = "
            SELECT 
                c.course_id,
                c.course_name,
                c.credits,

                l.lecturer_id,
                l.lecturer_name,
                l.phone
            FROM course c
            LEFT JOIN lecturer l ON c.lecturer_id = l.lecturer_id
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get one course by ID
    public function getById($course_id)
    {
        $query = "
            SELECT 
                c.course_id,
                c.course_name,
                c.credits,

                l.lecturer_id,
                l.lecturer_name,
                l.phone
            FROM course c
            LEFT JOIN lecturer l ON c.lecturer_id = l.lecturer_id
            WHERE c.course_id = :course_id
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":course_id", $course_id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Insert new course
    public function create($lecturer_id, $course_name, $credits)
    {
        $query = "
            INSERT INTO course (lecturer_id, course_name, credits)
            VALUES (:lecturer_id, :course_name, :credits)
        ";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":lecturer_id", $lecturer_id);
        $stmt->bindParam(":course_name", $course_name);
        $stmt->bindParam(":credits", $credits);

        return $stmt->execute();
    }

    // Update course
    public function update($course_id, $lecturer_id, $course_name, $credits)
    {
        $query = "
            UPDATE course
            SET lecturer_id = :lecturer_id,
                course_name = :course_name,
                credits = :credits
            WHERE course_id = :course_id
        ";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":course_id", $course_id);
        $stmt->bindParam(":lecturer_id", $lecturer_id);
        $stmt->bindParam(":course_name", $course_name);
        $stmt->bindParam(":credits", $credits);

        return $stmt->execute();
    }

    // Delete course
    public function delete($course_id)
    {
        $query = "
            DELETE FROM course WHERE course_id = :course_id
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":course_id", $course_id);

        return $stmt->execute();
    }
}
