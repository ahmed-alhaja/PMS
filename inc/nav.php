<?php //session_destroy(); 
?>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#!">EraaSoft PMS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?= BASE_URL ?>">Home</a></li>
                <?php if (isset($_SESSION['user'])): ?>
                    <li class="nav-item"><a class="nav-link" href="<?= BASE_URL . 'views/products/product.php' ?>">Product</a></li>
                <?php endif; ?>
                <li class="nav-item"><a class="nav-link" href="<?= BASE_URL . 'info/about.php' ?>">About</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= BASE_URL . 'info/contact.php' ?>">Contact</a></li>
            </ul>
            <form class="d-flex" action="<?= BASE_URL . 'cart/cart.php' ?>">
                <button class="btn btn-outline-dark" type="submit">
                    <i class="bi-cart-fill me-1"></i>
                    Cart
                    <span class="badge bg-dark text-white ms-1 rounded-pill"><?= $_SESSION['count'] ?? 0 ?></span>
                </button>
            </form>

            <!--  authentication -->
            <?php if (!isset($_SESSION['user'])): ?>
                <div class="dropdown m-2">
                    <button class="btn btn-outline-dark dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        Account
                    </button>

                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="<?= BASE_URL . 'auth/login.php' ?>">Login</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= BASE_URL . 'auth/register.php' ?>">Register</a>
                        </li>
                    </ul>
                </div>
            <?php else: ?>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="<?= BASE_URL . 'auth/logoutFunctions.php' ?>">Log Outr</a>
                    </li>
                </ul>

            <?php endif ?>
        </div>
    </div>
</nav>