<?php
include "../utils.php";
$conn = connect_to_database();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    $id = $_GET['id'];
    $sql = "DELETE FROM projects WHERE project_id='$id'";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: ../projects");
    }
$conn->close();
