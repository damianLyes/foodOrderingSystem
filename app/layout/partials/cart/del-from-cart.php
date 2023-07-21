<?php
    require_once '../../../../environment.php';

    if (isset($_GET["product_id"])) {
        $product_id = $_GET["product_id"];
        $count = -1;
        foreach ($_SESSION["cart_items"] as $item) {
            $count++;
            if ($item["product_id"] === $product_id) {
                unset($_SESSION["cart_items"][$count]);
                header("location: " . SITE_URL . "/menu.php");
                exit();
            }
        }
    }

    header("location: " . SITE_URL . "/menu.php");
    exit();

