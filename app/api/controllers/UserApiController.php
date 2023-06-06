<?php
require __DIR__ . '/../../services/UserService.php';

class UserApiController
{
    private $userService;

    function __construct()
    {
        $this->userService = new UserService();
    }

    public function index()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *');
        header('Access-Control-Allow-Methods: *');

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $doctors = $this->userService->getAll();
            header('Content-Type: application/json');
            echo json_encode($doctors);

        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $body = file_get_contents('php://input');
            $obj = json_decode($body);
            $userId = $obj->id;

            $this->userService->deleteUser($userId);
            if ($userId == $_SESSION['id'])
                header('Location: /logout');
            header('Content-Type: application/json');
        }
    }

    public function update()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *');
        header('Access-Control-Allow-Methods: *');

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $body = file_get_contents('php://input');
            $obj = json_decode($body);
            $userId = $obj->id;

            $this->userService->promoteUserToAdmin($userId);
            header('Content-Type: application/json');
        }
    }
}

?>