<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = 'company-hr';
/////   CREATE DATABASE     /////
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}
      
$sql = "CREATE DATABASE company-hr";
if ($conn->query($sql) === TRUE) {
    echo "Database has been created successfully <br>";
} else {
    echo "Error creating database: " . $conn->error;
}
$conn->close();
    /////   CREATE TABLE USERS IN DB     /////g
    /////   CREATE TABLE PRODUCTS IN DB     /////
         $conn = new mysqli($servername, $username, $password, $dbname);
         if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
         }
  
         $sql = "CREATE TABLE projects (
             project_id INT(6) AUTO_INCREMENT PRIMARY KEY,
             project_title VARCHAR(15) NOT NULL,
             project_status VARCHAR(100) NOT NULL,
             project_start DATE,
             project_end DATE
         )";
  
         if ($conn->query($sql) === TRUE) {
             echo "Create table successfully!<br>";
         }
$conn->close();
 $conn = new mysqli($servername, $username, $password, $dbname);
 if ($conn->connect_error){
       die("Connection failed: " . $conn->connect_error);
 }
 $sql = "INSERT INTO projects (project_title,project_status,project_start,project_end) VALUES ('hot americano','disabled','2022-11-29','2022-11-29'),('iced americano','disabled','2022-11-29','2022-11-29')";  

 if (($conn->query($sql) === TRUE)) {
       echo "Data has been inserted successfully!";
 }else{
       echo "Error: " . $sql . "<br>" . $conn->error;
 }
$conn->close();
