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


<?php if ($product !== null): ?>

    <!-- Product Details -->
    <section class="py-5">

        <div class="container px-4 px-lg-5 my-5">

            <div class="row gx-4 gx-lg-5 align-items-center">

                <div class="col-md-6">

                    <div class="card shadow-sm">

                        <img
                            class="card-img-top"
                            src="<?= BASE_URL . 'views/products/images/' . $product['image'] ?>"
                            alt="Product image" />

                    </div>

                </div>

                <!-- aus -->

                <div class="col mb-5">

                    <div class="card h-100 shadow-sm border-0">

                        <div class="card-body p-4">

                            <div class="text-center">

                                <h5 class="fw-bolder mb-2">
                                    <?= $product['product_name'] ?>
                                </h5>

                                <div class="fs-5 fw-bold text-primary mb-3">
                                    $<?= $product['price'] ?>
                                </div>

                                <div class="fs-5 fw-semibold text-success mb-3">
                                    Stock: <?= $product['stock_quantity'] ?>
                                </div>

                                <p class="text-secondary fs-6 fw-semibold mb-0">
                                    <?= $product['description'] ?>
                                </p>

                            </div>

                        </div>

                        <div class="card-footer bg-transparent border-0 p-4 pt-0">
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

                        <li
                            class="page-item <?= $i == $currentPage ? 'active' : '' ?>">

                            <a
                                class="page-link"
                                href="?<?= $productId !== null ? 'id=' . $productId . '&' : '' ?>page=<?= $i ?>">

                                <?= $i ?>

                            </a>

                        </li>

                    <?php endfor; ?>

                </ul>

            </nav>

        <?php endif; ?>

    </div>

</section>


<!-- Footer -->

<?php include dirname(__FILE__, 3) . '/inc/footer.php'; ?>