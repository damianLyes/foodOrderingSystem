<?php require_once "../../../environment.php"; ?>
<?php require_once "../../../db/connect.php"; ?>
<?php
    if(isset($_SESSION["user"])){
        if ($_SESSION["user"]["role"] === "admin") {
            header("location: " . SITE_URL . "/dashboard/admin/account.php");
        }
    } else {
        header("location: " . SITE_URL . "/auth/login.php");
    }

    $user = $_SESSION['user'];

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        if(empty($_POST["password"])){
            $name = $con->escape_string($_POST['name']);
            $phone = $con->escape_string($_POST['phone']);

            $query = "UPDATE users SET name='$name', phone='$phone' WHERE id='" . $user["id"] . "'";
            $con->query($query);
            $_SESSION["user"]["name"] = $name;
            $_SESSION["user"]["phone"] = $phone;
            $_SESSION["success"] = "Account updated successfully!";
        } else {
            $name = $con->escape_string($_POST['name']);
            $phone = $con->escape_string($_POST['phone']);
            $password = $con->escape_string($_POST['password']);
            $confirm_password = $con->escape_string($_POST['confirm_password']);

            if($password !== $confirm_password){
                $_SESSION["error"] = "Passwords do not match!";
            } else {
                $query = "UPDATE users SET name='$name', phone='$phone', password='$password' WHERE id='" . $user["id"] . "'";
                $con->query($query);
                $_SESSION["user"]["name"] = $name;
                $_SESSION["user"]["phone"] = $phone;
                $_SESSION["success"] = "Updated Successfully";
            }
        }
        header("location: " . $_SERVER["PHP_SELF"]);
        exit();
    }
?>
<?php include_once "../../layout/header.php"?>
<?php $page = "Account" ?>
<?php include_once "../../layout/sub-header.php"?>
    <section class="section">
        <div class="container">
            <div class="row">
                <?php include_once "./layout/nav.php"?>
                <div class="col-md-8 offset-md-1">
                    <div id="faq1">
                        <h3><i class="ti ti-file mr-4 text-primary"></i>Account info</h3>
                        <hr>
                        <p>If you do not want to update your password, leave the password fields blank</p>
                        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="booking-form"
                              method="post" data-validate>
                            <div class="utility-box-content">
                                <div class="form-group">
                                    <label for="name">Name: <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control" value="<?= $user["name"] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone number: <span class="text-danger">*</span></label>
                                    <input type="text" id="phone" name="phone" class="form-control" value="<?= $user["phone"] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">New Password:</label>
                                    <input type="password" id="password" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password">New Password (Again):</label>
                                    <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="submit" class="utility-box-btn btn btn-secondary btn-block btn-lg" value="Save!">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include_once "../../layout/footer.php"?>