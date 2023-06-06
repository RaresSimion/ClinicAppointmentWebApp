<?php

class SwitchRouter
{
    public function route($uri)
    {

        $uri = $this->stripParameters($uri);

        switch ($uri) {
            case '':
            case 'home':
            case 'home/index':
                require __DIR__ . '/../controllers/homecontroller.php';
                $controller = new HomeController();
                $controller->index();
                break;

            case 'home/profile':
                require __DIR__ . '/../controllers/homecontroller.php';
                $controller = new HomeController();
                $controller->profile();
                break;

            case 'home/editProfile':
                require __DIR__ . '/../controllers/homecontroller.php';
                $controller = new HomeController();
                $controller->editProfile();
                break;

            case 'home/appointments':
                require __DIR__ . '/../controllers/homecontroller.php';
                $controller = new HomeController();
                $controller->appointments();
                break;

            case 'home/editAppointment':
                require __DIR__ . '/../controllers/AppointmentController.php';
                $controller = new AppointmentController();
                $controller->editAppointment();
                break;

            case 'doctors':
                require __DIR__ . '/../controllers/DoctorController.php';
                $controller = new DoctorController();
                $controller->index();
                break;

            case 'login':
                require __DIR__ . '/../controllers/LoginController.php';
                $controller = new LoginController();
                $controller->login();
                break;

            case 'register':
                require __DIR__ . '/../controllers/RegisterController.php';
                $controller = new RegisterController();
                $controller->register();
                break;

            case 'logout':
                require __DIR__ . '/../controllers/LogoutController.php';
                $controller = new LogoutController();
                $controller->logout();
                break;

            case 'appointment':
                require __DIR__ . '/../controllers/AppointmentController.php';
                $controller = new AppointmentController();
                $controller->index();
                break;

            case 'api/doctors':
                require __DIR__ . '/../api/controllers/DoctorApiController.php';
                $controller = new DoctorApiController();
                $controller->index();
                break;

            case 'api/appointments':
                require __DIR__ . '/../api/controllers/AppointmentApiController.php';
                $controller = new AppointmentApiController();
                $controller->index();
                break;

            case 'api/appointments/delete':
                require __DIR__ . '/../api/controllers/AppointmentApiController.php';
                $controller = new AppointmentApiController();
                $controller->delete();
                break;

            case 'api/users':
                require __DIR__ . '/../api/controllers/UserApiController.php';
                $controller = new UserApiController();
                $controller->index();
                break;

            case 'api/users/update':
                require __DIR__ . '/../api/controllers/UserApiController.php';
                $controller = new UserApiController();
                $controller->update();
                break;

            case 'api/sections':
                require __DIR__ . '/../api/controllers/SectionApiController.php';
                $controller = new SectionApiController();
                $controller->index();
                break;

            case 'api/sections/delete':
                require __DIR__ . '/../api/controllers/SectionApiController.php';
                $controller = new SectionApiController();
                $controller->delete();
                break;

            case 'api/sections/display':
                require __DIR__ . '/../api/controllers/SectionApiController.php';
                $controller = new SectionApiController();
                $controller->display();
                break;

            case 'management/doctors':
                require __DIR__ . '/../controllers/ManagementController.php';
                $controller = new ManagementController();
                $controller->doctors();
                break;

            case 'management/editDoctor':
                require __DIR__ . '/../controllers/ManagementController.php';
                $controller = new ManagementController();
                $controller->editDoctor();
                break;

            case 'management/addDoctor':
                require __DIR__ . '/../controllers/ManagementController.php';
                $controller = new ManagementController();
                $controller->addDoctor();
                break;

            case 'management/users':
                require __DIR__ . '/../controllers/ManagementController.php';
                $controller = new ManagementController();
                $controller->users();
                break;

            case 'management/sections':
                require __DIR__ . '/../controllers/ManagementController.php';
                $controller = new ManagementController();
                $controller->sections();
                break;

            case 'management/editSection':
                require __DIR__ . '/../controllers/ManagementController.php';
                $controller = new ManagementController();
                $controller->editSection();
                break;

            default:
                http_response_code(404);
                break;
        }

    }

    private function stripParameters($uri)
    {
        if (str_contains($uri, '?')) {
            $uri = substr($uri, 0, strpos($uri, '?'));
        }
        return $uri;
    }
}