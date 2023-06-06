<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../services/AppointmentService.php';

class AppointmentController
{
    public function index()
    {
        require __DIR__ . '/../views/appointment/index.php';
    }

    public function editAppointment()
    {
        $appointmentService = new AppointmentService();

        if (isset($_POST['editAppointment'])) {
            $newDate = htmlspecialchars($_POST['date']);
            $newTime = htmlspecialchars($_POST['time']);

            $appointment = new Appointment();
            $appointment->setDate($newDate);
            $appointment->setTime($newTime);
            $appointmentService->updateAppointment($appointment);

            header('location: /home/appointments');
        }

        if (isset($_POST['appointmentId'])) {
            $appointmentId = $_POST['appointmentId'];
            $_SESSION['appointmentId'] = $appointmentId;

            $appointment = $appointmentService->getAppointmentById($appointmentId);
            $date = $appointment->getDate();
            $time = $appointment->getTime();
        }
        require __DIR__ . '/../views/home/editAppointment.php';
    }
}