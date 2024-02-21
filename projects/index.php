<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: ../login/login.php");
}
?>

<?php
include "../header.php";
?>
<div id="page-content-wrapper">
    <div class="container-fluid">
        <?php
        include('./projects.php');
        ?>
    </div>
</div>