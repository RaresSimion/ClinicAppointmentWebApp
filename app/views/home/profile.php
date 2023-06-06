<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include __DIR__ . '/../header.php';
?>

    <div class="row">
        <div class="col-md-6 col-sm-12 mx-auto">
            <div class="card mb-3">
                <div class="card-body">

                    <h1 class="card-title text-center mb-5">Your details</h1>
                    <div class="row mb-5">
                        <div class="col-md-6 text-center">
                            <h3>First Name</h3>
                            <p class="card-text fs-4"><?= $firstName ?></p>
                        </div>

                        <div class="col-md-6 text-center">
                            <h3>Last Name</h3>
                            <p class="card-text fs-4"><?= $lastName ?></p>
                        </div>
                    </div>

                    <div class="row mb-5">
                        <div class="col-md-12 text-center">
                            <h3>Address</h3>
                            <p class="card-text fs-4"><?= $address ?></p>
                        </div>
                    </div>

                    <div class="row mb-5">
                        <div class="col-md-6 text-center">
                            <h3>Date of birth</h3>
                            <p class="card-text fs-4"><?= $dateOfBirth ?></p>
                        </div>

                        <div class="col-md-6 text-center">
                            <h3>Gender</h3>
                            <p class="card-text fs-4"><?= $gender ?></p>
                        </div>
                    </div>

                    <div class="row mb-5">
                        <div class="col-md-6 text-center">
                            <h3>Phone number</h3>
                            <p class="card-text fs-4"><?= $phoneNumber ?></p>
                        </div>

                        <div class="col-md-6 text-center">
                            <h3>Email</h3>
                            <p class="card-text fs-4"><?= $email ?></p>
                        </div>
                    </div>


                    <a href="/home/editProfile" class="btn btn-primary">Edit your information</a>
                </div>
            </div>
        </div>
    </div>

<?php
include __DIR__ . '/../footer.php'; ?>