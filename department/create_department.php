<?php
include "../utils.php";
$conn = connect_to_database();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    /////   CONNNECT AND RETRIEVE DATA      /////
    if (isset($_POST['submit'])) {
        $title = $_POST['detitle'];
        $assign = $_POST['proid'];
        $id = $_POST['proid1'];
        $sql = "INSERT INTO departments (department_name) VALUES ('$title')";
        $sql1 = "SELECT * FROM departments WHERE department_name='$title'";
        $sql2 = "SELECT * FROM employees WHERE employee_id='" . implode(', ',$assign) . "'";
        $sql3 = "SELECT * FROM employees WHERE employee_id='$id'";
        $result = $conn->query($sql2); 
        $result1 = $conn->query($sql3); 
        $result2 = $conn->query($sql1); 
        if($assign != Null){
                foreach ($result2 as $b) {
                $ids = $b['department_id'];
                if ($conn->query($sql) === TRUE) {
                    $sql4 = "INSERT INTO employees_in_departments (employee_id,department_id,is_manager) VALUES ('" . implode(', ',$assign) . "','$ids','1')";
                    if ($conn->query($sql4) === TRUE) {
                    header("Location: ../department");}
                }
            
            }
        }
        elseif($id != Null){
                foreach ($result2 as $b) {
                $ids = $b['department_id'];
                if ($conn->query($sql) === TRUE) {
                $sql4 = "INSERT INTO employees_in_departments (employee_id,department_id,is_manager) VALUES ('$id','$ids','0')";
                if ($conn->query($sql4) === TRUE) {
                    header("Location: ../department");}
                }
            
            }
    }
        
    }
    
}
$conn->close();
