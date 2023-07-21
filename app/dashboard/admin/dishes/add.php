<?php require_once "../../../../environment.php"; ?>
<?php require_once "../../../../db/connect.php"; ?>
<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = $con->escape_string($_POST["name"]);
        $category = $con->escape_string($_POST["category"]);
        $price = $con->escape_string($_POST["price"]);
        $description = $con->escape_string($_POST["description"]);
        $image = file_get_contents($_FILES["image"]["tmp_name"]);

        $query = "INSERT INTO dishes (name, image, category, description, price) VALUES (?, ?, ?, ?, ?)";
        $stmt = $con->prepare($query);
        $stmt->bind_param("ssssd", $name, $image, $category, $description, $price);
        $stmt->execute();

        header("location: ./list.php");
        exit();
    }

    $query = "SELECT * FROM categories";
    $categories = $con->query($query);
?>
<?php include_once "../../../layout/header.php" ?>
<?php $page = "Add Dish"; ?>
<?php include_once "../../../layout/sub-header.php" ?>
<section class="section">
    <div class="container">
        <div class="row">
            <?php include_once "../layout/nav.php"?>
            <div class="col-md-8 offset-md-1">
                <div id="faq1">
                    <h3><i class="ti ti-plus mr-4 text-primary"></i>Add Dish</h3>
                    <hr>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="booking-form"
                          method="post" enctype="multipart/form-data" data-validate>
                        <div class="utility-box-content">
                            <div class="form-group">
                                <label for="name">Name: <span class="text-danger">*</span></label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Image: <span class="text-danger">*</span></label>
                                <input type="file" id="image" name="image" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="category">Category: <span class="text-danger">*</span></label>
                                <select name="category" id="category" class="form-control" required>
                                    <?php while ($category = $categories->fetch_assoc()): ?>
                                        <option value="<?= $category["name"] ?>"><?= $category["name"] ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="price">Price: <span class="text-danger">*</span></label>
                                <input type="number" id="price" name="price" class="form-control"
                                       min="1" step="0.01" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description: <span class="text-danger">*</span></label>
                                <textarea cols="30" rows="3" name="description" class="form-control"
                                          id="description" required></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="submit" class="utility-box-btn btn btn-secondary btn-block btn-lg" value="Add!">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once "../../../layout/footer.php" ?>
