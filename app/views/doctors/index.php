<?php
include __DIR__ . '/../header.php';
?>

        <h1 class="text-center mb-3">Our specialists</h1>

        <div class="form-floating">
            <select oninput="filterDoctors()" class="form-select" id="section" name="section" aria-label="Section">
                <option selected value="0">All sections</option>


            </select>
            <label for="section" class="form-label">Section</label>
        </div>
        <div class="row" id="doctorRow">
        <script>

            function appendDoctorCard(doctor) {

                const doctorRow = document.getElementById('doctorRow');
                const newColumn = document.createElement("div");
                const newCard = document.createElement("div");
                const cardRow = document.createElement("div");
                const imageCol = document.createElement("div");
                const image = document.createElement("img");
                const bodyCol = document.createElement("div");
                const newCardBody = document.createElement("div");
                const doctorName = document.createElement("h5");
                const doctorSection = document.createElement("p");
                const doctorContact = document.createElement("p");

                newColumn.className = "col-lg-6 col-xs-12 col-md-6 col-sm-6 mt-4 p-3 align-items-stretch";
                newColumn.id = doctor.id;
                newCard.className = "card mb-3";
                cardRow.className = "row g-0";
                imageCol.className = "col-md-4";
                image.className = "img-thumbnail";
                bodyCol.className = "col-md-8"
                newCardBody.className = "card-body";
                doctorName.className = "card-title fs-3";
                doctorSection.className = "card-text fs-4 mb-5";
                doctorContact.className = "card-text fs-5";

                let imageUrl = "doctor" + doctor.id + ".jpg";
                if (imageExists(imageUrl))
                    image.src = imageUrl;
                else
                    image.src = "default.jpg";

                image.addEventListener("load", function () {
                    this.style.width = "250px";
                    this.style.height = "250px";
                })

                doctorName.innerHTML = doctor.name + ", " + calculateAge(doctor.date_of_birth) + "yo.";

                fetch('http://localhost/api/sections')
                    .then(result => result.json())
                    .then((sections) => {
                        sections.forEach(section => {
                            if (section.id == doctor.section) {
                                doctorSection.innerHTML = section.name;
                            }
                        })
                    })

                doctorContact.innerHTML = doctor.email;
                doctorContact.appendChild(document.createElement("br"));
                doctorContact.innerHTML += doctor.phone_number;
                newCardBody.appendChild(doctorName);
                newCardBody.appendChild(doctorSection);
                newCardBody.appendChild(doctorContact);
                bodyCol.appendChild(newCardBody);
                imageCol.appendChild(image);
                cardRow.appendChild(imageCol);
                cardRow.appendChild(bodyCol);
                newCard.appendChild(cardRow);
                newColumn.appendChild(newCard);
                doctorRow.appendChild(newColumn);
            }

            function removeDoctorCard(doctor) {
                const id = doctor.id;
                const column = document.getElementById(id);
                column.remove();
            }


            function filterDoctors() {
                const sectionSelect = document.getElementById('section').value;
                fetch('http://localhost/api/doctors')
                    .then(result => result.json())
                    .then((doctors) => {
                        doctors.forEach(doctor => {
                            if (checkDoctorCard(doctor))
                                removeDoctorCard(doctor);
                            if (sectionSelect == 0)
                                appendDoctorCard(doctor);
                            else {
                                if (doctor.section == sectionSelect)
                                    appendDoctorCard(doctor);
                            }
                        })
                        console.log(doctors);
                    })
            }

            function checkDoctorCard(doctor) {
                const id = doctor.id;
                const column = document.getElementById(id);
                if (column == null)
                    return false;
                else
                    return true;
            }

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
                const newOption = document.createElement("option");
                newOption.value = section.id;
                newOption.innerHTML = section.name;

                const sectionSelect = document.getElementById('section');
                sectionSelect.appendChild(newOption);
            }

            function calculateAge(dateString) {
                var dob = new Date(dateString);
                var month_diff = Date.now() - dob.getTime();
                var age_dt = new Date(month_diff);
                var year = age_dt.getUTCFullYear();
                var age = Math.abs(year - 1970);

                return age;
            }

            function imageExists(image_url) {

                var http = new XMLHttpRequest();

                http.open('HEAD', image_url, false);
                http.send();

                return http.status != 404;

            }

            loadSections();
            filterDoctors();

            var images = document.getElementsByClassName("img-thumbnail");

            function setDimensions() {
                var screenWidth = window.innerWidth;
                var width = "100%";
                var height = "auto";

                if (screenWidth > 768) {
                    width = "250px";
                    height = "250px";
                } else if (screenWidth > 576) {
                    width = "350px";
                    height = "450px";
                } else {
                    width = "470px";
                    height = "450px";
                }

                for (var i = 0; i < images.length; i++) {
                    images[i].style.width = width;
                    images[i].style.height = height;
                }
            }

            setDimensions();
            window.addEventListener("resize", setDimensions);
        </script>
    </div>

<?php
include __DIR__ . '/../footer.php';
?>