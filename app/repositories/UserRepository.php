<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/User.php';

class UserRepository extends Repository
{
    function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM users");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $users = $stmt->fetchAll();

            return $users;

        } catch (PDOException $e) {
            echo $e;
        }
    }

    function insertUser(User $user)
    {
        try {
            $firstName = $user->getFirstName();
            $lastName = $user->getLastName();
            $address = $user->getAddress();
            $phoneNumber = $user->getPhoneNumber();
            $dateOfBirth = $user->getDateOfbirth();
            $gender = $user->getGender();
            $email = $user->getEmail();
            $password = $user->getPassword();
            $userType = $user->getUserType();

            $query = "INSERT INTO users (first_name, last_name, address, phone_number, date_of_birth, gender, email, password, user_type)
            VALUES (:firstName, :lastName, :address, :phoneNumber, :dateOfBirth, :gender, :email, :password, :userType)";

            $stmt = $this->connection->prepare($query);

            $stmt->bindParam(':firstName', $firstName);
            $stmt->bindParam(':lastName', $lastName);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':phoneNumber', $phoneNumber);
            $stmt->bindParam(':dateOfBirth', $dateOfBirth);
            $stmt->bindParam(':gender', $gender);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':userType', $userType);

            $stmt->execute();

        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getUserByEmail(string $email)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM users WHERE email = :email");

            $stmt->bindParam(':email', $email);

            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $user = $stmt->fetch();

            return $user;

        } catch (PDOException $e) {
            echo $e;
        }
    }

    function updateUser(User $user)
    {
        try {
            $firstName = $user->getFirstName();
            $lastName = $user->getLastName();
            $address = $user->getAddress();
            $phoneNumber = $user->getPhoneNumber();
            $dateOfBirth = $user->getDateOfbirth();
            $gender = $user->getGender();
            $email = $user->getEmail();
            $id = $_SESSION['id'];

            $query = "UPDATE users SET first_name=:newFirstName, last_name=:newLastName, address=:newAddress, phone_number=:newPhoneNumber, date_of_birth=:newDateOfBirth, gender=:newGender, email=:newEmail
               WHERE id=:id";

            $stmt = $this->connection->prepare($query);

            $stmt->bindParam(':newFirstName', $firstName);
            $stmt->bindParam(':newLastName', $lastName);
            $stmt->bindParam(':newAddress', $address);
            $stmt->bindParam(':newPhoneNumber', $phoneNumber);
            $stmt->bindParam(':newDateOfBirth', $dateOfBirth);
            $stmt->bindParam(':newGender', $gender);
            $stmt->bindParam(':newEmail', $email);
            $stmt->bindParam(':id', $id);

            $stmt->execute();

        } catch (PDOException $e) {
            echo $e;
        }
    }

    function deleteUser(int $userId)
    {
        try {
            $stmt = $this->connection->prepare("DELETE FROM users WHERE id=:id");

            $stmt->bindParam(':id', $userId);

            $stmt->execute();

        } catch (PDOException $e) {
            echo $e;
        }
    }

    function promoteUserToAdmin(int $userId)
    {
        try {
            $query = "UPDATE users SET user_type = 1 WHERE id=:id";

            $stmt = $this->connection->prepare($query);

            $stmt->bindParam(':id', $userId);

            $stmt->execute();

        } catch (PDOException $e) {
            echo $e;
        }
    }
}