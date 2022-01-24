<form method="POST" action="view-modifyAppointments.php" class="col-12 col-sm-8 col-md-4 mt-1 pb-3 d-flex flex-column">

    <div class="form-group">
        <label for="patientId">Lastname</label>
        <input type="text" id="patient" name="patient" aria-label="patient" class="form-control text-center" placeholder="LASTNAME" value="<?= $detailsAppointmentArray['patient'] ?? '' ?>" disabled>
    </div>

    <div class="form-group">
        <label for="dateAppointment">Date</label>
        <div class="input-group input-group-sm mb-3">
            <?php
        if (isset($detailsAppointmentArray['date'])) {
            $date = date_create($detailsAppointmentArray['date']);
            $dateFr = date_format($date, 'd/y/Y');
        } ?>
            <input type="text" id="dateAppointment" name="dateAppointment" aria-label="dateAppointment" class="form-control text-center" value="<?= $dateFr ?? '' ?>" disabled>
        </div>
    </div>

    <div class="form-group">
        <label for="hourAppointment">Heure</label>
        <input type="text" id="hourAppointment" name="hourAppointment" aria-label="hourAppointment" class="form-control text-center" value="<?= $detailsAppointmentArray['hour'] ?? '' ?>" disabled>
    </div>

    <form action="view-modifyAppointments.php" method="POST">
        <button type="submit" class="btn btn-sm btn-dark" name="modifyAppointment" value="<?= $detailsAppointmentArray['id'] ?>">Modify appointment</button>
    </form>

</form>