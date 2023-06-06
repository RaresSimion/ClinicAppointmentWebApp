<?php

require_once __DIR__ . '/../services/SectionService.php';
require_once __DIR__ . '/../services/DoctorService.php';

class ManagementController
{
    public function doctors()
    {
        require __DIR__ . '/../views/management/doctors.php';
    }

    public function editDoctor()
    {
        $doctorService = new DoctorService();

        if (isset($_POST['editDoctor'])) {
            $newName = htmlspecialchars($_POST['name']);
            $newSection = htmlspecialchars($_POST['section']);
            $newEmail = htmlspecialchars($_POST['email']);
            $newPhoneNumber = htmlspecialchars($_POST['phoneNumber']);
            $newDateOfBirth = htmlspecialchars($_POST['dateOfBirth']);

            $doctor = new Doctor();
            $doctor->setName($newName);
            $doctor->setSection($newSection);
            $doctor->setEmail($newEmail);
            $doctor->setPhoneNumber($newPhoneNumber);
            $doctor->setDateOfBirth($newDateOfBirth);

            $doctorService->updateDoctor($doctor);
            header('location: /management/doctors');
        }

        if (isset($_POST['doctorId'])) {
            $doctorId = $_POST['doctorId'];
            $_SESSION['doctorId'] = $doctorId;
            $doctor = $doctorService->getDoctorById($doctorId);
            $doctorName = $doctor->getName();
            $doctorEmail = $doctor->getEmail();
            $doctorSection = $doctor->getSection();
            $doctorPhoneNumber = $doctor->getPhoneNumber();
            $doctorDateOfBirth = $doctor->getDateOfBirth();
        }

        require __DIR__ . '/../views/management/editDoctor.php';
    }

    public function addDoctor()
    {
        $doctorService = new DoctorService();
        if (isset($_POST['addDoctor'])) {
            $name = htmlspecialchars($_POST['name']);
            $section = htmlspecialchars($_POST['section']);
            $email = htmlspecialchars($_POST['email']);
            $phoneNumber = htmlspecialchars($_POST['phoneNumber']);
            $dateOfBirth = htmlspecialchars($_POST['dateOfBirth']);

            $doctor = new Doctor();
            $doctor->setName($name);
            $doctor->setSection($section);
            $doctor->setEmail($email);
            $doctor->setPhoneNumber($phoneNumber);
            $doctor->setDateOfBirth($dateOfBirth);

            $doctorService->inserDoctor($doctor);
            header('location: /management/doctors');
        }
        require __DIR__ . '/../views/management/addDoctor.php';
    }

    public function users()
    {
        require __DIR__ . '/../views/management/users.php';
    }

    public function sections()
    {
        require __DIR__ . '/../views/management/sections.php';
    }

    public function editSection()
    {
        if (isset($_POST['editSection'])) {
            $sectionService = new SectionService();
            $newName = htmlspecialchars($_POST['section']);
            $sectionService->updateSection($newName);
            header('location: /management/sections');
        }

        if (isset($_POST['sectionId'])) {
            $sectionId = $_POST['sectionId'];
            $_SESSION['sectionId'] = $sectionId;
            $sectionName = $_POST['sectionName'];
        }
        require __DIR__ . '/../views/management/editSection.php';
    }

}