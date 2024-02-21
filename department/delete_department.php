<?php
include "../utils.php";
$conn = connect_to_database();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    $id = $_GET['id'];
    $sql = "DELETE FROM employees_in_departments WHERE department_id='$id'";
    if ($conn->query($sql) === TRUE) {
        $sql1 = "DELETE FROM departments WHERE department_id='$id'";
        if ($conn->query($sql1) === TRUE) {
        header("Location: ../department");}
    }
$conn->close();
