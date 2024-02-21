<?php
include "../utils.php";
$conn = connect_to_database();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    /////   CONNNECT AND RETRIEVE DATA      /////
    if (isset($_POST['submit'])) {
        $id = $_GET['id'];
        $title = $_POST['protitle'];
        $startdate = $_POST['startdate'];
        $enddate = $_POST['enddate'];
        $details = $_POST['details'];
        $assign = $_POST['proid'];
        $id1 = $_POST['proid1'];
        $status = $_POST['prostatus'];
        $sql = "UPDATE tasks SET project_id= '$id1',task_title='$title',assign_user='" . implode(', ',$assign) . "',task_status='$status',task_start='$startdate',task_end='$enddate',task_details='$details' WHERE task_id='$id'";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../tasks");
        }
    }
    
}
$conn->close();
