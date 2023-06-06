<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/repository.php';

class SectionRepository extends Repository
{
    function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM clinic_sections ORDER BY name");
            $stmt->execute();

            $sections = $stmt->fetchAll();

            return $sections;

        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getAllNoOrder()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM clinic_sections");
            $stmt->execute();

            $sections = $stmt->fetchAll();

            return $sections;

        } catch (PDOException $e) {
            echo $e;
        }
    }

    function insertSection(string $section)
    {
        try {

            $query = "INSERT INTO clinic_sections (name)
            VALUES (:name)";

            $stmt = $this->connection->prepare($query);

            $stmt->bindParam(':name', $section);
            $stmt->execute();

        } catch (PDOException $e) {
            echo $e;
        }
    }

    function deleteSection(int $sectionId)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM clinic_sections WHERE id=:id");

            $stmt->bindParam(':id', $sectionId);

            $stmt->execute();

        } catch (PDOException $e) {
            echo $e;
        }
    }

    function updateSection(string $newSectionName)
    {
        try {
            $id = $_SESSION['sectionId'];

            $stmt = $this->connection->prepare("UPDATE clinic_sections SET name=:newName WHERE id=:id");

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':newName', $newSectionName);

            $stmt->execute();

        } catch (PDOException $e) {
            echo $e;
        }
    }
}