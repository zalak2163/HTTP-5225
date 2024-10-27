<?php
$connect = mysqli_connect('localhost', 'root', 'root', 'assignment1_php');

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
