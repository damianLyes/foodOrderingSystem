<?php
$con = new mysqli('localhost','root','','lucha_restaurant');
if($con->connect_errno) {
    die("Error: " . $con->connect_error);
}