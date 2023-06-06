<?php
include __DIR__ . '/../header.php';
?>
    <form onsubmit="sendForm();return false">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div id="liveAlertPlaceholder"></div>
                    <h1 class="text-center mb-4">Appointment</h1>
                    <div class="card bg-light">
                        <h3 class="text-center m-3 text-danger" <?php if (isset($_SESSION['success']))
                            echo "hidden";
                        ?>>You must be logged in to book an appointment.</h3>

                        <div class="card-body" <?php if (!isset($_SESSION['success']))
                            echo "hidden";
                        ?>>
                            <form>

                                <div class="row mb-3">
                                    <h2 class="mb-3">Fill in the form to book your appointment</h2>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <select oninput="updateDoctorOptions()" class="form-select" id="section"
                                                    name="section" aria-label="Section">
                                                <option selected value="0">All sections</option>
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
                                                        const newOption = document.createElement("option");
                                                        newOption.value = section.id;
                                                        newOption.innerHTML = section.name;

                                                        const sectionSelect = document.getElementById('section');
                                                        sectionSelect.appendChild(newOption);
                                                    }

                                                    loadSections();
                                                </script>
                                            </select>
                                            <label for="section" class="form-label">Section</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <select required class="form-select" id="doctor" name="doctor"
                                                    aria-label="Doctor">

                                            </select>
                                            <label for="section" class="form-label">Doctors</label>
                                        </div>
                                    </div>

                                </div>

                                <div class="row mb-3">

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input required type="date" class="form-control" id="date" name="date"
                                                   placeholder="Date">
                                            <script>
                                                function setCalendarDate() {
                                                    const today = new Date();
                                                    const tomorrow = new Date(today);
                                                    tomorrow.setDate(tomorrow.getDate() + 1);
                                                    document.getElementById("date").min = tomorrow.toISOString().split("T")[0];
                                                }

                                                setCalendarDate();
                                            </script>
                                            <label for="date" class="form-label">Appointment date</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input required type="time" min="09:00" max="16:00" value="09:00"
                                                   class="form-control" id="time" name="time" placeholder="Time">
                                            <label for="time" class="form-label">Appointment hour</label>
                                        </div>
                                    </div>

                                </div>


                                <button type="submit" class="btn btn-primary" name="confirmAppointment">Confirm</button>
                                <label class="m-2 text-danger"></label>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        function updateDoctorOptions() {
            const sectionSelect = document.getElementById('section').value;
            fetch('http://localhost/api/doctors')
                .then(result => result.json())
                .then((doctors) => {
                    doctors.forEach(doctor => {
                        if (checkDoctorOption(doctor))
                            removeDoctorOption(doctor);
                        if (sectionSelect == 0)
                            appendDoctorOption(doctor);
                        else {
                            if (doctor.section == sectionSelect)
                                appendDoctorOption(doctor);
                        }
                    })
                    console.log(doctors);
                })
        }

        function appendDoctorOption(doctor) {
            const newOption = document.createElement("option");
            newOption.id = doctor.id;
            newOption.value = doctor.id;
            newOption.innerHTML = "Dr. " + doctor.name;

            const doctorSelect = document.getElementById("doctor");
            doctorSelect.appendChild(newOption);
        }

        function removeDoctorOption(doctor) {
            const id = doctor.id;
            const option = document.getElementById(id);
            option.remove();
        }

        function checkDoctorOption(doctor) {
            const id = doctor.id;
            const option = document.getElementById(id);
            return option != null;
        }

        function sendForm() {
            const doctor = document.getElementById('doctor').value;
            const date = document.getElementById('date').value;
            const time = document.getElementById('time').value;
            const obj = {doctor: doctor, date: date, time: time};


            fetch('http://localhost/api/appointments', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify(obj),
            }).then(result => {
                console.log(result)
                alert('Your appointment has been successfully booked!', 'success')
            });

        }

        const alertPlaceholder = document.getElementById('liveAlertPlaceholder')

        const alert = (message, type) => {
            const wrapper = document.createElement('div')
            wrapper.innerHTML = [
                `<div class="alert alert-${type} alert-dismissible" role="alert">`,
                `   <div>${message}</div>`,
                '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
                '</div>'
            ].join('')

            alertPlaceholder.append(wrapper)
        }

        updateDoctorOptions();
    </script>

<?php
include __DIR__ . '/../footer.php';
?>