<?php require_once "../../../../environment.php"; ?>
<?php require_once "../../../../db/connect.php"; ?>
<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = $con->escape_string($_POST["name"]);
        $image = file_get_contents($_FILES["image"]["tmp_name"]);

        $query = "INSERT INTO categories (name, image) VALUES (?, ?)";
        $stmt = $con->prepare($query);
        $stmt->bind_param("ss", $name, $image);
        $stmt->execute();

        header("location: ./list.php");
        exit();
    }
?>
<?php include_once "../../../layout/header.php"?>
<?php $page = "Add Category" ?>
<?php include_once "../../../layout/sub-header.php"?>
<section class="section">
    <div class="container">
        <div class="row">
            <?php include_once "../layout/nav.php"?>
            <div class="col-md-8 offset-md-1">
                <div id="faq1">
                    <h3><i class="ti ti-plus mr-4 text-primary"></i>Add Category</h3>
                    <hr>
                    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="booking-form"
                          method="post" data-validate enctype="multipart/form-data">
                        <div class="utility-box-content">
                            <div class="form-group">
                                <label for="name">Name: <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Image: <span class="text-danger">*</span></label>
                                <input type="file" id="image" name="image" class="form-control" required>
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
<?php include_once "../../../layout/footer.php"?>