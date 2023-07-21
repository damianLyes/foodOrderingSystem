<?php
    $totalCartItems = 0;
    $totalPrice = 0;
    if (isset($_SESSION["cart_items"])) {
        $totalCartItems = count($_SESSION["cart_items"]);
        foreach ($_SESSION["cart_items"] as $item) {
            $totalPrice += $item["price"] * $item["quantity"];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Lucha Restaurant </title>
    <link rel="shortcut icon" href="<?= ASSETS_URL . "/img/favicon.png"?>">
    <link rel="apple-touch-icon" href="<?= ASSETS_URL . "/img/favicon_60x60.png"?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= ASSETS_URL . "/img/favicon_76x76.png"?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= ASSETS_URL . "/img/favicon_120x120.png"?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= ASSETS_URL . "/img/favicon_152x152.png"?>">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&amp;family=Raleway:wght@100;200;400;500&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= ASSETS_URL . "/css/core.css" ?>">
    <link id="theme" rel="stylesheet" href="<?= ASSETS_URL . "/css/theme-beige.css" ?>">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
</head>
<body>
<div id="body-wrapper" class="animsition">
    <header id="header" class="light">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="module module-logo dark">
                        <a href="<?= SITE_URL . "/index.php" ?>">
                            <img src="<?= ASSETS_URL . "/img/logo-light.svg" ?>" alt="" width="88">
                        </a>
                    </div>
                </div>
                <div class="col-md-7">
                    <nav class="module module-navigation left mr-4">
                        <ul id="nav-main" class="nav nav-main">
                            <li><a href="<?= SITE_URL . "/index.php" ?>">Home</a></li>
                            <li><a href="<?= SITE_URL . "/about.php" ?>">About </a></li>
                            <li><a href="<?= SITE_URL . "/menu.php" ?>">Menu</a></li>
                            <li><a href="<?= SITE_URL . "/contact.php" ?>">Contact Us</a></li>
                        </ul>
                    </nav>
                    <div class="module left">
                        <?php if (isset($_SESSION["user"])): ?>
                            <a href="<?= SITE_URL . "/dashboard/" . $_SESSION["user"]["role"] ?>"
                               class="btn btn-outline-secondary">
                                <span><?= $_SESSION["user"]["name"] ?></span>
                            </a>
                        <?php else: ?>
                            <a href="<?= SITE_URL . "/auth/login.php" ?>" class="btn btn-outline-secondary">
                                <span>Login</span>
                            </a>
                            <a href="<?= SITE_URL . "/auth/register.php" ?>" class="btn btn-outline-secondary">
                                <span>Register</span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-2">
                    <a href="#" class="module module-cart right" data-toggle="panel-cart">
                        <span class="cart-icon">
                            <i class="ti ti-shopping-cart"></i>
                            <span class="notification"><?= $totalCartItems ?></span>
                        </span>
                        <span class="cart-value">$<span class="value"><?= $totalPrice ?></span></span>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <header id="header-mobile" class="light">
        <div class="module module-nav-toggle">
            <a href="#" id="nav-toggle" data-toggle="panel-mobile">
                <span></span><span></span><span></span><span></span>
            </a>
        </div>
        <div class="module module-logo">
            <a href="<?= SITE_URL . "/index.php" ?>">
                <img src="<?= ASSETS_URL . "/img/logo-horizontal-dark.svg" ?>" alt="">
            </a>
        </div>
        <a href="#" class="module module-cart" data-toggle="panel-cart">
            <i class="ti ti-shopping-cart"></i>
            <span class="notification">0</span>
        </a>
    </header>
    <div id="content">