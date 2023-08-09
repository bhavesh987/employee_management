<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'employees';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$searchValue = $_POST['searchValue'];

$sql = "SELECT * FROM employees 
        WHERE fname LIKE '%$searchValue%' 
        OR lname LIKE '%$searchValue%'
        OR email LIKE '%$searchValue%'";

$result = $conn->query($sql);

$searchResults = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $searchResults[] = $row;
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($searchResults);
?>
