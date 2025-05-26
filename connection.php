<?php
$connection = mysqli_connect("localhost", "root", "", "zerowaste");
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>