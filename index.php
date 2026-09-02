<!-- config -->
<?php include dirname(__FILE__) . '/config/config.php' ?>
<!-- layouts -->
<?php include dirname(__FILE__) . '/inc/layouts.php' ?>
<!-- Navigation-->
<?php include dirname(__FILE__) . '/inc/nav.php' ?>

<!-- Header-->
<?php include dirname(__FILE__) . '/inc/header.php' ?>
<!-- get product data -->
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
       <?php include dirname(__FILE__) . '/Components/productCard.php' ?>
        </div>
    </div>
</section>
<!-- Footer-->
<?php include dirname(__FILE__) . '/inc/footer.php' ?>