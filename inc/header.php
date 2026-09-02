<!-- Header -->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">

            <h1 class="display-4 fw-bolder">
                Create Product
            </h1>


            <p class="lead fw-normal text-white-50 mb-4">
                Add a new product to your store
            </p>

            <?php if (isset($page) && $page === 'product'): ?>
                <div class="d-flex justify-content-center">
                    <a href="<?= BASE_URL . 'views/products/createProduct.php' ?>" class="btn btn-primary fw-bolder">
                        +Create New Product
                    </a>
                </div>
            <?php endif; ?>

        </div>
    </div>
</header>