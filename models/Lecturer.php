<?php
include_once __DIR__ . '/../config/DB.php';

class Lecturer
{
    private $conn;
    private $table = "lecturer";

    public function __construct()
    {
        $database = new DB();
        $this->conn = $database->getConnection();
    }

    // Get all lecturers
    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get lecturer by ID
    public function getById($lecturer_id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE lecturer_id = :lecturer_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':lecturer_id', $lecturer_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Create new lecturer
    public function create($lecturer_name, $phone)
    {
        $query = "INSERT INTO " . $this->table . " (lecturer_name, phone)
                  VALUES (:lecturer_name, :phone)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':lecturer_name', $lecturer_name);
        $stmt->bindParam(':phone', $phone);

        return $stmt->execute();
    }

    // Update lecturer data
    public function update($lecturer_id, $lecturer_name, $phone)
    {
        $query = "UPDATE " . $this->table . "
                  SET lecturer_name = :lecturer_name, phone = :phone
                  WHERE lecturer_id = :lecturer_id";
                  
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':lecturer_id', $lecturer_id);
        $stmt->bindParam(':lecturer_name', $lecturer_name);
        $stmt->bindParam(':phone', $phone);

        return $stmt->execute();
    }

    // Delete lecturer
    public function delete($lecturer_id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE lecturer_id = :lecturer_id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':lecturer_id', $lecturer_id);
        return $stmt->execute();
    }
}
