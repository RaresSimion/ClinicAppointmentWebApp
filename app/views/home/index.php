<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include __DIR__ . '/../header.php';
?>

<div class="card text-bg-dark text-center">
    <img src="home_banner.jpg" class="card-img" alt="..." style="max-height: 25rem; opacity: 55%">
    <div class="card-img-overlay">
        <h1 class="card-title mt-5 text-center">
            <?php
            if (isset($_SESSION['success'])) {
                echo "Hello, $firstName! Welcome to Miracle Clinic!";
            } else
                echo "Welcome to Miracle Clinic!";
            ?>
        </h1>
    </div>
</div>

<div class="row mt-5">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">About us</h1>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <img src="medicine.jpg" class="img-thumbnail rounded-start" alt="medical">
                </div>
                <div class="col-lg-8">
                    <div class="card-body">
                        <p class="card-text fs-5" style="text-indent: 50px"> Miracle Clinic is a state-of-the-art
                            medical facility founded by two Amsterdam UMC classmates with a shared passion for providing
                            high-quality, patient-centered healthcare. Our clinic offers a wide range of services
                            including pediatrics, psychiatry, and general surgery. </p>
                        <p class="card-text fs-5" style="text-indent: 50px"> We pride ourselves on our commitment to
                            evidence-based medicine and the use of cutting-edge technology to ensure the best possible
                            outcomes for our patients.
                            Our experienced and compassionate team of doctors, nurses, and support staff are dedicated
                            to making your visit as comfortable and stress-free as possible.</p>
                        <p class="card-text fs-5" style="text-indent: 50px"> At Miracle Clinic, we believe that every
                            patient deserves the best possible care, and we strive to make that a reality for everyone
                            who walks through our doors.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include __DIR__ . '/../footer.php';
?>
