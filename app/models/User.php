<?php

class User implements JsonSerializable
{
    private int $id;
    private string $first_name;
    private string $last_name;
    private string $address;
    private string $phone_number;
    private string $date_of_birth;
    private string $gender;
    private string $email;
    private string $password;
    private int $user_type;


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
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     */
    public function setFirstName(string $first_name): void
    {
        $this->first_name = $first_name;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * @param string $last_name
     */
    public function setLastName(string $last_name): void
    {
        $this->last_name = $last_name;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
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

    /**
     * @return string
     */
    public function getDateOfbirth(): string
    {
        return $this->date_of_birth;
    }

    /**
     * @param string $date_of_birth
     */
    public function setDateOfbirth(string $date_of_birth): void
    {
        $this->date_of_birth = $date_of_birth;
    }


    /**
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    public function setGender(string $gender): void
    {
        $this->gender = $gender;
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
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }


    /**
     * @return int
     */
    public function getUserType(): int
    {
        return $this->user_type;
    }

    /**
     * @param int $user_type
     */
    public function setUserType(int $user_type): void
    {
        $this->user_type = $user_type;
    }

    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }
}