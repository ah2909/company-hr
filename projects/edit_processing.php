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
        $summery = $_POST['summery'];
        $details = $_POST['details'];
        $status = $_POST['prostatus'];
        $sql = "UPDATE projects SET project_title='$title',project_status='$status',project_start='$startdate',project_end='$enddate',project_details='$details',project_summary='$summery' WHERE project_id='$id'";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../tasks");
        }
    }
    
}
$conn->close();
