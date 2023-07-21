<?php
require_once "../../../environment.php";

if(isset($_SESSION["user"])){
    header("location: " . SITE_URL . "/dashboard/" . $_SESSION["user"]["role"] . "/account.php");
} else {
    header("location: " . SITE_URL . "/auth/login.php");
}
