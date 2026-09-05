<!-- config -->
<?php include dirname(__FILE__, 3) . '/config/config.php' ?>
<!-- layouts -->
<?php include dirname(__FILE__, 3) . '/inc/layouts.php' ?>
<!-- Navigation-->
<?php include dirname(__FILE__, 3) . '/inc/nav.php' ?>

<!-- Header-->
<?php include dirname(__FILE__, 3) . '/inc/header.php' ?>
<?php
$invoiceData = $_SESSION['invoiceData'] ?? [];
$invoice = $_SESSION['cart'] ?? [];
$subTotal = 0;

foreach ($invoice as $cartItem) {
    $subTotal += $cartItem['price'] * $cartItem['quantity'];
}

$shipping = 0;

$total = $subTotal + $shipping;
// print_r($invoice);x
// unset($_SESSION['invoiceData']);
// unset($_SESSION['cart']);
// unset($_SESSION['count']);

?>
<div class="container py-5">

    <div class="card border-0 shadow-lg">

        <!-- Header -->
        <div class="card-body p-4 p-md-5">

            <div class="row align-items-center mb-5">

                <div class="col-md-7">
                    <h1 class="fw-bold mb-2">INVOICE</h1>
                    <p class="text-muted mb-0">
                        Thank you for your purchase
                    </p>
                </div>

                <div class="col-md-5 text-md-end mt-3 mt-md-0">
                    <div class="fw-bold">
                        Invoice #00001
                    </div>

                    <!-- Automatic Date -->
                    <div class="text-muted">
                        Date:
                        <span id="invoiceDate"></span>
                    </div>
                </div>

            </div>


            <!-- Customer Information -->
            <div class="row g-4 mb-5">

                <div class="col-md-6">

                    <div class="border rounded-3 p-4 h-100">

                        <h6 class="text-uppercase text-muted fw-bold mb-3">
                            Customer
                        </h6>

                        <h5 class="mb-2">
                            Customer Name :<?= $invoiceData['name'] ?? 'Customer Name' ?>
                        </h5>

                        <p class="mb-2">
                            <?= $invoiceData['email'] ?? 'customer@email.com' ?>
                        </p>

                        <p class="mb-2">
                            <?= $invoiceData['phone'] ?? '01000000000' ?>
                        </p>

                        <p class="mb-0">
                            Customer Address : <?= $invoiceData['address'] ?? 'Customer Address' ?>
                        </p>

                    </div>

                </div>


                <div class="col-md-6">

                    <div class="border rounded-3 p-4 h-100">

                        <h6 class="text-uppercase text-muted fw-bold mb-3">
                            Order Information
                        </h6>

                        <p class="mb-2">
                            <strong>Order ID:</strong>
                            #00001
                        </p>

                        <p class="mb-2">
                            <strong>Payment:</strong>
                            Cash
                        </p>

                        <p class="mb-0">
                            <strong>Status:</strong>
                            <span class="badge text-bg-success">
                                Completed
                            </span>
                        </p>

                    </div>

                </div>

            </div>


            <!-- Products -->
            <div class="mb-4">

                <h5 class="fw-bold mb-3">
                    Order Items
                </h5>

                <div class="table-responsive">

                    <table class="table align-middle">

                        <thead class="table-dark">

                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-end">Unit Price</th>
                                <th class="text-end">Total</th>
                            </tr>

                        </thead>

                        <tbody>

                            <!-- Product 1 -->
                            <?php foreach ($invoice as $index => $cartItem): ?>
                                <tr>
                                    <td><?= $cartItem['id'] ?></td>

                                    <td>
                                        <?= $cartItem['product_name'] ?>
                                    </td>

                                    <td class="text-center">
                                        <?= $cartItem['quantity'] ?>
                                    </td>

                                    <td class="text-end">
                                        $<?= $cartItem['price'] ?>
                                    </td>

                                    <td class="text-end fw-bold">
                                        $<?= $cartItem['quantity'] * $cartItem['price'] ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>

                </div>

            </div>



            <!-- Total -->
            <div class="row justify-content-end">
                <div class="col-md-5 col-lg-4">
                    <div class="border rounded-3 p-4">

                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted">
                                Subtotal
                            </span>
                            <span>
                                $<?= number_format($subTotal, 2) ?>
                            </span>
                        </div>

                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted">
                                Shipping
                            </span>
                            <span>
                                $<?= number_format($shipping, 2) ?>
                            </span>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold fs-5">
                                Total
                            </span>
                            <span class="fw-bold fs-4 text-success">
                                $<?= number_format($total, 2) ?>
                            </span>
                        </div>

                    </div>
                </div>
            </div>


            <!-- Notes -->
            <div class="mt-5">

                <h6 class="fw-bold">
                    Notes
                </h6>

                <div class="bg-light rounded-3 p-3 text-muted">
                    Customer notes go here...
                </div>
                <button type="button" class="btn btn-primary">
                    <a href="<?= BASE_URL . 'actions/delete/deleteSession.php' ?>" class="text-white text-decoration-none">
                        Send Invoice
                    </a>
                </button>
            </div>


            <!-- Print Button -->
            <div class="text-center mt-5 no-print">

                <button
                    type="button"
                    onclick="window.print()"
                    class="btn btn-dark btn-lg px-5">

                    <i class="bi bi-printer me-2"></i>
                    Print Invoice

                </button>

            </div>

        </div>


        <!-- Footer -->
        <div class="card-footer bg-dark text-white text-center py-3">

            <small>
                Thank you for shopping with us ❤️
            </small>

        </div>

    </div>

</div>


<!-- Automatic Date -->
<script>
    const today = new Date();

    const date = today.toLocaleDateString('en-GB', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric'
    });

    document.getElementById('invoiceDate').textContent = date;
</script>

<!-- Print Styling -->
<style>
    @media print {

        .no-print {
            display: none !important;
        }

        body {
            background: white !important;
        }

        .card {
            border: none !important;
            box-shadow: none !important;
        }

        .card-footer {
            display: none !important;
        }

        .container {
            max-width: 100% !important;
            width: 100% !important;
        }

    }
</style>
<?php include dirname(__FILE__, 3) . '/inc/footer.php' ?>