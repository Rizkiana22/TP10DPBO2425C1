<?php
include_once __DIR__ . '/../config/DB.php';

class Enrollment
{
    private $conn;
    private $table = "enrollment";

    public function __construct()
    {
        $database = new DB();
        $this->conn = $database->getConnection();
    }

    public function getAll()
    {
        $query = "
            SELECT 
                e.enrollment_id,
                e.grade,

                s.student_id,
                s.full_name,

                c.course_id,
                c.course_name,
                c.credits,

                l.lecturer_id,
                l.lecturer_name

            FROM enrollment e
            LEFT JOIN student s ON e.student_id = s.student_id
            LEFT JOIN course  c ON e.course_id = c.course_id
            LEFT JOIN lecturer l ON c.lecturer_id = l.lecturer_id
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($enrollment_id)
    {
        $query = "
            SELECT 
                e.enrollment_id,
                e.grade,

                s.student_id,
                s.full_name,

                c.course_id,
                c.course_name,
                c.credits,

                l.lecturer_id,
                l.lecturer_name

            FROM enrollment e
            LEFT JOIN student s ON e.student_id = s.student_id
            LEFT JOIN course  c ON e.course_id = c.course_id
            LEFT JOIN lecturer l ON c.lecturer_id = l.lecturer_id
            WHERE e.enrollment_id = :enrollment_id
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":enrollment_id", $enrollment_id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($student_id, $course_id, $grade)
    {
        $query = "
            INSERT INTO enrollment (student_id, course_id, grade)
            VALUES (:student_id, :course_id, :grade)
        ";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":student_id", $student_id);
        $stmt->bindParam(":course_id", $course_id);
        $stmt->bindParam(":grade", $grade);

        return $stmt->execute();
    }

    public function update($enrollment_id, $student_id, $course_id, $grade)
    {
        $query = "
            UPDATE enrollment
            SET student_id = :student_id,
                course_id = :course_id,
                grade = :grade
            WHERE enrollment_id = :enrollment_id
        ";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":enrollment_id", $enrollment_id);
        $stmt->bindParam(":student_id", $student_id);
        $stmt->bindParam(":course_id", $course_id);
        $stmt->bindParam(":grade", $grade);

        return $stmt->execute();
    }

    public function delete($enrollment_id)
    {
        $query = "
            DELETE FROM enrollment WHERE enrollment_id = :enrollment_id
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":enrollment_id", $enrollment_id);

        return $stmt->execute();
    }
}
