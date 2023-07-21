<?php require_once "../../../../environment.php"; ?>
<?php require_once "../../../../db/connect.php"; ?>
<?php
    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $name = $con->escape_string($_POST["name"]);
            $query = "UPDATE categories SET name = ?";
            $types = "s";
            $args = [$name];

            if (!empty($_FILES["image"]["tmp_name"])) {
                $image = file_get_contents($_FILES["image"]["tmp_name"]);
                $types .= "s";
                $args[] = $image;
                $query .= ", image = ?";
            }

            $query .= " WHERE id = '$id'";

            $stmt = $con->prepare($query);
            $stmt->bind_param($types, ...$args);
            $stmt->execute();

            header("location: ./list.php");
            exit();
        }

        $query = "SELECT * FROM categories WHERE id = '$id' LIMIT 1";
        $result = $con->query($query);

        if ($result->num_rows === 0) {
            header("location: ./list.php");
            exit();
        }

        $category = $result->fetch_assoc();
    } else {
        header("location: ./list.php");
        exit();
    }
?>
<?php include_once "../../../layout/header.php"?>
<?php $page = "Edit Category" ?>
<?php include_once "../../../layout/sub-header.php"?>
    <section class="section">
        <div class="container">
            <div class="row">
                <?php include_once "../layout/nav.php"?>
                <div class="col-md-8 offset-md-1">
                    <div id="faq1">
                        <h3><i class="ti ti-pencil mr-4 text-primary"></i>Edit Category</h3>
                        <hr>
                        <p>If you do not want to update the image, leave the image field blank</p>
                        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>?id=<?= $id ?>" id="booking-form"
                              method="post" data-validate enctype="multipart/form-data">
                            <div class="utility-box-content">
                                <div class="form-group">
                                    <label for="name">Name: <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control"
                                           value="<?= $category["name"] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="image">Image:</label>
                                    <input type="file" id="image" name="image" class="form-control">
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="submit" class="utility-box-btn btn btn-secondary btn-block btn-lg"
                                       value="Save!">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include_once "../../../layout/footer.php"?>