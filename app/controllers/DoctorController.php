<?php
require __DIR__ . '/../services/DoctorService.php';

class DoctorController
{
    private $doctorService;

    function __construct()
    {
        $this->doctorService = new DoctorService();
    }

    public function index()
    {
        $model = $this->doctorService->getAll();

        require __DIR__ . '/../views/doctors/index.php';
    }
}