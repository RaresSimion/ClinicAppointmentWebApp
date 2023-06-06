<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/repository.php';
require __DIR__ . '/../models/Doctor.php';

class DoctorRepository extends Repository
{
    function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM doctors");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Doctor');
            $doctors = $stmt->fetchAll();

            return $doctors;

        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getDoctorById(int $id)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM doctors WHERE id=:id");

            $stmt->bindParam(':id', $id);

            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Doctor');
            $doctor = $stmt->fetch();

            return $doctor;

        } catch (PDOException $e) {
            echo $e;
        }
    }

    function updateDoctor(Doctor $doctor)
    {
        try {

            $name = $doctor->getName();
            $section = $doctor->getSection();
            $email = $doctor->getEmail();
            $dateOfBirth = $doctor->getDateOfBirth();
            $phoneNumber = $doctor->getPhoneNumber();
            $id = $_SESSION['doctorId'];


            $query = "UPDATE doctors SET name=:name, section=:section, email=:email, date_of_birth=:dateOfBirth, phone_number=:phoneNumber
            WHERE id=:id";

            $stmt = $this->connection->prepare($query);

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':section', $section);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':dateOfBirth', $dateOfBirth);
            $stmt->bindParam(':phoneNumber', $phoneNumber);
            $stmt->bindParam(':id', $id);

            $stmt->execute();

        } catch (PDOException $e) {
            echo $e;
        }
    }

    function insertDoctor(Doctor $doctor)
    {
        try {

            $name = $doctor->getName();
            $section = $doctor->getSection();
            $email = $doctor->getEmail();
            $dateOfBirth = $doctor->getDateOfBirth();
            $phoneNumber = $doctor->getPhoneNumber();

            $query = "INSERT INTO doctors (name, section, email, date_of_birth, phone_number)
            VALUES (:name, :section, :email, :dateOfBirth, :phoneNumber)";

            $stmt = $this->connection->prepare($query);

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':section', $section);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':dateOfBirth', $dateOfBirth);
            $stmt->bindParam(':phoneNumber', $phoneNumber);

            $stmt->execute();

        } catch (PDOException $e) {
            echo $e;
        }
    }

    function deleteDoctor(int $doctorId)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM doctors WHERE id=:id");

            $stmt->bindParam(':id', $doctorId);

            $stmt->execute();

        } catch (PDOException $e) {
            echo $e;
        }
    }
}