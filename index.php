<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: ./login/login.php");
}
?>
<?php
header("Location: ./dashboard")
?>