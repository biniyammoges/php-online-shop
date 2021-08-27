<?php
// database connection
?>

<?php

$con = new mysqli('localhost', 'bini', 'binix123', 'reg');

if (!$con) {
    die("Database Connection Failed");
}
?>