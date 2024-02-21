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
        $title = $_POST['dename'];
        $assign = $_POST['proid'];
        $id1 = $_POST['proid1'];
        $sql = "UPDATE departments SET department_name = '$title' WHERE department_id = '$id'";
        $sql1 = "SELECT * FROM departments WHERE department_name='$title'";
        $result2 = $conn->query($sql1); 
        if($assign != Null){
                foreach ($result2 as $b) {
                $ids = $b['department_id'];
                if ($conn->query($sql) === TRUE) {
                    $sql4 = "UPDATE employees_in_departments SET employee_id='$assign' ,is_manager= '1' WHERE department_id = '$id' ";
                    if ($conn->query($sql4) === TRUE) {
                    header("Location: ../department");}
                }
            
            }
        }
        else{
                foreach ($result2 as $b) {
                $ids = $b['department_id'];
                if ($conn->query($sql) === TRUE) {
                    $sql4 = "UPDATE employees_in_departments SET employee_id='" . implode(', ',$id1) . "' ,is_manager= '0' WHERE department_id = '$id'";
                if ($conn->query($sql4) === TRUE) {
                    header("Location: ../department");}
                }
            
            }
    }
        
    }
    
}
$conn->close();
