<?php

require_once '../models/dataBase.php';
require_once '../models/patients.php';
require_once '../models/appointments.php';

// Heure d'ouverture de la clinique
$openHour = 8;
$closeHour = 20;
// Fermeture piur le déjeuner
$specialHour = 12;


// Variable permettant de gérer l'affichage du formulaire
$addAppointmentInBase = false;

// Mise en place d'un tableau d'erreurs
$errors = [];

// Mise en place d'un tableau de messages
$messages = [];

// Recupération de tous les patients via notre méthode pour pouvoir générer les options de notre select
$patientsObj = new Patients;
$selectPatientsArray = $patientsObj->getAllPatientsForSelect();

if (isset($_POST['addAppointmentBtn'])) {

    if (empty($errors)) {

        $appointmentDetails = [
            'dateHour' => htmlspecialchars($_POST['dateAppointment'] . ' - ' . $_POST['hourAppointment']),
            'idPatients' => htmlspecialchars($_POST['patientId'])
        ];

        $appointmentsObj = new Appointments;

        if ($appointmentsObj->addAppointment($appointmentDetails)) {
            $addAppointmentInBase = true;
            $messages['addAppointement'] = 'The appointment have been registred with succes.';
        } else {
            $messages['addAppointement'] = 'Error with database connexion, please contact support.';
        }
    }
}