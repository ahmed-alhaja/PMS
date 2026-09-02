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
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Product 1</td>
                            <td>$9.99</td>
                            <td>
                                <input type="number" value="1">
                            </td>
                            <td>$9.99</td>
                            <td>
                                <a href="#" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Product 2</td>
                            <td>$19.99</td>
                            <td>
                                <input type="number" value="2">
                            </td>
                            <td>$9.99</td>
                            <td>
                                <a href="#" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Product 2</td>
                            <td>$19.99</td>
                            <td>
                                <input type="number" value="2">
                            </td>
                            <td>$9.99</td>
                            <td>
                                <a href="#" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                Tatal Price
                            </td>
                            <td colspan="3">
                                <h3>3325 $</h3>
                            </td>
                            <td>
                                <a href="checkout.php" class="btn btn-primary">Checkout</a>
                            </td>
                        </tr>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- Footer-->
<?php include dirname(__FILE__, 2) . '/inc/footer.php' ?>