<?php require_once "../environment.php"?>
<?php //var_dump($_SESSION["cart_items"]); exit(); ?>
<?php require_once "../db/connect.php"?>
<?php
    $query = "SELECT * FROM categories";
    $categories = $con->query($query);
    $query = "SELECT *, d.id as d_id, d.name as dish, d.image as d_image FROM dishes d JOIN categories c on c.name = d.category";
    $dishes = $con->query($query);
    $menu = [];
    $items = [];
    while ($dish = $dishes->fetch_assoc()) {
        $items[] = $dish;
    }
    while ($category = $categories->fetch_assoc()) {
        $option = [];
        foreach ($items as $dish) {
            if ($dish["category"] === $category["name"]) {
                $option[] = $dish;
            }
        }
        $menu[$category["name"]] = [
            "details" => $category,
            "dishes" => $option,
        ];
    }
?>
<?php include_once "./layout/header.php" ?>
<?php $page = "Menu"; ?>
<?php include_once "./layout/sub-header.php" ?>
<div class="page-content">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-10 offset-md-1" role="tablist">
                <?php foreach ($menu as $key => $value): ?>
                    <div id="<?= $value["details"]["id"] ?>-category" class="menu-category">
                        <div class="menu-category-title collapse-toggle" role="tab"
                             data-target="#<?= $value["details"]["id"] . "-content" ?>"
                             data-toggle="collapse" aria-expanded="true">
                            <div class="bg-image">
                                <img src="data:image/jpeg;base64,<?= base64_encode($value["details"]["image"]) ?>"
                                     alt="<?= $value["details"]["name"] ?>">
                            </div>
                            <h2 class="title"><?= $value["details"]["name"] ?></h2>
                        </div>
                        <div id="<?= $value["details"]["id"] . "-content" ?>"
                             class="menu-category-content collapse show">
                            <div class="p-4">
                                <div class="row gutters-sm">
                                    <?php if (!empty($value["dishes"])): ?>
                                        <?php foreach($value["dishes"] as $dish): ?>
                                            <div class="col-lg-4 col-6">
                                                <div class="menu-item menu-grid-item">
                                                    <img src="data:image/jpeg;base64,<?= base64_encode($value["details"]["image"]) ?>"
                                                         alt="<?= $dish["dish"] ?>" class="mb-4">
                                                    <h6 class="mb-0"><?= $dish["dish"] ?></h6>
                                                    <span class="text-muted text-sm"><?= $dish["description"] ?></span>
                                                    <div class="row align-items-center mt-4">
                                                        <div class="col-sm-6">
                                                            <span class="text-md mr-4">
                                                                <span class="text-muted">from</span> $<span data-product-base-price><?= $dish["price"] ?></span>
                                                            </span>
                                                        </div>
                                                        <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
                                                            <a href="./layout/partials/cart/add-to-cart.php?product_id=<?= $dish["d_id"] ?>&price=<?= $dish["price"] ?>&name=<?= $dish["dish"] ?>">
                                                                <button class="btn btn-outline-secondary btn-sm" data-action="open-cart-modal" data-id="1">
                                                                    <span>Add to cart</span>
                                                                </button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php include_once "./layout/footer.php" ?>