<?php
include __DIR__ . '/../header.php';
?>
    <form method="post" action="/home/editAppointment">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <h1 class="text-center mb-4">Edit appointment</h1>
                    <div class="card bg-light">
                        <div class="card-body">
                            <form>

                                <div class="row mb-3">
                                    <h2 class="mb-3">Select a new date or time</h2>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input required type="date" class="form-control" id="date" name="date"
                                                   value="<?= $date ?>" placeholder="Date">
                                            <label for="date" class="form-label">Appointment date</label>
                                        </div>
                                    </div>

                                    <script>
                                        function setCalendarDate() {
                                            const today = new Date();
                                            const tomorrow = new Date(today);
                                            tomorrow.setDate(tomorrow.getDate() + 1);

                                            document.getElementById("date").min = tomorrow.toISOString().split("T")[0];
                                        }

                                        setCalendarDate();
                                    </script>

                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input required type="time" min="09:00" max="16:00" value="<?= $time ?>"
                                                   class="form-control" id="time" name="time" placeholder="Time">
                                            <label for="time" class="form-label">Appointment hour</label>
                                        </div>
                                    </div>

                                </div>


                                <button type="submit" class="btn btn-primary" name="editAppointment">Confirm changes
                                </button>
                                <a href="/home/appointments" class="btn btn-warning">Cancel</a>
                                <label class="m-2 text-danger"></label>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

<?php
include __DIR__ . '/../footer.php';
?>