<?php
require_once __DIR__ . '/../repositories/AppointmentRepository.php';


class AppointmentService
{
    private AppointmentRepository $repository;

    public function __construct()
    {
        $this->repository = new AppointmentRepository();
    }

    public function insertAppointment(Appointment $appointment): void
    {
        $this->repository->insertAppointment($appointment);
    }

    public function getAppointmentByUserId(int $userId)
    {
        return $this->repository->getAppointmentByUserId($userId);
    }

    public function getAppointmentById(int $appointmentId)
    {
        return $this->repository->getAppointmentById($appointmentId);
    }

    public function deleteAppointment(int $appointmentId)
    {
        $this->repository->deleteAppointment($appointmentId);
    }

    public function updateAppointment(Appointment $appointment)
    {
        $this->repository->updateAppointment($appointment);
    }

    public function getAppointmentByDateTime(string $date, string $time)
    {
        return $this->repository->getAppointmentByDateTime($date, $time);
    }
}