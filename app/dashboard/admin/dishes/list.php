<?php require_once "../../../../environment.php"; ?>
<?php require_once "../../../../db/connect.php"; ?>
<?php
    $query = "SELECT * FROM dishes";
    $dishes = $con->query($query);
?>
<?php include_once "../../../layout/header.php"?>
<?php $page = "Dishes" ?>
<?php include_once "../../../layout/sub-header.php"?>
    <section class="section">
        <div class="container">
            <div class="row">
                <?php include_once "../layout/nav.php"?>
                <div class="col-md-8 offset-md-1">
                    <div id="faq1">
                        <div class="d-flex justify-content-between">
                            <h3><i class="ti ti-list mr-4 text-primary"></i>Dishes</h3>
                            <a href="./add.php" class="btn btn-outline-secondary">Add Dish</a>
                        </div>
                        <hr>
                        <table id="data-table" class="display">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php while ($dish = $dishes->fetch_assoc()): ?>
                                    <tr>
                                        <td><?= $dish["name"] ?></td>
                                        <td>
                                            <img src="data:image/jpeg;base64,<?= base64_encode($dish['image']) ?>"
                                                 alt="<?= $dish["name"] ?>" style="width: 150px; height: 75px">
                                        </td>
                                        <td>$<?= $dish["price"] ?></td>
                                        <td><?= $dish["category"] ?></td>
                                        <td><?= $dish["description"] ?></td>
                                        <td>
                                            <a href="./edit.php?id=<?= $dish["id"] ?>"
                                               class="btn btn-outline-secondary">Edit</a>
                                            <a href="./delete.php?id=<?= $dish["id"] ?>"
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