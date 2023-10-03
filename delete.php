<?php
require("config.php");

$id = $_GET['id'];

$deletequery = "delete from user where id=$id";

$query = mysqli_query($con, $deletequery);

header('location:index.php');

?>