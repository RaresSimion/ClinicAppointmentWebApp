<?php
include __DIR__ . '/../header.php';

?>

<form action="/management/editDoctor" method="post">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 mx-auto">
                <h1 class="text-center mb-4">Edit doctor information</h1>
                <div class="card bg-light">
                    <div class="card-body">
                        <form>

                            <div class="row mb-3">
                                <h2 class="mb-3">Name & email</h2>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input required type="text" class="form-control" id="name" name="name"
                                               value="<?= $doctorName ?>" placeholder="John">
                                        <label for="name" class="form-label">Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input required type="email" class="form-control" id="email" name="email"
                                               value="<?= $doctorEmail ?>" placeholder="Email">
                                        <label for="email" class="form-label">Email</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <h2 class="mb-3">Section</h2>
                                <h2 class="mb-3" hidden id="doctorSection"><?= $doctorSection ?></h2>
                                <div class="col-md">
                                    <div class="form-floating">
                                        <select required class="form-select" id="section" name="section"
                                                aria-label="Section">

                                            <script>
                                                function loadSections() {
                                                    fetch('http://localhost/api/sections')
                                                        .then(result => result.json())
                                                        .then((sections) => {
                                                            sections.forEach(section => {
                                                                appendSectionOption(section);
                                                            })
                                                            console.log(sections);
                                                        })
                                                }

                                                function appendSectionOption(section) {
                                                    const doctorSection = document.getElementById('doctorSection').innerHTML;
                                                    const newOption = document.createElement("option");
                                                    newOption.value = section.id;
                                                    newOption.innerHTML = section.name
                                                    if (doctorSection == section.id)
                                                        newOption.selected = true;

                                                    const sectionSelect = document.getElementById('section');
                                                    sectionSelect.appendChild(newOption);
                                                }

                                                loadSections();
                                            </script>
                                        </select>
                                        <label for="section" class="form-label">Section</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <h2 class="mb-3">Other Information</h2>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input required type="text" class="form-control" id="phoneNumber"
                                               name="phoneNumber" value="<?= $doctorPhoneNumber ?>"
                                               placeholder="Phone number">
                                        <label for="phoneNumber" class="form-label">Phone number</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input required type="date" class="form-control" id="birthDate"
                                               name="dateOfBirth" value="<?= $doctorDateOfBirth ?>"
                                               placeholder="birthDate">
                                        <label for="birthDate" class="form-label">Birth Date</label>
                                    </div>
                                </div>

                                <script>
                                    function setMaxDate() {
                                        document.getElementById("birthDate").max = new Date().toISOString().split("T")[0];
                                    }

                                    setMaxDate()
                                </script>
                            </div>


                            <button type="submit" class="btn btn-primary" name="editDoctor">Confirm changes</button>
                            <a href="/management/doctors" class="btn btn-warning">Cancel</a>

                            <label class="m-2 text-danger"></label>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<?php
include __DIR__ . '/../footer.php'; ?>
