<form method="POST" action="view-modifyPatients.php" name="addPatient" class="col-12 col-sm-8 col-md-4 mt-1 pb-3 d-flex flex-column">

    <p class="h2 test"><?= $errorMessages["addPatient"] ?? '' ?></p>

    <div class="form-group">
        <label for="lastname">Lastname</label>
        <input type="text" id="lastname" name="lastname" aria-label="lastname" class="form-control text-center" placeholder="LASTNAME" value="<?= $detailsPatientArray['lastname'] ?>" disabled>
        <div>
            <span class="textError"><?= isset($errorMessages["lastname"]) ? $errorMessages["lastname"] : "" ?></span>
        </div>
    </div>

    <div class="form-group">
        <label for="firstname">Firstname</label>
        <input type="text" id="firstname" name="firstname" aria-label="firstname" class="form-control text-center" placeholder="FIRSTNAME" value="<?= $detailsPatientArray['firstname'] ?>" disabled>
        <div>
            <span class="textError"><?= isset($errorMessages["firstname"]) ? $errorMessages["firstname"] : "" ?></span>
        </div>
    </div>

    <div class="form-group">
        <label for="birthdate">Birthdate</label>
        <input type="date" id="birthdate" name="birthdate" aria-label="Date de naissance" class="form-control text-center" placeholder="BIRTHDATE" value="<?= $detailsPatientArray['birthdate'] ?>" disabled>
        <div>
            <span class="textError"><?= isset($errorMessages["birthdate"]) ? $errorMessages["birthdate"] : "" ?></span>
        </div>
    </div>

    <div class="form-group">
        <label for="phone">Phone number</label>
        <input type="text" min="10" max="10" id="phone" name="phone" aria-label="Numéro de téléphone" class="form-control text-center" placeholder="PHONE NUMBER" value="<?= $detailsPatientArray['phone'] ?>" disabled>
        <div>
            <span class="textError"><?= isset($errorMessages["phone"]) ? $errorMessages["phone"] : "" ?></span>
        </div>
    </div>

    <div class="form-group">
        <label for="mail">Email adress</label>
        <input type="mail" id="mail" name="mail" aria-label="Adresse email" class="form-control text-center" placeholder="EMAIL ADRESS" value="<?= $detailsPatientArray['mail'] ?>" disabled>
        <div>
            <span class="textError"><?= isset($errorMessages["mail"]) ? $errorMessages["mail"] : "" ?></span>
        </div>
    </div>

    <button class="btn btnConnexion mt-3" type="submit" name="modifyPatient" value="<?= $detailsPatientArray['id'] ?>">Modify informations</button>
    <div class="mt-1 d-flex justify-content-center">
        <a type="button" href="view-listPatients.php" class="btn btnBack mr-1">back</a>
    </div>

    <form action="../views/view-detailsAppointment.php" method="GET">
        <div class="form-group mt-3">
            <p class="text-center">Next appointment :</p>
            <?php foreach ($appointmentsList as $appointment) { ?>
            <button type="submit" class="btn-sm list-group-item list-group-item-action text-center" name="idAppointment" value="<?= $appointment['appointmentId'] ?>">Date : <?= $appointment['date'] ?> at
                <?= $appointment['hour'] ?></button>
            <?php } ?>
        </div>
    </form>

</form>