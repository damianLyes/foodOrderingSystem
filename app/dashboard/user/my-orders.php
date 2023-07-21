<?php require_once "../../../environment.php"; ?>
<?php require_once "../../../db/connect.php"; ?>
<?php
$query = "SELECT o.id as orderID, d.name as dish, u.name as user, address, quantity, price, status FROM orders o JOIN users u on u.id = o.userID JOIN dishes d on d.id = o.dishID";
$orders = $con->query($query);
?>
<?php include_once "../../layout/header.php"?>
<?php $page = "Orders" ?>
<?php include_once "../../layout/sub-header.php"?>
    <section class="section">
        <div class="container">
            <div class="row">
                <?php include_once "./layout/nav.php"?>
                <div class="col-md-8 offset-md-1">
                    <div id="faq1">
                        <div class="d-flex justify-content-between">
                            <h3><i class="ti ti-list mr-4 text-primary"></i>Orders</h3>
                        </div>
                        <hr>
                        <table id="data-table" class="display">
                            <thead>
                            <tr>
                                <th>Dish</th>
                                <th>User</th>
                                <th>Address</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php while ($order = $orders->fetch_assoc()): ?>
                                <tr>
                                    <td><?= $order["dish"] ?></td>
                                    <td><?= $order["user"] ?></td>
                                    <td><?= $order["address"] ?></td>
                                    <td><?= $order["quantity"] ?></td>
                                    <td>$<?= $order["quantity"] * $order["price"] ?></td>
                                    <td><?= $order["status"] ?></td>
                                </tr>
                            <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include_once "../../layout/footer.php"?>