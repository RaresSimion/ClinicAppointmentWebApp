<?php
require __DIR__ . '/../../services/DoctorService.php';

class DoctorApiController
{
    private $doctorService;

    function __construct()
    {
        $this->doctorService = new DoctorService();
    }

    public function index()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *');
        header('Access-Control-Allow-Methods: *');

        if ($_SERVER["REQUEST_METHOD"] == "GET") {

            $doctors = $this->doctorService->getAll();
            header('Content-Type: application/json');
            echo json_encode($doctors);

        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $body = file_get_contents('php://input');
            $obj = json_decode($body);
            $doctorId = $obj->id;

            $this->doctorService->deleteDoctor($doctorId);
            header('Content-Type: application/json');
        }
    }
}

?>