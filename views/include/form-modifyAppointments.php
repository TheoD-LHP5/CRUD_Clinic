<form action="" method="POST">

    <div class="text-left">
        <label class="label" for="patientId">Please select a patient</label>
        <span class="error"><?= $errors['patientId'] ?? '' ?></span>
    </div>

    <div class="input-group input-group-sm mb-3">
        <select class="form-select" name="patientId" id="patientId">
            <option selected disabled>Choise a patient</option>
            <?php
                foreach ($selectPatientsArray as $patient) { ?>
                    <option value="<?= $patient['id'] ?>"
                        <?= $patient['id'] == $appointmentDetailsArray['patientId']  ? 'selected' : '' ?>>
                        <?= $patient['lastname'] . ' ' . $patient['firstname']?>
                    </option>
            <?php } ?>
        </select>
    </div>

    <div class="text-left">
        <label class="label" for="dateAppointment">Date of appointment</label>
        <span class="error"><?= $errors['dateAppointment'] ?? '' ?></span>
    </div>

    <div class="input-group input-group-sm mb-3">
        <input id="dateAppointment" name="dateAppointment" type="date" class="form-control" value="<?= $appointmentDetailsArray['date'] ?>" required>
    </div>

    <div class="text-left">
        <label class="label" for="hourAppointment">Please select a time for the appointment</label>
        <span class="error"><?= $errors['hourAppointment'] ?? '' ?></span>
    </div>

    <div class="input-group input-group-sm mb-3">
        <select class="form-select" name="hourAppointment" id="hourAppointment">
            <option selected disabled>Choice the time</option>
            <?php
                for ($openHour; $openHour <= $closeHour; $openHour++) {
                // Condition pour ne pas avoir de rendez-vous sur l'heure du déjeuner
                if ($openHour == $specialHour) {
                    continue;
            } ?>
            <option <?= $openHour == $appointmentDetailsArray['hour'] ? 'selected' : '' ?>><?= $openHour . ':00' ?></option>
            <?php } ?>
        </select>
    </div>

    <button type="submit" class="btn btn-sm btn-success" name="ModifyAppointmentBtn">register</button>
    <a type="button" href="view-listAppointments.php" class="btn btn-sm btn-outline-danger">cancel</a>

</form>