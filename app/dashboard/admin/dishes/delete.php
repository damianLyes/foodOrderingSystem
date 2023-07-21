<?php
require_once "../../../../environment.php";
require_once "../../../../db/connect.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $query = "DELETE FROM dishes WHERE id = '$id'";
    $con->query($query);
}
header("location: ./list.php");
exit();