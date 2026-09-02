<?php

include_once dirname(__FILE__, 3) . '/config/config.php';
include_once dirname(__FILE__, 3) . '/inc/layouts.php';
include_once dirname(__FILE__, 3) . '/inc/nav.php';
$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);
function showError($errors, $key)
{
    if (isset($errors[$key])) {
        echo "<p class='text-danger'>{$errors[$key]}</p>";
    }
}

?>

<div class="container px-4 px-lg-5 my-5">

    <div class="row">

        <div class="col-lg-8 mx-auto">

            <h1 class="display-4 mb-4">
                Create Product
            </h1>

            <!-- Product Form -->

            <form
                action="<?= BASE_URL . 'actions/products/productFunctions.php' ?>"
                method="post"
                class="border rounded p-4 shadow-sm bg-white"
                enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="product_name" class="form-label fw-bold">
                        Product Name
                    </label>

                    <input
                        type="text"
                        id="product_name"
                        name="product_name"
                        class="form-control border border-success"
                        placeholder="Enter product name">

                    <?php showError($errors, 'product_name'); ?>
                </div>

                <div class="mb-3">

                    <label for="product_category" class="form-label fw-bold">
                        Category
                    </label>

                    <select
                        id="product_category"
                        name="category_id"
                        class="form-select border border-success">
                        <?php showError($errors, 'category_id'); ?>

                        <option value="">Select category</option>
                        <option value="1">Sports Cars</option>
                        <option value="2">SUVs</option>
                        <option value="3">Sedans</option>
                        <option value="4">Electric Cars</option>
                        <option value="5">Luxury Cars</option>

                    </select>

                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label for="price" class="form-label fw-bold">
                            Price
                        </label>

                        <input
                            type="number"
                            id="price"
                            name="price"
                            class="form-control border border-success"
                            step="0.01"
                            min="0"
                            placeholder="0.00">
                        <?php showError($errors, 'price'); ?>
                    </div>

                    <div class="col-md-6 mb-3">

                        <label for="stock" class="form-label fw-bold">
                            Stock Quantity
                        </label>

                        <input
                            type="number"
                            id="stock"
                            name="stock_quantity"
                            class="form-control border border-success"
                            min="0"
                            value="1">
                        <?php showError($errors, 'stock_quantity'); ?>
                    </div>

                </div>

                <div class="mb-3">

                    <label for="image_url" class="form-label fw-bold">
                        Image URL
                    </label>

                    <input
                        type="file"
                        id="image"
                        name="image"
                        class="form-control border border-success">
                    <?php showError($errors, 'image'); ?>

                </div>

                <div class="mb-3">

                    <label for="description" class="form-label fw-bold">
                        Description
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        rows="5"
                        class="form-control border border-success"
                        placeholder="Write a short product description..."></textarea>
                    <?php showError($errors, 'description'); ?>
                </div>
                <div class="mb-4">

                    <label class="form-label fw-bold d-block">
                        Status
                    </label>

                    <div class="form-check form-check-inline">

                        <input
                            class="form-check-input"
                            type="radio"
                            name="status"
                            id="active"
                            value="active"
                            checked>

                        <label class="form-check-label" for="active">
                            Active
                        </label>

                    </div>

                    <div class="form-check form-check-inline">

                        <input
                            class="form-check-input"
                            type="radio"
                            name="status"
                            id="inactive"
                            value="inactive">

                        <label class="form-check-label" for="inactive">
                            Inactive
                        </label>

                    </div>

                </div>

                <div class="d-flex gap-2">

                    <input
                        type="submit"
                        value="Add Product"
                        class="btn btn-primary px-4">

                    <a
                        href="<?= BASE_URL . '/views/products/product.php' ?>"
                        class="btn btn-outline-secondary">
                        Cancel
                    </a>

                </div>


            </form>

        </div>

    </div>

</div>

<!-- Footer -->

<?php include_once dirname(__FILE__, 3) . '/inc/footer.php'; ?>