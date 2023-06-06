<?php

class Doctor implements JsonSerializable
{
    private int $id;
    private string $name;
    private int $section;
    private string $email;
    private string $date_of_birth;
    private string $phone_number;

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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getSection(): int
    {
        return $this->section;
    }

    /**
     * @param int $section
     */
    public function setSection(int $section): void
    {
        $this->section = $section;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getDateOfBirth(): string
    {
        return $this->date_of_birth;
    }

    /**
     * @param string $date_of_birth
     */
    public function setDateOfBirth(string $date_of_birth): void
    {
        $this->date_of_birth = $date_of_birth;
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phone_number;
    }

    /**
     * @param string $phone_number
     */
    public function setPhoneNumber(string $phone_number): void
    {
        $this->phone_number = $phone_number;
    }

    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }
}