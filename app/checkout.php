<?php require_once "../environment.php"?>
<?php require_once "../db/connect.php"?>
<?php
    if (empty($_SESSION["cart_items"])) {
        header("location: ./menu.php");
        exit();
    }

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $address = $con->escape_string($_POST['address']);

        $query = "INSERT INTO orders (dishID, userID, address, quantity) VALUES ";

        $values = [];
        foreach ($_SESSION["cart_items"] as $item) {
            $values[] .= "('" . $item["product_id"] . "','" . $_SESSION["user"]["id"] . "','" . $address . "','" . $item["quantity"] . "')";
        }
        $query .= implode(", ", $values);
        $con->query($query);

        header("location: ./confirmation.php");
        exit();
    }

    $total = 0;
?>
<?php include_once "./layout/header.php" ?>
<?php include_once "./layout/sub-header.php" ?>
<section class="section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-5">
                <div class="bg-dark dark p-4"><h5 class="mb-0">Your order(s)</h5></div>
                <div class="panel-cart-content">
                    <table class="cart-table">
                        <tr>
                            <th>Dish</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                        <?php foreach ($_SESSION["cart_items"] as $item): ?>
                            <?php $total += $item["price"] * $item["quantity"]; ?>
                            <tr>
                                <td class="title">
                                <span class="name">
                                    <a href="javascript:void(0)"><?= $item["name"]; ?></a>
                                </span>
                                    <span class="caption text-muted"></span>
                                </td>
                                <td class="price"><?= $item["quantity"]; ?></td>
                                <td class="price">$<?= $item["price"] * $item["quantity"]; ?></td>
                                <td class="actions">
                                    <a href="<?= SITE_URL . "/layout/partials/cart/del-from-cart.php" ?>?product_id=<?= $item['product_id']; ?>">
                                        <i class="ti ti-close"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                    <div class="cart-summary">
                        <div class="row">
                            <div class="col-7 text-right text-muted">Order total:</div>
                            <div class="col-5"><strong>$<?= $total; ?></strong></div>
                        </div>
                        <div class="row">
                            <div class="col-7 text-right text-muted">Delivery:</div>
                            <div class="col-5"><strong>$0.00</strong></div>
                        </div>
                        <hr class="hr-sm">
                        <div class="row text-lg">
                            <div class="col-7 text-right text-muted">Total:</div>
                            <div class="col-5"><strong>$<?= $total; ?></strong></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-7 order-lg-first">
                <div class="bg-white p-4 p-md-5 mb-4">
                    <h4 class="border-bottom pb-4"><i class="ti ti-package mr-3 text-primary"></i>Delivery information</h4>
                    <form method="post" action="<?= $_SERVER["PHP_SELF"] ?>" class="form-group">
                        <div class="row mb-5">
                            <div class="form-group col-sm-12">
                                <label for="address">Delivery Address: <span class="text-danger">*</span></label>
                                <input type="text" id="address" name="address" class="form-control" required>
                            </div>
                        </div>
                        <h4 class="border-bottom pb-4"><i class="ti ti-wallet mr-3 text-primary"></i>Payment</h4>
                        <div class="row text-lg">
                            <div class="col-md-5 col-sm-6 form-group">
                                <label class="custom-control custom-radio">
                                    <input type="radio" checked name="payment_type" class="custom-control-input" required>
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Cash on Delivery</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <input type="submit" value="Check out now!" class="btn btn-primary btn-lg">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php include_once "./layout/footer.php" ?>