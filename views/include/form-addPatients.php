<form novalidate method="POST" name="addPatient" class="col-12 col-sm-8 col-md-4 mt-5 pb-3 d-flex flex-column">
            
    <legend class="pt-3 text-uppercase text-center titleForm">add patient</legend>
    
    <p class="h2 test"><?= $errorMessages["addPatient"] ?? '' ?></p>
                
    <div class="form-group">
        <label for="lastname"></label>
        <input type="text" id="lastname" name="lastname" aria-label="lastname" class="form-control text-center" placeholder="LASTNAME" value="<?= isset($_POST["lastname"]) ? htmlspecialchars($_POST["lastname"]) : "" ?>" required>
        <div>
            <span class="textError"><?= isset($errorMessages["lastname"]) ? $errorMessages["lastname"] : "" ?></span>
        </div>
    </div>

    <div class="form-group">
        <label for="firstname"></label>
        <input type="text" id="firstname" name="firstname" aria-label="firstname" class="form-control text-center" placeholder="FIRSTNAME" value="<?= isset($_POST["firstname"]) ? $_POST["firstname"] : "" ?>" required>
        <div>
            <span class="textError"><?= isset($errorMessages["firstname"]) ? $errorMessages["firstname"] : "" ?></span>
        </div>
    </div>

    <div class="form-group">
        <label for="birthdate"></label>
        <input type="date" id="birthdate" name="birthdate" aria-label="Date de naissance" class="form-control text-center" placeholder="BIRTHDATE" value="<?= isset($_POST["birthdate"]) ? $_POST["birthdate"] : "" ?>" required>
        <div>
            <span class="textError"><?= isset($errorMessages["birthdate"]) ? $errorMessages["birthdate"] : "" ?></span>
        </div>
    </div>

    <div class="form-group">
        <label for="phone"></label>
        <input type="text" min="10" max="10" id="phone" name="phone" aria-label="Numéro de téléphone" class="form-control text-center" placeholder="PHONE NUMBER" value="<?= isset($_POST["phone"]) ? $_POST["phone"] : "" ?>" required>
        <div>
            <span class="textError"><?= isset($errorMessages["phone"]) ? $errorMessages["phone"] : "" ?></span>
        </div>
    </div>

    <div class="form-group">
        <label for="mail"></label>
        <input type="mail" id="mail" name="mail" aria-label="Adresse email" class="form-control text-center" placeholder="EMAIL ADRESS" value="<?= isset($_POST["mail"]) ? $_POST["mail"] : "" ?>" required>
        <div>
            <span class="textError"><?= isset($errorMessages["mail"]) ? $errorMessages["mail"] : "" ?></span>
        </div>
    </div>
            
    <button class="btn btnConnexion mt-3" type="submit" name="addPatientBtn">add patient</button>
    <div class="mt-1 d-flex justify-content-center">
    <a type="button" href="../index.php" class="btn btnBack mr-3 mt-3">back</a>
    <a type="button" href="view-listPatients.php" class="btn btnConnexion ml-3 mt-3">patients list</a>
    </div>

</form>