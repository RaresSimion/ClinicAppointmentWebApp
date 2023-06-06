<?php
if (!isset($error))
    $error = "";
include __DIR__ . '/../header.php'; ?>

<form action="/login" method="post" class="mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 mx-auto">
                <h1 class="text-center mb-4">Login</h1>
                <div class="card bg-light">
                    <div class="card-body">
                        <form>
                            <div class="row mb-5">
                                <div class="col-md-12">
                                    <h2 class="mb-3">Email</h2>
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" name="email"
                                               placeholder="Email" required>
                                        <label for="email" class="form-label">Email</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <h2 class="mb-3">Password</h2>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="password" name="password"
                                               placeholder="Password" required>
                                        <label for="password" class="form-label">Password</label>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary fs-4 mb-3" name="login">Login</button>
                            <label class="m-3 text-danger"><?= $error ?></label>
                            <a href="/register" class="fs-5 float-end mb-3">Don't have an account? Register now!</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<?php
include __DIR__ . '/../footer.php'; ?>
