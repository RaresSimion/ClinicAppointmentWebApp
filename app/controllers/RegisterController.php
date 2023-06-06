<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/../services/UserService.php';
require __DIR__ . '/../models/UserType.php';

class RegisterController
{
    public function register()
    {
        if (isset($_POST['register'])) {
            $userService = new UserService();

            $error = "";
            $firstName = htmlspecialchars($_POST['firstName']);
            $lastName = htmlspecialchars($_POST['lastName']);
            $address = htmlspecialchars($_POST['address']);
            $phoneNumber = htmlspecialchars($_POST['phoneNumber']);
            $dateOfBirth = htmlspecialchars($_POST['dateOfBirth']);
            $gender = htmlspecialchars($_POST['gender']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $confirmPassword = htmlspecialchars($_POST['confirmPassword']);
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $userType = UserType::Regular->value;

            $checkUser = $userService->getUserByEmail($email);
            if ($checkUser == null) {
                if ($password == $confirmPassword) {
                    $user = new User();
                    $user->setFirstName($firstName);
                    $user->setLastName($lastName);
                    $user->setAddress($address);
                    $user->setPhoneNumber($phoneNumber);
                    $user->setDateOfbirth($dateOfBirth);
                    $user->setGender($gender);
                    $user->setEmail($email);
                    $user->setPassword($hashedPassword);
                    $user->setUserType($userType);

                    $userService->insertUser($user);

                    $user = $userService->getUserByEmail($email);
                    $_SESSION['success'] = true;
                    $_SESSION['id'] = $user->getId();
                    $_SESSION['firstName'] = $user->getFirstName();
                    $_SESSION['lastName'] = $user->getLastName();
                    $_SESSION['address'] = $user->getAddress();
                    $_SESSION['phoneNumber'] = $user->getPhoneNumber();
                    $_SESSION['dateOfBirth'] = $user->getDateOfBirth();
                    $_SESSION['gender'] = $user->getGender();
                    $_SESSION['email'] = $user->getEmail();
                    $_SESSION['userType'] = $user->getUserType();
                    header('location: /home');
                } else {
                    $error = "The 2 passwords do not match.";
                }
            } else {
                $error = "The email address is already in use.";
            }
        }
        require __DIR__ . '/../views/register/index.php';
    }
}