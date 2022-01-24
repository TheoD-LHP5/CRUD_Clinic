<form method="POST" action="" name="addPatient" class="col-12 col-sm-8 col-md-4 mt-5 pb-3 d-flex flex-column">

    <legend class="pt-3 text-uppercase text-center titleForm">add appointment</legend>

    <div class="form-group">
        <label for="patientId"></label>

        <select class="custom-select" aria-label="Galeries" id="patientId" name="patientId" required>
            <option disabled selected>Choose a patient</option>
            <?php foreach ($selectPatientsArray as $value) { ?>
            <option value="<?= $value["id"] ?>"><?= $value["lastname"] . " " . $value["firstname"] ?></option>
            <?php } ?>
        </select>
        <div>
            <span class="textError"><?= isset($errorMessages["patientId"]) ? $errorMessages["patientId"] : "" ?></span>
        </div>
    </div>

    <div class="form-group">
        <label for="dateAppointment"></label>
        <input type="date" id="dateAppointment" name="dateAppointment" aria-label="Date de naissance" class="form-control text-center" placeholder="Birthdate" value="<?= isset($_POST["dateAppointment"]) ? $_POST["dateAppointment"] : "" ?>" required>
        <div>
            <span class="textError"><?= isset($errorMessages["dateAppointment"]) ? $errorMessages["dateAppointment"] : "" ?></span>
        </div>
    </div>

    <div class="form-group">
        <label for="hourAppointment"></label>
        <select class="custom-select" aria-label="Galeries" id="hourAppointment" name="hourAppointment" required>
            <option disabled selected>Choose the time</option>
            <?php
            for($openHour;$openHour <= $closeHour; $openHour++) {
                if($openHour == $specialHour){
                    continue;
                }
            ?>
            <option><?= $openHour . ":00" ?></option>
            <?php } ?>
        </select>
        <div>
            <span class="textError"><?= isset($errorMessages["hourAppointment"]) ? $errorMessages["hourAppointment"] : "" ?></span>
        </div>
    </div>

    <button class="btn btnConnexion mt-3" type="submit" name="addAppointmentBtn">add the appointment</button>
    <div class="mt-1 d-flex justify-content-center">
        <a type="button" href="../index.php" class="btn btnBack mr-3 mt-3">back</a>
        <a type="button" href="view-listPatients.php" class="btn btnConnexion ml-3 mt-3">patient list</a>
    </div>

</form>