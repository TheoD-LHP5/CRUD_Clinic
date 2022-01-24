<?php

require_once '../models/dataBase.php';
require_once '../models/patients.php';

$regexName = "/^[a-zA-ZÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ\-]+$/";
$regexPhoneNumber = "/^[0-9]{10}$/";
$regexDate = "/^\d{4}(-)(((0)[0-9])|((1)[0-2]))(-)([0-2][0-9]|(3)[0-1])$/";

// Variable permettant de savoir si nous avons inscrit le patient dans la BDD
$addPatientInBase = false;

$errors = [];
$messages = [];

if(isset($_POST["addPatientBtn"])){

    if(isset($_POST["lastname"])){
        if(!preg_match($regexName, $_POST["lastname"])){
            $errorMessages["lastname"] = "Please respect the format.";
        }
        if(empty($_POST["lastname"])){
            $errorMessages["lastname"] = "Please enter a patient lastname.";
        }
    }

    if(isset($_POST["firstname"])){
        if(!preg_match($regexName, $_POST["firstname"])){
            $errorMessages["firstname"] = "Please respect the format.";
        }
        if(empty($_POST["firstname"])){
            $errorMessages["firstname"] = "Please enter a patient firstname.";
        }
    }

    if(isset($_POST["birthdate"])){
        if(!preg_match($regexDate, $_POST["birthdate"])){
            $errorMessages["birthdate"] = "Please enter a valid birthdate.";
        }
        if(empty($_POST["birthdate"])){
            $errorMessages["birthdate"] = "Please enter a patient birthdate.";
        }
    }

    if(isset($_POST["phone"])){
        if(!preg_match($regexPhoneNumber, $_POST["phone"])){
            $errorMessages["phone"] = "Please enter a valid phone number.";
        }
        if(empty($_POST["phone"])){
            $errorMessages["phone"] = "Please enter a patient phone number.";
        }
    }

    if(isset($_POST["mail"])){
        if (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
            $errorMessages["mail"] = "Please enter a valid email adress.";
        }
        if(empty($_POST["mail"])){
            $errorMessages["mail"] = "Please enter a patient email adress.";
        }
    }

    // Vérification qu'il n'y a pas d'erreurs afin de lancer ma requête
    if (empty($errors)) {
        $patientsObj = new Patients;

        // Création d'un tableau contenant toutes les infos du formulaire
        $patientDetails = [
            "lastname" => htmlspecialchars($_POST["lastname"]),
            "firstname" => htmlspecialchars($_POST["firstname"]),
            "birthdate" => htmlspecialchars($_POST["birthdate"]),
            "phone" => htmlspecialchars($_POST["phone"]),
            "mail" => htmlspecialchars($_POST["mail"]),
        ];

        if ($patientsObj->addPatient($patientDetails)) {
            $addPatientInBase = true;
            $messages["addPatient"] = "The patient have been registred with succes.";
        } else {
            $messages["addPatient"] = "Error with database connexion, please contact support.";
        }
    }
}