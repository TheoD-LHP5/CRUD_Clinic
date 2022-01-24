<form method="POST" class="col-12 col-sm-8 col-md-4 mt-5 pb-3 d-flex flex-column">

    <div class="text-center text-success"><i class="fas fa-user-edit p-2 logo"></i></div>
    <p class="text-center text-success text-uppercase mb-3 h3">Modifications informations of patient</p>
                                
    <div class="form-group">
        <label for="lastname">Lastname</label>
        <input type="text" id="lastname" name="lastname" aria-label="lastname" class="form-control text-center" placeholder="LASTNAME" value="<?= $detailsPatientArray['lastname'] ?? (isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname']) : '') ?>" required>
        <div>
            <span class="textError"><?= isset($errorMessages["lastname"]) ? $errorMessages["lastname"] : "" ?></span>
        </div>
    </div>
                
    <div class="form-group">
        <label for="firstname">Firstname</label>
        <input type="text" id="firstname" name="firstname" aria-label="firstname" class="form-control text-center" placeholder="FIRSTNAME" value="<?= $detailsPatientArray['firstname'] ?? (isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname']) : '') ?>" required>
        <div>
            <span class="textError"><?= isset($errorMessages["firstname"]) ? $errorMessages["firstname"] : "" ?></span>
        </div>
    </div>
                
    <div class="form-group">
        <label for="birthdate">Birthdate</label>
        <input type="date" id="birthdate" name="birthdate" aria-label="Date de naissance" class="form-control text-center" placeholder="BIRTHDATE" value="<?= $detailsPatientArray['birthdate'] ?? (isset($_POST['birthdate']) ? htmlspecialchars($_POST['birthdate']) : '') ?>" required>
        <div>
            <span class="textError"><?= isset($errorMessages["birthdate"]) ? $errorMessages["birthdate"] : "" ?></span>
        </div>
    </div>
                
    <div class="form-group">
        <label for="phone">Phone number</label>
        <input type="text" min="10" max="10" id="phone" name="phone" aria-label="Numéro de téléphone" class="form-control text-center" placeholder="PHONE NUMBER" value="<?= $detailsPatientArray['phone'] ?? (isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '') ?>" required>
        <div>
            <span class="textError"><?= isset($errorMessages["phone"]) ? $errorMessages["phone"] : "" ?></span>
        </div>
    </div>
                
    <div class="form-group">
        <label for="mail">Email adress</label>
        <input type="mail" id="mail" name="mail" aria-label="Adresse email" class="form-control text-center" placeholder="EMAIL ADRESS" value="<?= $detailsPatientArray['mail'] ?? (isset($_POST['mail']) ? htmlspecialchars($_POST['mail']) : '') ?>" required>
        <div>
            <span class="textError"><?= isset($errorMessages["mail"]) ? $errorMessages["mail"] : "" ?></span>
        </div>
    </div>
                          
    <button class="btn btn-success mt-3" type="submit" name="updatePatientBtn">SAVE</button>
    <div class="mt-1 d-flex justify-content-center">
        <a type="button" href="view-listPatients.php" class="btn btnBack mr-1">CANCEL</a>
    </div>
                
</form>