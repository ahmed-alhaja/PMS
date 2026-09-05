<!-- config -->
<?php include dirname(__FILE__, 2) . '/config/config.php'; ?>

<!-- layouts -->
<?php include dirname(__FILE__, 2) . '/inc/layouts.php' ?>

<!-- Navigation -->
<?php include dirname(__FILE__, 2) . '/inc/nav.php' ?>

<!-- Header -->
<?php include dirname(__FILE__, 2) . '/inc/header.php' ?>
<?php

$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);

$totalPriceCart = 0;


// Show validation error
function showError($errors, $key)
{
    if (isset($errors[$key])) {
        echo "<p class='text-danger'>{$errors[$key]}</p>";
    }
}


// Update cart quantities

foreach ($_POST['quantity'] ?? [] as $productId => $quantity) {

    foreach ($_SESSION['cart'] ?? [] as $key => $cartItem) {

        if ((int)$cartItem['id'] === (int)$productId) {

            $_SESSION['cart'][$key]['quantity'] = (int)$quantity;

            break;
        }
    }
    unset($cartItem);
}
// Calculate total
foreach ($_SESSION['cart'] ?? [] as $cartItem) {

    $totalPriceCart +=
        $cartItem['price'] * $cartItem['quantity'];
}

?>


<!-- Cart Error -->
<?php if (isset($errors['cart'])): ?>

    <div class="alert alert-danger alert-dismissible fade show shadow-sm mb-4"
        role="alert">

        <div class="d-flex align-items-center">

            <div class="me-3 fs-4">
                ⚠️
            </div>

            <div>

                <h6 class="alert-heading fw-bold mb-1">
                    Cart is empty
                </h6>

                <p class="mb-0">
                    <?= $errors['cart'] ?>
                </p>

            </div>

        </div>

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close">
        </button>

    </div>

<?php endif; ?>


<!-- Section -->
<section class="py-5">

    <div class="container px-4 px-lg-5 mt-5">

        <div class="row">

            <!-- Cart Summary -->
            <div class="col-4">

                <div class="border rounded p-3">

                    <div class="products">

                        <ul class="list-unstyled">

                            <?php foreach ($_SESSION['cart'] ?? [] as $cartItem): ?>

                                <li class="border rounded p-2 my-2">

                                    <?= $cartItem['product_name'] ?>

                                    -

                                    <span class="text-success mx-2 fw-bold">

                                        <?= $cartItem['quantity'] ?>
                                        ×
                                        <?= $cartItem['price'] ?>
                                        =
                                        <?= $cartItem['quantity'] * $cartItem['price'] ?>

                                    </span>

                                </li>

                            <?php endforeach; ?>

                        </ul>

                    </div>

                    <hr>

                    <h3>
                        Total:
                        <?= $totalPriceCart ?> $
                    </h3>

                </div>

            </div>


            <!-- Customer Information -->
            <div class="col-8">

                <form
                    action="<?= BASE_URL . 'actions/checkout/getInvoiceFunctions.php' ?>"
                    class="form border rounded my-2 p-3"
                    method="POST">


                    <!-- Name -->
                    <div class="mb-3">

                        <label for="name" class="form-label">
                            Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="form-control">

                        <?php showError($errors, 'name'); ?>

                    </div>


                    <!-- Email -->
                    <div class="mb-3">

                        <label for="email" class="form-label">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="form-control">

                        <?php showError($errors, 'email'); ?>

                    </div>


                    <!-- Address -->
                    <div class="mb-3">

                        <label for="address" class="form-label">
                            Address
                        </label>

                        <input
                            type="text"
                            name="address"
                            id="address"
                            class="form-control">

                        <?php showError($errors, 'address'); ?>

                    </div>


                    <!-- Phone -->
                    <div class="mb-3">

                        <label for="phone" class="form-label">
                            Phone
                        </label>

                        <input
                            type="number"
                            name="phone"
                            id="phone"
                            class="form-control">

                        <?php showError($errors, 'phone'); ?>

                    </div>


                    <!-- Notes -->
                    <div class="mb-3">

                        <label for="notes" class="form-label">
                            Notes
                        </label>

                        <textarea
                            name="notes"
                            id="notes"
                            class="form-control"></textarea>

                        <?php showError($errors, 'notes'); ?>

                    </div>


                    <!-- Submit -->
                    <div class="mb-3">

                        <input
                            type="submit"
                            value="Send"
                            class="btn btn-success">

                    </div>

                </form>

            </div>

        </div>

    </div>

</section>


<!-- Footer -->
<?php include dirname(__FILE__, 2) . '/inc/footer.php' ?>