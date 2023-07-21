<?php require_once "../../../../environment.php"; ?>
<?php require_once "../../../../db/connect.php"; ?>
<?php
    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $name = $con->escape_string($_POST["name"]);
            $category = $con->escape_string($_POST["category"]);
            $price = $con->escape_string($_POST["price"]);
            $description = $con->escape_string($_POST["description"]);
            $query = "UPDATE dishes SET name = ?, category = ?, description = ?, price = ?";
            $types = "sssd";
            $args = [$name, $category, $description, $price];

            if (!empty($_FILES["image"]["tmp_name"])) {
                $image = file_get_contents($_FILES["image"]["tmp_name"]);
                $query .= ", image = ?";
                $types .= "s";
                $args[] = $image;
            }

            $query .= " WHERE id = '$id'";

            $stmt = $con->prepare($query);
            $stmt->bind_param($types, ...$args);
            $stmt->execute();

            header("location: ./list.php");
            exit();
        }

        $query = "SELECT * FROM dishes WHERE id = '$id' LIMIT 1";
        $result = $con->query($query);
        if ($result->num_rows === 0) {
            header("location: ./list.php");
            exit();
        }
        $dish = $result->fetch_assoc();

        $query = "SELECT * FROM categories";
        $categories = $con->query($query);
    } else {
        header("location: ./list.php");
        exit();
    }
?>
<?php include_once "../../../layout/header.php" ?>
<?php $page = "Edit Dish"; ?>
<?php include_once "../../../layout/sub-header.php" ?>
<section class="section">
    <div class="container">
        <div class="row">
            <?php include_once "../layout/nav.php"?>
            <div class="col-md-8 offset-md-1">
                <div id="faq1">
                    <h3><i class="ti ti-pencil mr-4 text-primary"></i>Edit Dish</h3>
                    <hr>
                    <p>If you do not want to update the image, leave the image field blank</p>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?id=<?= $id ?>" id="booking-form"
                          method="post" enctype="multipart/form-data" data-validate>
                        <div class="utility-box-content">
                            <div class="form-group">
                                <label for="name">Name: <span class="text-danger">*</span></label>
                                <input type="text" id="name" name="name" class="form-control"
                                       value="<?= $dish["name"] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Image:</label>
                                <input type="file" id="image" name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="category">Category: <span class="text-danger">*</span></label>
                                <select name="category" id="category" class="form-control" required>
                                    <?php while ($category = $categories->fetch_assoc()): ?>
                                        <option <?= $category["name"] === $dish["category"] ? "selected" : "" ?>
                                                value="<?= $category["name"] ?>"><?= $category["name"] ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="price">Price: <span class="text-danger">*</span></label>
                                <input type="number" id="price" name="price" class="form-control"
                                       min="1" step="0.01" value="<?= $dish["price"] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description: <span class="text-danger">*</span></label>
                                <textarea cols="30" rows="3" name="description" class="form-control"
                                          id="description" required><?= $dish["description"] ?></textarea>
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
