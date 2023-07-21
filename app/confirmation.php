<?php require_once "../environment.php"?>
<?php include_once "./layout/header.php" ?>
<section class="section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-4">
                <span class="icon icon-xl icon-success"><i class="ti ti-check-box"></i></span>
                <h1 class="mb-2">Thank you for your order!</h1>
                <h4 class="text-muted mb-5">You will receive it within 20 - 35 minutes.</h4>
                <a href="dashboard/user/my-orders.php" class="btn btn-outline-secondary">
                    <span>View my orders</span>
                </a>
                <a href="menu.php" class="btn btn-outline-secondary"><span>Go to menu</span></a>
            </div>
        </div>
    </div>
</section>
<?php include_once "./layout/footer.php" ?>