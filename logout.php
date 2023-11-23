<?php

$conn = mysqli_connect("localhost", "root", "", "planto");
session_start();
session_unset();
session_destroy();
header("Location://localhost/nursery2.0/index.php"); 
?>