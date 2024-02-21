<?php
include "../utils.php";
$conn = connect_to_database();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
if ($conn->query("DELETE FROM employees_in_departments WHERE employee_id=$id")
    && $conn->query("DELETE FROM employees WHERE employee_id=$id")) {
    header("Location: ../employees");
}
else {
    echo $sql."<br/>".$conn->error;
}

$conn->close();
