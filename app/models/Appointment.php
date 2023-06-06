<?php
require __DIR__ . '/../models/Doctor.php';
require __DIR__ . '/../models/User.php';

class Appointment implements JsonSerializable
{
    private int $id;
    private int $user_id;
    private int $doctor_id;
    private string $date;
    private string $time;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     */
    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return int
     */
    public function getDoctorId(): int
    {
        return $this->doctor_id;
    }

    /**
     * @param int $doctor_id
     */
    public function setDoctorId(int $doctor_id): void
    {
        $this->doctor_id = $doctor_id;
    }


    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getTime(): string
    {
        return $this->time;
    }

    /**
     * @param string $time
     */
    public function setTime(string $time): void
    {
        $this->time = $time;
    }

    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }
}