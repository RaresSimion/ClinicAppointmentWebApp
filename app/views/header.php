<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (isset($_SESSION['success'])) {
    $id = $_SESSION['id'];
    $firstName = $_SESSION['firstName'];
    $lastName = $_SESSION['lastName'];
    $address = $_SESSION['address'];
    $phoneNumber = $_SESSION['phoneNumber'];
    $dateOfBirth = $_SESSION['dateOfBirth'];
    $gender = $_SESSION['gender'];
    $email = $_SESSION['email'];
    $userType = $_SESSION['userType'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Miracle Clinic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="favicon.jpg">
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-primary mb-4 sticky-top">
    <div class="container">
        <a class="navbar-brand" href="/" style="color: white">Miracle Clinic</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link" href="/" style="color: white">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: white" href="/doctors">Our Specialists</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/appointment" style="color: white">Book an appointment!</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: white" href="/login" <?php if (isset($_SESSION['success']))
                        echo "hidden" ?>>Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: white" href="/register" <?php if (isset($_SESSION['success']))
                        echo "hidden" ?>>Register</a>
                </li>
                <li class="nav-item dropdown" <?php if (!isset($_SESSION['userType']) || $_SESSION['userType'] == 2)
                    echo "hidden" ?>>
                    <a style="color: white" class="nav-link dropdown-toggle" href="#" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Management
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/management/users">Users</a></li>
                        <li><a class="dropdown-item" href="/management/doctors">Doctors</a></li>
                        <li><a class="dropdown-item" href="/management/sections">Clinic sections</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown" <?php if (!isset($_SESSION['success']))
                    echo "hidden" ?>>
                    <a style="color: white" class="nav-link dropdown-toggle" href="#" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        My Profile
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/home/profile">My Details</a></li>
                        <li><a class="dropdown-item" href="/home/appointments">My Appointments</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a style="color: white" class="nav-link" href="/logout" <?php if (!isset($_SESSION['success']))
                        echo "hidden" ?>>Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">