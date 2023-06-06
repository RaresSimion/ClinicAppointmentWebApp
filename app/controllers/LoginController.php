<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/../services/UserService.php';

class LoginController
{
    public function login()
    {
        if (isset($_POST['login'])) {
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $error = "";
            $userService = new UserService();
            $user = $userService->getUserByEmail($email);
            if ($user != null) {
                $hashedPassword = $user->getPassword();
                if (password_verify($password, $hashedPassword)) {
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
                } else
                    $error = "Invalid credentials.";
            } else
                $error = "User does not exist.";

            //require __DIR__ . '/../views/login/index.php';
        }
        require __DIR__ . '/../views/login/index.php';
    }

}