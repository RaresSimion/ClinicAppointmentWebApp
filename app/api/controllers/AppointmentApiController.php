<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/../../services/AppointmentService.php';

class AppointmentApiController
{
    private $appointmentService;

    function __construct()
    {
        $this->appointmentService = new AppointmentService();
    }

    public function index()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *');
        header('Access-Control-Allow-Methods: *');

        if ($_SERVER["REQUEST_METHOD"] == "GET") {

            $userId = $_SESSION['id'];
            $appointments = $this->appointmentService->getAppointmentByUserId($userId);
            header('Content-Type: application/json');
            echo json_encode($appointments);

        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $body = file_get_contents('php://input');
            $obj = json_decode($body);

            $doctorId = $obj->doctor;
            $userId = $_SESSION['id'];


            $appointment = new Appointment();
            $appointment->setUserId($userId);
            $appointment->setDoctorId($doctorId);
            $appointment->setDate($obj->date);
            $appointment->setTime($obj->time);

            $checkAppointment = $this->appointmentService->getAppointmentByDateTime($obj->date, $obj->time);
            if ($checkAppointment == null)
                $this->appointmentService->insertAppointment($appointment);
            else
                throw new Exception("You already have an appointment on the selected date and time");

            header('Content-Type: application/json');
        }
    }

    public function delete()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *');
        header('Access-Control-Allow-Methods: *');

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $body = file_get_contents('php://input');
            $obj = json_decode($body);

            $appointmentId = $obj->id;

            $this->appointmentService->deleteAppointment($appointmentId);
            header('Content-Type: application/json');
        }
    }
}

?>