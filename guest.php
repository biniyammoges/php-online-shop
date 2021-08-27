<?php
// authentication
?>

<?php
session_start();
if (isset($_SESSION["name"])) {
    header("Location: authenticated.php");
    exit();
}
?>