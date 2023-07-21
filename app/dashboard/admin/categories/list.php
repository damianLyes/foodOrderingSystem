<?php require_once "../../../../environment.php"; ?>
<?php require_once "../../../../db/connect.php"; ?>
<?php
    $query = "SELECT * FROM categories";
    $categories = $con->query($query);
?>
<?php include_once "../../../layout/header.php"?>
<?php $page = "Categories" ?>
<?php include_once "../../../layout/sub-header.php"?>
<section class="section">
    <div class="container">
        <div class="row">
            <?php include_once "../layout/nav.php"?>
            <div class="col-md-8 offset-md-1">
                <div id="faq1">
                    <div class="d-flex justify-content-between">
                        <h3><i class="ti ti-list mr-4 text-primary"></i>Categories</h3>
                        <a href="./add.php" class="btn btn-outline-secondary">Add Category</a>
                    </div>
                    <hr>
                    <table id="data-table" class="display">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php while ($category = $categories->fetch_assoc()): ?>
                            <tr>
                                <td><?= $category["name"] ?></td>
                                <td>
                                    <img src="data:image/jpeg;base64,<?= base64_encode($category['image']) ?>"
                                         alt="<?= $category["name"] ?>" style="width: 150px; height: 75px">
                                </td>
                                <td>
                                    <a href="./edit.php?id=<?= $category["id"] ?>"
                                       class="btn btn-outline-secondary">Edit</a>
                                    <a href="./delete.php?id=<?= $category["id"] ?>"
                                       class="btn btn-outline-secondary">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once "../../../layout/footer.php"?>