<?php require_once dirname(__FILE__, 2) . '/inc/layouts.php'; ?>
<?php require_once dirname(__FILE__, 2) . '/config/config.php'; ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">

            <div class="card shadow">
                <div class="card-body p-4">

                    <h2 class="text-center mb-4">Register</h2>

                    <form action="<?=  BASE_URL . 'actions/auth/registerFunctions.php' ?>" method="POST">

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">
                                Name
                            </label>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="form-control"
                                placeholder="Enter your name">
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
                                class="form-control"
                                placeholder="Enter your email">
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">
                                Password
                            </label>
                            <input
                                type="password"
                                name="password"
                                id="password"
                                class="form-control"
                                placeholder="Enter your password">
                        </div>

                        <!-- Confirm Password -->

                        <!-- Submit -->
                        <div class="d-grid">
                            <button
                                type="submit"
                                class="btn btn-success">
                                Register
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>