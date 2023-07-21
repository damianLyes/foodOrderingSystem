<?php include_once "./layout/header.php" ?>
<?php
    $page = "About Us";
    $description = "Some information about our restaurant";
?>
<?php include_once "./layout/sub-header.php" ?>
<section class="section section-bg-edge">
    <div class="image left bottom col-md-7">
        <div class="bg-image"><img src="../assets/img/photos/bg-chef.jpg" alt=""></div>
    </div>
    <div class="container">
        <div class="col-lg-5 offset-lg-5 col-md-9 offset-md-3">
            <div class="rate mb-5 rate-lg"><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star"></i></div>
            <h2>The best food in London!</h2>
            <p class="lead">Our constantly evolving menu is contemporary and approachable but with recognisable Italian flavours that have been enjoyed customers</p>
            <p>Until recently, the Italian-born chef Adejoké ‘Joké’ Bakare was still, technically, a home cook. For years he had hosted dinner parties and supper clubs, but had not really come close to fulfilling her dream of opening his own restaurant. In August 2020, she finally launched Lucha restaurant in Brixton, South London, inspired by the food of Italy and the wider region. He did so in part thanks to a victory in the amateur category at last year’s Brixton Kitchen competition, which has afforded her a spot in Market Row, a bustling hub of bars and restaurants.</p>
            <h6>Mark Johnson, Chef</h6>
            <img src="../assets/img/svg/sign.svg" alt="" class="mb-5">
        </div>
    </div>
</section>
<section class="section section-lg dark bg-dark">
    <div class="bg-image bg-parallax"><img src="../assets/img/photos/bg-croissant.jpg" alt=""></div>
    <div class="container text-center">
        <div class="col-lg-8 offset-lg-2">
            <h2 class="mb-3">Would you like to visit Us?</h2>
            <h5 class="text-muted">Book a table even right now or make an online order!</h5>
            <a href="menu.php" class="btn btn-primary"><span>Order Online</span></a>
            <a href="auth/register.php" class="btn btn-outline-primary"><span>Book a table</span></a>
        </div>
    </div>

</section>

<?php include_once "./layout/footer.php" ?>