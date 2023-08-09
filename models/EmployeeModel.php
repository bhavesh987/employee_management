<?php
class EmployeeModel {
    private $db;

    public function __construct() {
        $this->db = new mysqli('localhost', 'root', '', 'employees');
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    public function getEmployees() {
        $query = "SELECT * FROM employees";
        $result = $this->db->query($query);
        $employees = [];

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $employees[] = $row;
            }
        }

        return $employees;
    }

    public function addEmployee($fname, $lname, $email, $password, $gender) {
        $fname = $this->db->real_escape_string($fname);
        $lname = $this->db->real_escape_string($lname);
        $email = $this->db->real_escape_string($email);
        $password = $this->db->real_escape_string($password);
        $gender = $this->db->real_escape_string($gender);
        $query = "INSERT INTO employees (fname, lname, email, password, gender) VALUES ('$fname', '$lname','$email', '$password', '$gender')";
        return $this->db->query($query);
    }

    public function getEmployeeById($id) {
        $query = "SELECT * FROM employees WHERE id = $id";
        $result = $this->db->query($query);
        return $result->fetch_assoc();
    }

    public function updateEmployee($id, $fname, $lname, $email, $password, $gender) {
        $fname = $this->db->real_escape_string($fname);
        $lname = $this->db->real_escape_string($lname);
        $email = $this->db->real_escape_string($email);
        $password = $this->db->real_escape_string($password);
        $gender = $this->db->real_escape_string($gender);
        $query = "UPDATE employees SET fname='$fname', lname='$lname', email='$email', password='$password', gender='$gender' WHERE id=$id";
        return $this->db->query($query);
    }

    public function deleteEmployee($id) {
        $query = "DELETE FROM employees WHERE id=$id";
        return $this->db->query($query);
    }
}
