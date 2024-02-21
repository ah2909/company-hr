<?php
include "../utils.php";
$conn = connect_to_database();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    /////   CONNNECT AND RETRIEVE DATA      /////
    if (isset($_POST['submit'])) {
        $title = $_POST['protitle'];
        $startdate = $_POST['startdate'];
        $enddate = $_POST['enddate'];
        $details = $_POST['summery'];
        $assign = $_POST['proid'];
        $id = $_POST['proid1'];
        $status = $_POST['prostatus'];
        $sql = "INSERT INTO tasks (project_id,task_title,assign_user,task_status,task_start,task_end,task_details) VALUES ('$id','$title','" . implode(', ',$assign) . "','$status','$startdate','$enddate','$details')";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../tasks");
        }
    }
    
}
$conn->close();
