<?php
require_once "../../../../environment.php";
require_once "../../../../db/connect.php";

if (isset($_GET["id"]) && isset($_GET["status"])) {
    $id = $_GET["id"];
    $status = $_GET["status"];

    $query = "UPDATE orders SET status = '$status' WHERE id = '$id'";
    $con->query($query);
}
header("location: ./list.php");
exit();
