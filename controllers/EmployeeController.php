<?php
require_once 'models/EmployeeModel.php';

class EmployeeController {
    public function index() {
        $employeeModel = new EmployeeModel();
        $employees = $employeeModel->getEmployees();
        require 'views/employee_list.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $gender = $_POST['gender'];

            $employeeModel = new EmployeeModel();
            $employeeModel->addEmployee($fname, $lname, $email, $password, $gender);

            header("Location: index.php");
            exit();
        }

        require 'views/add_employee.php';
    }

    public function edit() {
        $employeeId = $_GET['id'];
        $employeeModel = new EmployeeModel();
        $employee = $employeeModel->getEmployeeById($employeeId);

        if (!$employee) {
            header("HTTP/1.0 404 Not Found");
            echo 'Employee not found.';
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $gender = $_POST['gender'];

            $employeeModel->updateEmployee($employeeId, $fname, $lname, $email, $password, $gender);

            header("Location: index.php");
            exit();
        }

        require 'views/edit_employee.php';
    }

    public function delete() {
        $employeeId = $_GET['id'];
        $employeeModel = new EmployeeModel();
        $employeeModel->deleteEmployee($employeeId);

        header("Location: index.php");
        exit();
    }
}
