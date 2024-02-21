<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: ../login/login.php");
}

require '../partials.php';
?>

<body>
    <?php
    include '../utils.php';
    include "../header.php";
    include "dashboard.php";
    ?>

</body>

</html>