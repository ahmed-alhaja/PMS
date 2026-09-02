<!-- config -->
<?php include dirname(__FILE__, 2) . '/config/config.php'; ?>
<!-- layouts -->
<?php include dirname(__FILE__, 2) . '/inc/layouts.php' ?>
<!-- Navigation-->
<?php include dirname(__FILE__, 2) . '/inc/nav.php' ?>
<!-- Header-->
<?php include dirname(__FILE__, 2) . '/inc/header.php' ?>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-8 mx-auto">
                <form action="" class="form border my-2 p-3">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" name="" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Message</label>
                            <textarea name="" id="" class="form-control" rows="7"></textarea>
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Send" id="" class="btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Footer-->
<?php include dirname(__FILE__, 2) . '/inc/footer.php' ?>