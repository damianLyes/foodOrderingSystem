<?php
    require_once '../../../../environment.php';

    if (!isset($_SESSION["user"])) {
        header("location: " . SITE_URL . "/auth/login.php");
        exit();
    }

    if ($_SESSION["user"]["role"] === "admin") {
        header("location: " . $_SERVER["PHP_SELF"]);
        exit();
    }

    if (!isset($_GET["product_id"]) || !isset($_GET["price"]) || !isset($_GET["name"])) {
        header("location: " . SITE_URL . "/menu.php");
        exit();
    }

    if (!isset($_SESSION["cart_items"])) {
        $_SESSION["cart_items"] = [];
    }

    $found = false;
    if (!empty($_SESSION["cart_items"])) {
        $count = -1;
        foreach ($_SESSION["cart_items"] as $item) {
            $count++;
            if ($item["product_id"] === $_GET["product_id"]) {
                $_SESSION["cart_items"][$count] = [
                    "name" => $_GET["name"],
                    "product_id" => $_GET["product_id"],
                    "price" => $_GET["price"],
                    "quantity" => $_SESSION["cart_items"][$count]["quantity"] + 1,
                ];
                $found = true;
            }
        }
    }

    if (!$found) {
        $_SESSION["cart_items"][] = [
            "name" => $_GET["name"],
            "product_id" => $_GET["product_id"],
            "price" => $_GET["price"],
            "quantity" => 1
        ];
    }

    header("location: " . SITE_URL . "/menu.php");
    exit();