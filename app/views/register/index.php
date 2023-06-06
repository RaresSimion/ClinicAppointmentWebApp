<?php

if (!isset($error))
    $error = "";

include __DIR__ . '/../header.php';

?>

<form action="/register" method="post">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-6 col-sm-12 mx-auto">
                <h1 class="text-center mb-4">Register</h1>
                <div class="card bg-light">
                    <div class="card-body">
                        <form>

                            <div class="row mb-3">
                                <h2 class="mb-3">Name</h2>
                                <div class="col-md-6 mb-3">
                                    <div class="form-floating">
                                        <input required type="text" class="form-control" id="firstName" name="firstName"
                                               placeholder="John">
                                        <label for="firstName" class="form-label">First Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input required type="text" class="form-control" id="lastName" name="lastName"
                                               placeholder="Doe">
                                        <label for="lastName" class="form-label">Last Name</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <h2 class="mb-3">Address</h2>
                                <div class="col-md">
                                    <div class="form-floating">
                                        <textarea required name="address" id="address" class="form-control"
                                                  placeholder="Address"></textarea>
                                        <label for="address" class="form-label">City, street name and post code</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <h2 class="mb-3">Other Information</h2>
                                <div class="col-md-4 mb-3">
                                    <div class="form-floating">
                                        <input required type="text" class="form-control" id="phoneNumber"
                                               name="phoneNumber" placeholder="Phone number">
                                        <label for="phoneNumber" class="form-label">Phone number</label>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <div class="form-floating">
                                        <input required type="date" class="form-control" id="birthDate"
                                               name="dateOfBirth" placeholder="birthDate">
                                        <label for="birthDate" class="form-label">Birth Date</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <select required class="form-select" id="gender" name="gender"
                                                aria-label="Gender">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                        <label for="gender" class="form-label">Gender</label>
                                    </div>
                                </div>
                            </div>

                            <h2 class="mb-3">Credentials</h2>
                            <div class="row mb-3">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input required type="email" class="form-control" id="email" name="email"
                                               placeholder="Email">
                                        <label for="email" class="form-label">Email</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 mb-3">
                                    <div class="form-floating">
                                        <input required type="password" class="form-control" id="password"
                                               name="password" placeholder="Password">
                                        <label for="password" class="form-label">Password</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input required type="password" class="form-control" id="confirmPassword"
                                               name="confirmPassword" placeholder="Password">
                                        <label for="confirmPassword" class="form-label">Confirm password</label>
                                    </div>
                                </div>
                            </div>

                            <script>
                                function setMaxDate() {
                                    document.getElementById("birthDate").max = new Date().toISOString().split("T")[0];
                                }

                                setMaxDate()
                            </script>

                            <button type="submit" class="btn btn-primary fs-4" name="register">Register</button>
                            <label class="m-2 text-danger"><?= $error ?></label>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<?php
include __DIR__ . '/../footer.php'; ?>
