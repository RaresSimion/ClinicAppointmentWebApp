<?php
include __DIR__ . '/../header.php';
?>

    <h1 class="text-center mb-3">My appointments</h1>


    <div class="row" id="appointmentRow">
        <script>
            function loadAppointments() {
                fetch('http://localhost/api/appointments')
                    .then(result => result.json())
                    .then((appointments) => {
                        appointments.forEach(appointment => {
                            appendAppointmentCard(appointment);
                        })
                        console.log(appointments);
                    })
            }

            function appendAppointmentCard(appointment) {

                const appointmentRow = document.getElementById('appointmentRow');

                const newColumn = document.createElement("div");
                const newCard = document.createElement("div");
                const newCardBody = document.createElement("div");
                const appointmentTitle = document.createElement("h2");
                const appointmentDoctor = document.createElement("p");
                const appointmentDate = document.createElement("p");
                const appointmentTime = document.createElement("p");
                const deleteButton = document.createElement("button")
                const editButton = document.createElement("button")
                const editForm = document.createElement("form");
                const idInput = document.createElement("input");
                editForm.method = "POST";
                editForm.action = "/home/editAppointment";

                idInput.name = "appointmentId";
                idInput.value = appointment.id;
                idInput.type = "hidden";
                newColumn.className = "col-lg-6 col-xs-12 col-md-4 my-lg-2 p-2";
                newColumn.id = appointment.id;
                newCard.className = "card mb-3 bg-info";
                newCardBody.className = "card-body";
                appointmentTitle.className = "card-title text-center mb-3";
                appointmentDoctor.className = "card-text fs-4 mb-3";
                appointmentDate.className = "card-text fs-4 mb-3";
                appointmentTime.className = "card-text fs-4 mb-3";
                deleteButton.className = "btn btn-danger float-end"
                deleteButton.type = "button";
                editButton.className = "btn btn-warning float-start";
                editButton.type = "submit";

                deleteButton.addEventListener('click', function () {
                    deleteAppointment(appointment.id);
                    appointmentRow.removeChild(newColumn);
                })

                fetch('http://localhost/api/doctors')
                    .then(result => result.json())
                    .then((doctors) => {
                        doctors.forEach(doctor => {
                            if (doctor.id === appointment.doctor_id) {
                                fetch('http://localhost/api/sections')
                                    .then(result => result.json())
                                    .then((sections) => {
                                        sections.forEach(section => {
                                            if (section.id === doctor.section) {
                                                appointmentTitle.innerHTML = section.name + " appointment";
                                            }
                                        })
                                    })

                                appointmentDoctor.innerHTML = "Doctor: " + doctor.name;
                            }
                        })
                    })

                appointmentDate.innerHTML = "Date: " + appointment.date;
                appointmentTime.innerHTML = "Time: " + appointment.time;
                deleteButton.innerHTML = "Delete";
                editButton.innerHTML = "Edit";

                editForm.appendChild(idInput);
                editForm.appendChild(editButton);

                newCardBody.appendChild(appointmentTitle);
                newCardBody.appendChild(appointmentDoctor);
                newCardBody.appendChild(appointmentDate);
                newCardBody.appendChild(appointmentTime);
                newCardBody.appendChild(deleteButton);
                newCardBody.appendChild(editForm);

                newCard.appendChild(newCardBody);
                newColumn.appendChild(newCard);
                appointmentRow.appendChild(newColumn);
            }

            function deleteAppointment(appointmentId) {

                const obj = {id: appointmentId};
                fetch('http://localhost/api/appointments/delete', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'},
                    body: JSON.stringify(obj),
                }).then(result => {
                    console.log(result)
                });
            }

            loadAppointments();
        </script>
    </div>

<?php
include __DIR__ . '/../footer.php';
?>