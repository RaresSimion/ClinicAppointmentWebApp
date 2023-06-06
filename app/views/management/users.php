<?php
include __DIR__ . '/../header.php';
?>

    <h1 class="text-center mb-3">Users</h1>

    <div class="table table-responsive">
        <table class="table text-center">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First name</th>
                <th scope="col">Last name</th>
                <th scope="col">Address</th>
                <th scope="col">Phone number</th>
                <th scope="col">Date of birth</th>
                <th scope="col">Gender</th>
                <th scope="col">Email</th>
                <th scope="col">User type</th>
                <th scope="col">Delete</th>
                <th scope="col">Promote</th>
            </tr>
            </thead>
            <tbody class="table-group-divider" id="usersTable">

            <script>
                function loadUsers() {
                    const table = document.getElementById("usersTable");
                    table.innerHTML = '';

                    fetch('http://localhost/api/users')
                        .then(result => result.json())
                        .then((users) => {
                            users.forEach(user => {
                                appendUser(user);
                            })
                            console.log(users);
                        })
                }

                function appendUser(user) {
                    const newRow = document.createElement("tr");
                    const idCol = document.createElement("th");
                    const firstNameCol = document.createElement("td");
                    const lastNameCol = document.createElement("td");
                    const addressCol = document.createElement("td");
                    const phoneNumberCol = document.createElement("td");
                    const dateOfBirthCol = document.createElement("td");
                    const genderCol = document.createElement("td");
                    const emailCol = document.createElement("td");
                    const userTypeCol = document.createElement("td");
                    const deleteButtonCol = document.createElement("td");
                    const adminButtonCol = document.createElement("td");
                    const deleteButton = document.createElement("button");
                    const adminButton = document.createElement("button");

                    deleteButton.className = "btn btn-danger";
                    deleteButton.type = "button";
                    adminButton.className = "btn btn-success";
                    adminButton.type = "button";
                    adminButton.id = user.id;
                    idCol.scope = "row";

                    idCol.innerHTML = user.id;
                    firstNameCol.innerHTML = user.first_name;
                    lastNameCol.innerHTML = user.last_name;
                    addressCol.innerHTML = user.address;
                    phoneNumberCol.innerHTML = user.phone_number;
                    dateOfBirthCol.innerHTML = user.date_of_birth;
                    genderCol.innerHTML = user.gender;
                    emailCol.innerHTML = user.email;

                    if (user.user_type == 1) {
                        userTypeCol.innerHTML = "Admin";
                        adminButtonCol.innerHTML = "Already admin";
                    } else {
                        userTypeCol.innerHTML = "Regular";
                        adminButton.innerHTML = "Make admin";
                        adminButton.addEventListener('click', function () {
                            makeAdmin(user.id);
                        })
                        adminButtonCol.appendChild(adminButton)
                    }

                    deleteButton.innerHTML = "Delete";
                    adminButton.innerHTML = "Make admin";
                    deleteButton.addEventListener('click', function () {
                        deleteUser(user.id);
                        table.removeChild(newRow);
                    })

                    deleteButtonCol.appendChild(deleteButton);
                    newRow.appendChild(idCol);
                    newRow.appendChild(firstNameCol);
                    newRow.appendChild(lastNameCol);
                    newRow.appendChild(addressCol);
                    newRow.appendChild(phoneNumberCol);
                    newRow.appendChild(dateOfBirthCol);
                    newRow.appendChild(genderCol);
                    newRow.appendChild(emailCol);
                    newRow.appendChild(userTypeCol);
                    newRow.appendChild(deleteButtonCol);
                    newRow.appendChild(adminButtonCol);

                    const table = document.getElementById("usersTable");
                    table.appendChild(newRow);
                }

                function deleteUser(userId) {

                    const obj = {id: userId};
                    fetch('http://localhost/api/users', {
                        method: 'POST',
                        headers: {'Content-Type': 'application/json'},
                        body: JSON.stringify(obj),
                    }).then(result => {
                        console.log(result)
                    });
                }

                function makeAdmin(userId) {

                    const obj = {id: userId};
                    fetch('http://localhost/api/users/update', {
                        method: 'POST',
                        headers: {'Content-Type': 'application/json'},
                        body: JSON.stringify(obj),
                    }).then(result => {
                        console.log(result)
                        loadUsers();
                    });
                }

                loadUsers();
            </script>
            </tbody>
        </table>
    </div>


<?php
include __DIR__ . '/../footer.php';
?>