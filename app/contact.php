<?php require_once "../environment.php"?>
<?php require_once "../db/connect.php"?>
<?php include_once "./layout/header.php" ?>
<?php $page = "Contact Us"; ?>
<?php include_once "./layout/sub-header.php" ?>
<section class="section">
    <div class="container">
        <div class="row align-items-center flex-md-row-reverse">
            <div class="col-lg-4 offset-lg-2 col-md-6 mb-5 mb-md-0">
                <img src="<?= ASSETS_URL . "/img/logo-horizontal-dark.svg" ?>" alt="" class="mb-5" width="130">
                <h4 class="mb-0">Soup Restaurant</h4>
                <span class="text-muted">Green Street 22, New York</span>
                <hr class="hr-md">
                <div class="row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <h6 class="mb-1 text-muted">Phone:</h6>
                        +48 21200 2122 221
                    </div>
                    <div class="col-sm-6">
                        <h6 class="mb-1 text-muted">E-mail:</h6>
                        <a href="#">hello@example.com</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1 col-md-6">
                <div class="google-map h-500 shadow" data-lat="52.229675" data-lon="21.012230"></div>
            </div>
        </div>
    </div>
</section>
<?php include_once "./layout/footer.php" ?>