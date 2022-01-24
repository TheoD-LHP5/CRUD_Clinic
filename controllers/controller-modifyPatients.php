<?php

session_start();

require_once '../models/dataBase.php';
require_once '../models/patients.php';

$regexName = '/^[a-zA-Zéèê\-]+$/';
$regexNumber = '/^0[0-9]{9}$/';

$updatePatientInBase = false;
$errors = [];
$messages = [];

if (!empty($_POST['modifyPatient'])) {
    $patientsObj = new Patients;
    $detailsPatientArray = $patientsObj->getDetailsPatient($_POST['modifyPatient']);
    $_SESSION['idPatientToUpdate'] = $detailsPatientArray['id'];
}

if (isset($_POST['updatePatientBtn'])) {
    if (isset($_POST['lastname'])) {
        if (!preg_match($regexName, $_POST['lastname'])) {
            $errors['lastname'] = 'Veuillez respecter le format ex. DOE';
        }
        if (empty($_POST['lastname'])) {
            $errors['lastname'] = 'Veuillez renseigner ce champ';
        }
    }

    if (isset($_POST['mail'])) {

        if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
            $errors['mail'] = 'Veuillez respecter le format ex. mail@mail.fr';
        }

        if (empty($_POST['mail'])) {
            $errors['mail'] = 'Veuillez renseigner ce champ';
        }
    }

    if (empty($errors)) {
        $patientsObj = new Patients;

        // Création d'un tableau contenant toutes les infos du formulaire
        $patientDetails = [
            'lastname' => htmlspecialchars($_POST['lastname']),
            'firstname' => htmlspecialchars($_POST['firstname']),
            'birthdate' => htmlspecialchars($_POST['birthdate']),
            'mail' => htmlspecialchars($_POST['mail']),
            'phone' => htmlspecialchars($_POST['phone']),
            // Je recupère mon id que j'ai stocké dans ma variable de session
            'id' => $_SESSION['idPatientToUpdate']
        ];

        if ($patientsObj->updatePatient($patientDetails)) {
            $updatePatientInBase = true;
        } else {
            $messages['updatePatient'] = 'Error with database connexion, please contact support.';
        }
    }
}