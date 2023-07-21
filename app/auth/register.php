<?php require_once "../../environment.php"?>
<?php require_once "../../db/connect.php"?>
<?php
    if(isset($_SESSION["user"])){
        header("location: " . SITE_URL . "/dashboard/user/account.php");
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = $con->escape_string($_POST["name"]);
        $phone = $con->escape_string($_POST["phone"]);
        $password = $con->escape_string($_POST["password"]);

        $query = "SELECT * FROM users WHERE phone='" .$_POST["phone"]."' LIMIT 1";
        $result = $con->query($query);
        if($result->num_rows > 0){
            $_SESSION["error"] = "Phone number is already in use";
            header("location " . $_SERVER["PHP_SELF"]);
            exit();
        }

        $query = "INSERT INTO users (name, phone, password) VALUES ('$name', '$phone', '$password')";
        $con->query($query);
        $_SESSION["success"] = "Account created successfully, now login!";

        header("location: " . SITE_URL . "/auth/login.php");
    }
?>
<?php include_once "../layout/header.php"?>
<section class="section section-lg bg-dark">
    <div class="bg-video dark-overlay" data-src="http://assets.suelo.pl/soup/video/video_3.mp4" data-type="video/mp4"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="utility-box">
                    <div class="utility-box-title bg-dark dark">
                        <div class="bg-image"><img src="../../assets/img/photos/modal-review.jpg" alt=""></div>
                        <div>
                            <span class="icon icon-primary"><i class="ti ti-bookmark-alt"></i></span>
                            <h4 class="mb-0">Register</h4>
                            <p class="lead text-muted mb-0">Details about yourself</p>
                        </div>
                    </div>
                    <form action="<?= $_SERVER["PHP_SELF"] ?>" id="booking-form" class="" method="post">
                        <div class="utility-box-content">
                            <div class="form-group">
                                <label for="name">Name: <span class="text-danger">*</span></label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone number: <span class="text-danger">*</span></label>
                                <input type="text" id="phone" name="phone" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password: <span class="text-danger">*</span></label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <span>
                                    Already have an account?&nbsp;
                                    Login <a href="<?= SITE_URL . "/auth/login.php" ?>"><em>here</em></a>.
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit"
                                   class="utility-box-btn btn btn-secondary btn-block btn-lg" value="Register!">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once "../layout/footer.php"?>
