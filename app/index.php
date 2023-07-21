<?php require_once "../environment.php"?>
<?php require_once "../db/connect.php"?>
<?php
    $query = "SELECT * FROM categories";
    $categories = $con->query($query);
?>
<?php include_once "./layout/header.php" ?>
<section class="section section-main section-main-1 bg-light">
    <div class="container dark">
        <div class="slide-container">
            <div id="section-main-1-carousel-image" class="image inner-controls">
                <div class="slide">
                    <div class="bg-image">
                        <img src="<?= ASSETS_URL . "/img/photos/slider-pasta.jpg" ?>" alt="">
                    </div>
                </div>
                <div class="slide">
                    <div class="bg-image">
                        <img src="<?= ASSETS_URL . "/img/photos/slider-burger.jpg" ?>" alt="">
                    </div>
                </div>
                <div class="slide">
                    <div class="bg-image">
                        <img src="<?= ASSETS_URL . "/img/photos/slider-dessert.jpg" ?>" alt="">
                    </div>
                </div>
            </div>
            <div class="content dark">
                <div id="section-main-1-carousel-content">
                    <div class="content-inner">
                        <h4 class="text-muted">New product!</h4>
                        <h1>Boscaiola Pasta</h1>
                        <div class="btn-group">
                            <button class="btn btn-outline-primary btn-lg" data-action="open-cart-modal" data-id="1">
                                <span>Add to cart</span>
                            </button>
                            <span class="price price-lg">from $9.98</span>
                        </div>
                    </div>
                    <div class="content-inner">
                        <h1>Get 10% off coupon</h1>
                        <h5 class="text-muted mb-5">and use it with your next order!</h5>
                        <a href="special-offers.php" class="btn btn-outline-primary btn-lg">
                            <span>Get it now!</span>
                        </a>
                    </div>
                    <div class="content-inner">
                        <h1>Delicious Desserts</h1>
                        <h5 class="text-muted mb-5">Order it online even now!</h5>
                        <a href="#" class="btn btn-outline-primary btn-lg"><span>Order now!</span></a>
                    </div>
                </div>
                <nav class="content-nav">
                    <a class="prev" href="#"><i class="ti ti-arrow-left"></i></a>
                    <a class="next" href="#"><i class="ti ti-arrow-right"></i></a>
                </nav>
            </div>
        </div>
    </div>
</section>
<section class="section section-bg-edge">
    <div class="image right col-md-6 offset-md-6">
        <div class="bg-image"><img src="<?= ASSETS_URL . "/img/photos/bg-food.jpg" ?>" alt=""></div>
    </div>
    <div class="container">
        <div class="col-lg-5 col-md-9">
            <div class="rate mb-5 rate-lg"><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star"></i></div>
            <h1>The best food in London!</h1>
            <p class="lead text-muted mb-5">We like to think of Lucha as our most accessible restaurant in terms of pricing and offer. Lucha is open Tuesday to Sunday for lunch and dinner with additional heated and covered tables on our outdoor terrace.</p>
            <div class="blockquotes">
                <blockquote class="blockquote light animated" data-animation="fadeInLeft">
                    <div class="blockquote-content">
                        <div class="rate rate-sm mb-3"><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star"></i></div>
                        <p>It’ was amazing feeling for my belly!</p>
                    </div>
                    <footer>
                        <img src="<?= ASSETS_URL . "/img/avatars/avatar02.jpg" ?>" alt="">
                        <span class="name">Mark Johnson<span class="text-muted">, Google</span></span>
                    </footer>
                </blockquote>
                <blockquote class="blockquote animated" data-animation="fadeInRight" data-animation-delay="300">
                    <div class="blockquote-content dark">
                        <div class="rate rate-sm mb-3"><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star"></i></div>
                        <p>Great food and great atmosphere!</p>
                    </div>
                    <footer>
                        <img src="<?= ASSETS_URL . "/img/avatars/avatar01.jpg" ?>" alt="">
                        <span class="name">Kate Hudson<span class="text-muted">, LinkedIn</span></span>
                    </footer>
                </blockquote>
            </div>
        </div>
    </div>
