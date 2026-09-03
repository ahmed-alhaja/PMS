<!-- config -->
<?php include dirname(__FILE__, 2) . '/config/config.php'; ?>
<!-- layouts -->
<?php include dirname(__FILE__, 2) . '/inc/layouts.php' ?>
<!-- Navigation-->
<?php include dirname(__FILE__, 2) . '/inc/nav.php' ?>
<!-- Header-->
<?php include dirname(__FILE__, 2) . '/inc/header.php' ?>

<?php
$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);
function showError($errors, $key)
{
    if (isset($errors[$key])) {
        echo "<p class='text-danger'>{$errors[$key]}</p>";
    }
}
$totalPriceCart = 0;
foreach ($_POST['quantity'] ?? [] as $idQuantityValue => $newQuantityValue) {
    foreach ($_SESSION['cart'] ?? [] as &$cart) {
        if ($idQuantityValue == $cart['id']) {
            $cart['quantity'] = $newQuantityValue;
        }
    }
}

foreach ($_SESSION['cart'] as &$cartItem) {
    $totalPriceCart += $cartItem['price'] * $cartItem['quantity'];
}

?>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-4">
                <div class="border p-2">
                    <div class="products">
                        <ul class="list-unstyled">
                            <?php foreach ($_SESSION['cart'] as $cartIteem): ?>
                                <li class="border p-2 my-1"> <?= $cartIteem['product_name'] ?> -
                                    <span class="text-success mx-2 mr-auto bold">
                                        <?= $cartIteem['quantity'] . '×' . $cartIteem['price'] . ' = ' . ($cartIteem['quantity'] * $cartIteem['price']) ?>
                                    </span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <h3>Total : <?= $totalPriceCart ?> $</h3>
                </div>
            </div>
            <div class="col-8">
                <form action="<?= BASE_URL . 'actions/checkout/checkoutFunctions.php' ?>" class="form border my-2 p-3"
                    method="POST">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" id="" class="form-control">
                            <?php showError($errors, 'name'); ?>
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" id="" class="form-control">
                            <?php showError($errors, 'email'); ?>
                        </div>
                        <div class="mb-3">
                            <label for="">Address</label>
                            <input type="text" name="address" id="" class="form-control">
                            <?php showError($errors, 'address'); ?>

                        </div>
                        <div class="mb-3">
                            <label for="">Phone</label>
                            <input type="number" name="phone" id="" class="form-control">
                            <?php showError($errors, 'phone'); ?>
                        </div>
                        <div class="mb-3">
                            <label for="">Notes</label>
                            <textarea name="notes" id="" class="form-control"></textarea>
                            <?php showError($errors, 'notes'); ?>
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