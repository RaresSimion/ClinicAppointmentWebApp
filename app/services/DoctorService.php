<?php
require_once __DIR__ . '/../repositories/DoctorRepository.php';

class DoctorService
{
    private DoctorRepository $repository;

    public function __construct()
    {
        $this->repository = new DoctorRepository();
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function getDoctorById(int $id)
    {
        return $this->repository->getDoctorByID($id);
    }

    public function updateDoctor(Doctor $doctor)
    {
        $this->repository->updateDoctor($doctor);
    }

    public function inserDoctor(Doctor $doctor)
    {
        $this->repository->insertDoctor($doctor);
    }

    public function deleteDoctor(int $doctorId)
    {
        $this->repository->deleteDoctor($doctorId);
    }
}