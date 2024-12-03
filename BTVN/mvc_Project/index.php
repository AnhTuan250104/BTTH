<?php
// index.php
require_once 'controllers/EmployeeController.php';

$controller = new EmployeeController();

// Lấy action từ URL, mặc định là 'list'
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

// Tùy vào action, gọi phương thức của controller
switch ($action) {
    case 'list':
        $controller->listEmployees();
        break;
    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->createEmployee($_POST);
        } else {
            $controller->createEmployeeForm();
        }
        break;
    case 'edit':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->editEmployee($_GET['id'], $_POST);
        } else {
            $controller->editEmployeeForm($_GET['id']);
        }
        break;
    case 'delete':
        $controller->deleteEmployee($_GET['id']);
        break;
    default:
        $controller->listEmployees();
        break;
}
