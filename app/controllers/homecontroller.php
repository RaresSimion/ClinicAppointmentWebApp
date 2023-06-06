<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../services/UserService.php';

class HomeController
{

    public function index()
    {
        require __DIR__ . '/../views/home/index.php';
    }

    public function profile()
    {
        require __DIR__ . '/../views/home/profile.php';
    }

    public function editProfile()
    {
        $userService = new UserService();
        if (isset($_POST['edit'])) {
            $newFirstName = htmlspecialchars($_POST['firstName']);
            $newLastName = htmlspecialchars($_POST['lastName']);
            $newAddress = htmlspecialchars($_POST['address']);
            $newPhoneNumber = htmlspecialchars($_POST['phoneNumber']);
            $newDateOfBirth = htmlspecialchars($_POST['dateOfBirth']);
            $newGender = htmlspecialchars($_POST['gender']);
            $newEmail = htmlspecialchars($_POST['email']);

            $user = new User();
            $user->setFirstName($newFirstName);
            $user->setLastName($newLastName);
            $user->setAddress($newAddress);
            $user->setPhoneNumber($newPhoneNumber);
            $user->setDateOfbirth($newDateOfBirth);
            $user->setGender($newGender);
            $user->setEmail($newEmail);

            $userService->updateUser($user);

            $_SESSION['firstName'] = $user->getFirstName();
            $_SESSION['lastName'] = $user->getLastName();
            $_SESSION['address'] = $user->getAddress();
            $_SESSION['phoneNumber'] = $user->getPhoneNumber();
            $_SESSION['dateOfBirth'] = $user->getDateOfBirth();
            $_SESSION['gender'] = $user->getGender();
            $_SESSION['email'] = $user->getEmail();
            header('location: /home/profile');
        } else if (isset($_POST['delete'])) {
            $userId = $_SESSION['id'];
            $userService->deleteUser($userId);
            header('location: /logout');
        }
        require __DIR__ . '/../views/home/editProfile.php';
    }

    public function appointments()
    {
        require __DIR__ . '/../views/home/appointments.php';
    }

}