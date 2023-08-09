<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function authenticate() {
    header('WWW-Authenticate: Basic realm="Employee Management"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Authentication required';
    exit;
}

if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
    $_SERVER['PHP_AUTH_USER'] !== 'admin' || $_SERVER['PHP_AUTH_PW'] !== 'admin') {
    authenticate();
}

$conn = new mysqli('localhost', 'root', '', 'employees');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$action = isset($_GET['action']) ? $_GET['action'] : '';

require_once 'controllers/EmployeeController.php';
$employeeController = new EmployeeController($conn);

switch ($action) {
    case 'add':
        $employeeController->add();
        break;
    case 'edit':
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $employeeController->edit($id);
        break;
    case 'delete':
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $employeeController->delete($id);
        break;
    default:
        $employeeController->index();
        break;
}

$conn->close();
?>
