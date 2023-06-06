<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/Appointment.php';

class AppointmentRepository extends Repository
{
    function insertAppointment(Appointment $appointment)
    {
        try {

            $userID = $appointment->getUserId();
            $doctorID = $appointment->getDoctorId();
            $date = $appointment->getDate();
            $time = $appointment->getTime();

            $query = "INSERT INTO appointments (user_id, doctor_id, date, time)
            VALUES (:userID, :doctorID, :date, :time)";

            $stmt = $this->connection->prepare($query);

            $stmt->bindParam(':userID', $userID);
            $stmt->bindParam(':doctorID', $doctorID);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':time', $time);

            $stmt->execute();

        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getAppointmentByUserId(int $userId)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM appointments WHERE user_id = :id");

            $stmt->bindParam(':id', $userId);

            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Appointment');
            $appointments = $stmt->fetchAll();

            return $appointments;

        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getAppointmentById(int $appointmentId)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM appointments WHERE id = :id");

            $stmt->bindParam(':id', $appointmentId);

            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Appointment');
            $appointment = $stmt->fetch();

            return $appointment;

        } catch (PDOException $e) {
            echo $e;
        }
    }

    function deleteAppointment(int $appointmentId)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM appointments WHERE id=:id");

            $stmt->bindParam(':id', $appointmentId);

            $stmt->execute();

        } catch (PDOException $e) {
            echo $e;
        }
    }

    function updateAppointment(Appointment $appointment)
    {
        try {


            $date = $appointment->getDate();
            $time = $appointment->getTime();
            $id = $_SESSION['appointmentId'];


            $query = "UPDATE appointments SET date=:date, time=:time
            WHERE id=:id";

            $stmt = $this->connection->prepare($query);

            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':time', $time);
            $stmt->bindParam(':id', $id);

            $stmt->execute();

        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getAppointmentByDateTime(string $date, string $time)
    {
        try {

            $query = "SELECT * FROM appointments WHERE date=:date AND time=:time;";

            $stmt = $this->connection->prepare($query);

            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':time', $time);

            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Appointment');
            $appointment = $stmt->fetch();

            return $appointment;

        } catch (PDOException $e) {
            echo $e;
        }
    }
}