</section>
<section class="section section-extended right dark">
    <div class="container bg-dark">
        <div class="row">
            <div class="col-md-4">
                <div class="feature feature-1 mb-md-0">
                    <div class="feature-icon icon icon-primary"><i class="ti ti-shopping-cart"></i></div>
                    <div class="feature-content">
                        <h4 class="mb-2"><a href="menu.php">Pick a dish</a></h4>
                        <p class="text-muted mb-0"></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature feature-1 mb-md-0">
                    <div class="feature-icon icon icon-primary"><i class="ti ti-wallet"></i></div>
                    <div class="feature-content">
                        <h4 class="mb-2">Make a payment</h4>
                        <p class="text-muted mb-0"></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature feature-1 mb-md-0">
                    <div class="feature-icon icon icon-primary"><i class="ti ti-package"></i></div>
                    <div class="feature-content">
                        <h4 class="mb-2">Recieve your food!</h4>
                        <p class="text-muted mb-3"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section pb-0 protrude">
    <div class="container">
        <h1 class="mb-6">Our menu</h1>
    </div>
    <div class="menu-sample-carousel carousel inner-controls" data-slick='{
        "dots": true,
        "slidesToShow": 3,
        "slidesToScroll": 1,
        "infinite": true,
        "responsive": [
            {
                "breakpoint": 991,
                "settings": {
                    "slidesToShow": 2,
                    "slidesToScroll": 1
                }
            },
            {
                "breakpoint": 690,
                "settings": {
                    "slidesToShow": 1,
                    "slidesToScroll": 1
                }
            }
        ]
    }'>
        <?php while ($category = $categories->fetch_assoc()): ?>
            <div class="menu-sample">
                <a href="./menu.php">
                    <img src="data:image/jpeg;base64,<?= base64_encode($category['image']) ?>"
                         alt="<?= $category["name"] ?>" class="image">
                    <h3 class="title"><?= $category["name"] ?></h3>
                </a>
            </div>
        <?php endwhile; ?>
    </div>
</section>
<section class="section bg-light">
    <div class="container">
        <h1 class="text-center mb-6">Special offers</h1>
        <div class="carousel" data-slick='{"dots": true}'>
            <div class="special-offer">
                <img src="<?= ASSETS_URL . "/img/photos/special-burger.jpg" ?>" alt="" class="special-offer-image">
                <div class="special-offer-content">
                    <h2 class="mb-2">Free Burger</h2>
                    <h5 class="text-muted mb-5">Get free burger from orders higher that $40!</h5>
                    <ul class="list-check text-lg mb-0">
                        <li>Only on Tuesdays</li>
                        <li class="false">Order higher that $40</li>
                        <li>Unless one burger ordered</li>
                    </ul>
                </div>
            </div>
            <div class="special-offer">
                <img src="<?= ASSETS_URL . "/img/photos/special-pizza.jpg" ?>" alt="" class="special-offer-image">
                <div class="special-offer-content">
                    <h2 class="mb-2">Free Small Pizza</h2>
                    <h5 class="text-muted mb-5">Get free pizza from orders higher that $40!</h5>
                    <ul class="list-check text-lg mb-0">
                        <li>Only on Weekends</li>
                        <li class="false">Order higher that $40</li>
                    </ul>
                </div>
            </div>
            <div class="special-offer">
                <img src="<?= ASSETS_URL . "/img/photos/special-dish.jpg" ?>" alt="" class="special-offer-image">
                <div class="special-offer-content">
                    <h2 class="mb-2">Chip Friday</h2>
                    <h5 class="text-muted mb-5">10% Off for all dishes!</h5>
                    <ul class="list-check text-lg mb-0">
                        <li>Only on Friday</li>
                        <li>All dishes with chips</li>
                        <li>Online order</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section section-lg dark bg-dark">
    <div class="bg-image bg-parallax"><img src="<?= ASSETS_URL . "/img/photos/bg-croissant.jpg" ?>" alt=""></div>
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="mb-3">Check our promo video!</h2>
                <h5 class="text-muted">Book a table even right now or make an online order!</h5>
                <button class="btn-play" data-toggle="video-modal" data-target="#modalVideo" data-video="https://www.youtube.com/embed/gxNxhapChBo">
                </button>
            </div>
        </div>
    </div>
</section>
<div class="modal modal-video fade" id="modalVideo" role="dialog">
    <button class="close" data-dismiss="modal"><i class="ti ti-close"></i></button>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <iframe height="500"></iframe>
        </div>
    </div>
</div>
<?php include_once "./layout/footer.php" ?>
