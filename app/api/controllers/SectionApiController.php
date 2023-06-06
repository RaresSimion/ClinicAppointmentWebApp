<?php
require __DIR__ . '/../../services/SectionService.php';

class SectionApiController
{
    private $sectionService;

    function __construct()
    {
        $this->sectionService = new SectionService();
    }

    public function index()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *');
        header('Access-Control-Allow-Methods: *');

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $sections = $this->sectionService->getAll();
            header('Content-Type: application/json');
            echo json_encode($sections);

        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $body = file_get_contents('php://input');
            $obj = json_decode($body);
            $name = $obj->name;

            $this->sectionService->insertSection($name);
            header('Content-Type: application/json');
        }
    }

    public function delete()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *');
        header('Access-Control-Allow-Methods: *');

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $body = file_get_contents('php://input');
            $obj = json_decode($body);
            $id = $obj->id;

            $this->sectionService->deleteSection($id);
            header('Content-Type: application/json');
        }
    }

    public function display()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *');
        header('Access-Control-Allow-Methods: *');

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $sections = $this->sectionService->getAllNoOrder();
            header('Content-Type: application/json');
            echo json_encode($sections);

        }
    }
}

?>