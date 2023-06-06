<?php
include __DIR__ . '/../header.php';
?>

    <h1 class="text-center mb-3">Doctors</h1>
    <a href="/management/addDoctor" class="btn btn-primary mb-3">Add doctor</a>
    <div class="table table-responsive">
        <table class="table text-center">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Section</th>
                <th scope="col">Email</th>
                <th scope="col">Date of birth</th>
                <th scope="col">Phone number</th>
                <th scope="col">Delete</th>
                <th scope="col">Edit</th>
            </tr>
            </thead>
            <tbody class="table-group-divider" id="doctorsTable">

            <script>
                function loadDoctors() {
                    fetch('http://localhost/api/doctors')
                        .then(result => result.json())
                        .then((doctors) => {
                            doctors.forEach(doctor => {
                                appendDoctor(doctor);
                            })
                            console.log(doctors);
                        })
                }

                function appendDoctor(doctor) {
                    const newRow = document.createElement("tr");
                    const idCol = document.createElement("th");
                    const nameCol = document.createElement("td");
                    const sectionCol = document.createElement("td");
                    const emailCol = document.createElement("td");
                    const dateOfBirthCol = document.createElement("td");
                    const phoneNumberCol = document.createElement("td");
                    const deleteButtonCol = document.createElement("td");
                    const editButtonCol = document.createElement("td");
                    const sectionLink = document.createElement("a");
                    const deleteButton = document.createElement("button")
                    const editButton = document.createElement("button")
                    const editForm = document.createElement("form");
                    const idInput = document.createElement("input");
                    editForm.method = "POST";
                    editForm.action = "/management/editDoctor";

                    deleteButton.className = "btn btn-danger";
                    editButton.className = "btn btn-warning";
                    deleteButton.type = "button";
                    editButton.type = "submit";
                    sectionLink.href = "/management/sections";
                    idCol.scope = "row";
                    idInput.type = "hidden";

                    idInput.name = "doctorId";
                    idInput.value = doctor.id;
                    idCol.innerHTML = doctor.id;
                    nameCol.innerHTML = doctor.name;
                    sectionLink.innerHTML = doctor.section;
                    emailCol.innerHTML = doctor.email;
                    dateOfBirthCol.innerHTML = doctor.date_of_birth;
                    phoneNumberCol.innerHTML = doctor.phone_number;
                    deleteButton.innerHTML = "Delete";
                    editButton.innerHTML = "Edit";

                    deleteButton.addEventListener('click', function () {
                        deleteDoctor(doctor.id);
                        table.removeChild(newRow);
                    })

                    editForm.appendChild(editButton);
                    editForm.appendChild(idInput);

                    deleteButtonCol.appendChild(deleteButton);
                    editButtonCol.appendChild(editForm);

                    sectionCol.appendChild(sectionLink);

                    newRow.appendChild(idCol);
                    newRow.appendChild(nameCol);
                    newRow.appendChild(sectionCol);
                    newRow.appendChild(emailCol);
                    newRow.appendChild(dateOfBirthCol);
                    newRow.appendChild(phoneNumberCol);
                    newRow.appendChild(deleteButtonCol);
                    newRow.appendChild(editButtonCol);

                    const table = document.getElementById("doctorsTable");
                    table.appendChild(newRow);
                }

                function deleteDoctor(doctorId) {

                    const obj = {id: doctorId};
                    fetch('http://localhost/api/doctors', {
                        method: 'POST',
                        headers: {'Content-Type': 'application/json'},
                        body: JSON.stringify(obj),
                    }).then(result => {
                        console.log(result)
                    });
                }

                loadDoctors();
            </script>
            </tbody>
        </table>
    </div>


<?php
include __DIR__ . '/../footer.php';
?>