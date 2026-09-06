<!-- config -->
<?php include dirname(__FILE__, 2) . '/config/config.php'; ?>
<!-- layouts -->
<?php include dirname(__FILE__, 2) . '/inc/layouts.php' ?>
<!-- Navigation-->
<?php include dirname(__FILE__, 2) . '/inc/nav.php' ?>
<!-- Header-->
<?php include dirname(__FILE__, 2) . '/inc/header.php' ?>
<?php $sessionCart = $_SESSION['cart'] ?? [];


?>

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-12">
                <form action="checkout.php" method="POST" class="form-inline">
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
                            <?php foreach ($sessionCart as $item): ?>
                                <tr>
                                    <th scope="row"><?= $item['id'] ?></th>

                                    <td><?= $item['product_name'] ?></td>

                                    <td>$<?= number_format($item['price'], 2) ?></td>

                                    <td>
                                        <input type="number" min="1" name="quantity[<?= $item['id'] ?>]" value="<?= $item['quantity'] ?>">
                                    </td>

                                    <td>
                                        $<?= number_format($item['price'] * $item['quantity'], 2) ?>
                                    </td>

                                    <td>
                                        <a href="<?= BASE_URL . 'actions/delete/deleteItem.php?id=' . $item['id'] ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                        <tr>
                            <?php if (empty($sessionCart)): ?>
                                <td colspan="6" class="text-center">Your cart is empty.</td>
                            <?php else: ?>
                                <td colspan="6">
                                    <button type="submit" class="btn btn-primary">Checkout</button>
                                </td>
                            <?php endif; ?>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Footer-->
<?php include dirname(__FILE__, 2) . '/inc/footer.php' ?>