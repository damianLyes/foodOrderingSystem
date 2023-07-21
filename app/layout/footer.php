<footer id="footer" class="bg-dark dark">
    <div class="container">
        <div class="footer-second-row">
            <span class="text-muted">© Copyright Lucha 2022.</span>
        </div>
    </div>
    <button id="back-to-top" class="back-to-top"><i class="ti ti-angle-up"></i></button>
</footer>
</div>
<?php include_once FULL_PATH . "/app/layout/partials/cart/index.php"?>
<nav id="panel-mobile">
    <div class="module module-logo bg-dark dark">
        <a href="#">
            <img src="<?= ASSETS_URL . "/img/logo-light.svg" ?>" alt="" width="88">
        </a>
        <button class="close" data-toggle="panel-mobile"><i class="ti ti-close"></i></button>
    </div>
    <nav class="module module-navigation"></nav>
</nav>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="<?= ASSETS_URL . "/js/core.js" ?>"></script>
<script>
    $(document).ready(function () {
        $('#data-table').DataTable();
    });
</script>
</body>
</html>