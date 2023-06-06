<?php
include __DIR__ . '/../header.php';
?>
    <h1 class="text-center mb-3">Clinic sections</h1>

    <div class="card bg-light text-center mb-4">
        <h3 class="mt-3">Add section</h3>
        <div class="card-body">
            <form onsubmit="sendForm();return false" method="post">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="section" name="section" placeholder="Section"
                                   required>
                            <label for="section" class="form-label">Section name</label>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" name="addSection">Add section</button>
            </form>
        </div>
    </div>


    <div class="table table-responsive">
        <table class="table text-center">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Delete</th>
                <th scope="col">Edit</th>
            </tr>
            </thead>
            <tbody class="table-group-divider" id="sectionsTable">

            <script>

                function loadSections() {
                    const table = document.getElementById("sectionsTable");
                    table.innerHTML = '';
                    fetch('http://localhost/api/sections/display')
                        .then(result => result.json())
                        .then((sections) => {
                            sections.forEach(section => {
                                appendSection(section);
                            })
                            console.log(sections);
                        })
                }

                function appendSection(section) {
                    const newRow = document.createElement("tr");
                    const idCol = document.createElement("th");
                    const nameCol = document.createElement("td");
                    const deleteButtonCol = document.createElement("td");
                    const editButtonCol = document.createElement("td");
                    const deleteButton = document.createElement("button")
                    const editButton = document.createElement("button")
                    const editForm = document.createElement("form");
                    const idInput = document.createElement("input");
                    const nameInput = document.createElement("input");
                    editForm.method = "POST";
                    editForm.action = "/management/editSection";

                    deleteButton.className = "btn btn-danger";
                    editButton.className = "btn btn-warning";
                    deleteButton.type = "button";
                    editButton.type = "submit";
                    idCol.scope = "row";
                    idInput.type = "hidden";
                    nameInput.type = "hidden";

                    idInput.name = "sectionId";
                    idInput.value = section.id;
                    nameInput.name = "sectionName";
                    nameInput.value = section.name;
                    idCol.innerHTML = section.id;
                    nameCol.innerHTML = section.name;
                    deleteButton.innerHTML = "Delete";
                    editButton.innerHTML = "Edit";

                    deleteButton.addEventListener('click', function () {
                        deleteSection(section.id);
                        table.removeChild(newRow);
                    })

                    editForm.appendChild(editButton);
                    editForm.appendChild(idInput);
                    editForm.appendChild(nameInput);
                    deleteButtonCol.appendChild(deleteButton);
                    editButtonCol.appendChild(editForm);
                    newRow.appendChild(idCol);
                    newRow.appendChild(nameCol);
                    newRow.appendChild(deleteButtonCol);
                    newRow.appendChild(editButtonCol);

                    const table = document.getElementById("sectionsTable");
                    table.appendChild(newRow);
                }

                function deleteSection(sectionId) {

                    const obj = {id: sectionId};
                    fetch('http://localhost/api/sections/delete', {
                        method: 'POST',
                        headers: {'Content-Type': 'application/json'},
                        body: JSON.stringify(obj),
                    }).then(result => {
                        console.log(result)
                    });
                }

                function sendForm() {
                    const name = document.getElementById('section').value;
                    const obj = {name: name};
                    fetch('http://localhost/api/sections', {
                        method: 'POST',
                        headers: {'Content-Type': 'application/json'},
                        body: JSON.stringify(obj),
                    }).then(result => {
                        console.log(result)
                        loadSections();
                    });

                    document.getElementById('section').value = '';
                }

                loadSections();
            </script>
            </tbody>
        </table>
    </div>


<?php
include __DIR__ . '/../footer.php';
?>