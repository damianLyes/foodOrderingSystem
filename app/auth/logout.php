<?php
require_once "../../environment.php";

unset($_SESSION["user"]);
unset($_SESSION["cart_items"]);

header("location: " . SITE_URL . "/auth/login.php");
