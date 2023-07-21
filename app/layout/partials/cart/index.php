<?php $total = 0; ?>
<div id="panel-cart">
    <div class="panel-cart-container">
        <div class="panel-cart-title">
            <h5 class="title">Your Cart</h5>
            <button class="close" data-toggle="panel-cart"><i class="ti ti-close"></i></button>
        </div>
        <div class="panel-cart-content">
            <?php if(isset($_SESSION["cart_items"])): ?>
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
                        <div class="col-5">
                            <strong>$<?= $total; ?></strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7 text-right text-muted">Delivery:</div>
                        <div class="col-5"><strong>$0.00</strong></div>
                    </div>
                    <hr class="hr-sm">
                    <div class="row text-lg">
                        <div class="col-7 text-right text-muted">Total:</div>
                        <div class="col-5">
                            <strong>$<?= $total; ?></strong>
                        </div>
                    </div>
                </div>
            <?php else: ?>
            <div class="cart-empty">
                <i class="ti ti-shopping-cart"></i>
                <p>Your cart is empty...</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <a href="<?= SITE_URL . "/checkout.php" ?>" class="panel-cart-action btn btn-secondary btn-block btn-lg">
        <span>Go to checkout</span>
    </a>
</div>