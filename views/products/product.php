<?php $page = 'product' ?>

<!-- config -->
<?php
$configPath = dirname(__FILE__, 3) . '/config/config.php';

if (file_exists($configPath)) {
    include_once $configPath;
} else {
    die("Configuration file not found.");
}
?>

<!-- Get Products -->
<?php include dirname(__FILE__, 3) . '/actions/products/getProduct.php'; ?>

<?php
$productId = $_GET['id'] ?? null;
$product = null;

if ($productId !== null) {
    foreach ($arrayProducts as $item) {
        if ($item['id'] == $productId) {
            $product = $item;
            break;
        }
    }
}
?>

<!-- layouts -->
<?php include dirname(__FILE__, 3) . '/inc/layouts.php'; ?>

<!-- Navigation -->
<?php include dirname(__FILE__, 3) . '/inc/nav.php'; ?>

<!-- Header -->
<?php include dirname(__FILE__, 3) . '/inc/header.php'; ?>


<!-- Product Details -->
<?php if ($product !== null): ?>

    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">

            <div class="row gx-5 align-items-center">

                <div class="col-md-6 mb-5 mb-md-0">

                    <div class="card shadow-sm border-0">

                        <img
                            class="card-img-top img-fluid"
                            src="<?= BASE_URL . 'views/products/images/' . $product['image'] ?>"
                            alt="<?= $product['product_name'] ?>"
                            style="height: 500px; object-fit: cover;" />

                    </div>

                </div>


                <div class="col-md-6">

                    <div class="card h-100 shadow-sm border-0">

                        <div class="card-body p-5">

                            <h1 class="display-6 fw-bolder mb-4">
                                <?= $product['product_name'] ?>
                            </h1>


                            <div class="fs-3 fw-bold text-primary mb-4">
                                $<?= $product['price'] ?>
                            </div>


                            <div class="fs-5 fw-semibold text-success mb-4">
                                Stock: <?= $product['stock_quantity'] ?>
                            </div>


                            <p class="text-secondary fs-5 mb-5">
                                <?= $product['description'] ?>
                            </p>


                            <!-- Quantity + Add To Cart -->

                            <form
                                action="<?= BASE_URL . 'actions/cart/cartFunctions.php' ?>"
                                method="POST">

                                <div class="d-flex align-items-center mb-4">

                                    <input
                                        class="form-control text-center me-3"
                                        id="inputQuantity"
                                        name="quantity"
                                        type="number"
                                        value="1"
                                        min="1"
                                        style="max-width: 5rem" />


                                    <input
                                        type="hidden"
                                        name="id"
                                        value="<?= $product['id'] ?>">


                                    <button
                                        class="btn btn-outline-dark flex-shrink-0 px-4"
                                        type="submit">

                                        <i class="bi-cart-fill me-1"></i>

                                        Add to cart

                                    </button>

                                </div>

                            </form>


                            <!-- Actions -->

                            <div class="d-flex gap-3">

                                <button
                                    class="btn btn-dark px-4"
                                    type="button">
                                    Buy Now
                                </button>


                                <button
                                    class="btn btn-outline-secondary px-4"
                                    type="button">
                                    Save for Later
                                </button>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>


    <!-- Product Description -->

    <section class="py-5 bg-light">

        <div class="container px-4 px-lg-5">

            <div class="row">

                <div class="col-lg-8 mx-auto">

                    <div class="card border-0 shadow-sm">

                        <div class="card-body p-4">

                            <h3 class="fw-bolder mb-3">
                                Product Description
                            </h3>

                            <p class="text-secondary fs-6 fw-semibold mb-0">
                                <?= $product['description'] ?>
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

<?php endif; ?>


<!-- Related Products -->

<section class="py-5">

    <div class="container px-4 px-lg-5 mt-5">

        <h2 class="fw-bolder mb-4">
            Related products
        </h2>


        <?php

        // Products per page
        $perPage = 4;

        // Current page
        $currentPage = $_GET['page'] ?? 1;
        $currentPage = (int) $currentPage;

        // Prevent invalid page number
        if ($currentPage < 1) {
            $currentPage = 1;
        }

        // Total products
        $totalProducts = count($arrayProducts);

        // Total pages
        $totalPages = ceil($totalProducts / $perPage);

        // Start index
        $start = ($currentPage - 1) * $perPage;

        // Products for current page
        $productsToShow = array_slice(
            $arrayProducts,
            $start,
            $perPage
        );

        ?>


        <!-- Product Cards -->

        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

            <?php include dirname(__FILE__, 3) . '/Components/ProductCard.php'; ?>

        </div>


        <!-- Pagination -->

        <?php if ($totalPages > 1): ?>

            <nav aria-label="Page navigation">

                <ul class="pagination justify-content-center">

                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>

                        <li class="page-item <?= $i == $currentPage ? 'active' : '' ?>">

                            <a
                                class="page-link"
                                href="?page=<?= $i ?>">

                                <?= $i ?>

                            </a>

                        </li>

                    <?php endfor; ?>

                </ul>

            </nav>

        <?php endif; ?>

    </div>

</section>