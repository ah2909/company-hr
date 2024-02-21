<?php
session_start();
include "../utils.php";

$conn = connect_to_database();

//$requirements = ["first-name", "middle-name", "last-name", "avatar", "date-of-birth", "department", "role", "email", "phone-number", "notes"];

function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$first_name = validate($_POST["first-name"]);
$middle_name = validate($_POST["middle-name"]);
$last_name = validate($_POST["last-name"]);
// $avatar = validate($_POST["avatar"]);
$birth = validate($_POST["date-of-birth"]);
$department_id = validate($_POST["department-id"]);
$role = validate($_POST["role"]);
$email = validate($_POST["email"]);
$phone_number = validate($_POST["phone-number"]);
$notes = validate($_POST["notes"]);

// if (isset($_FILES["avatar"])) {
//     $img_file = $_FILES["avatar"];

//     // File properties
//     $file_name = $img_file["name"];
//     $file_tmp = $img_file["tmp_name"];
//     $file_size = $img_file["size"];
//     $file_error = $img_file["error"];

//     // Work out the file extension
//     $file_ext = explode(".", $file_name);
//     $file_ext = strtolower(end($file_ext));
    
//     $allowed = array("jpg", "jpeg", "png");

//     if (in_array($file_ext, $allowed)) {
//         if ($file_error === 0) {
//             if ($file_size <= 2097152) {
//                 $file_name_new = uniqid('', true).'.'.$file_ext;
//                 $imgfile_destination = "../uploads/".$file_name_new;

//                 if (!move_uploaded_file($file_tmp, $imgfile_destination)) {
//                     // header("Location: index.php?page=products&add_product&&error=File upload failed ".$imgfile_destination);
//                     exit();
//                 }
//             }
//         }
//     }
//     else {
//         header("Location: ./");
//         exit();
//     }
// }
// else {
//     header("Location: ./");
//     exit();
// }


if (isset($file_name_new)) {
    $file_name_new = "'".$file_name_new."'";
}
else {
    $file_name_new = "NULL";
}

$sql = "UPDATE employees SET
            first_name='$first_name',
            middle_name='$middle_name',
            last_name='$last_name',
            -- avatar='$avatar',
            birth='$birth',
            department_id='$department_id',
            role='$role',
            notes='$notes'
        WHERE email='$email'";

if (!mysqli_query($conn, $sql)) {
    header("Location: ./?error=");
    exit();
}
else {
    header("Location: ./");
    exit();
}
