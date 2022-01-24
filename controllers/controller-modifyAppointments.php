<?php

session_start();

require_once '../models/dataBase.php';
require_once '../models/patients.php';
require_once '../models/appointments.php';

// Heure d'ouverture de la clinique
$openHour = 8;
$closeHour = 18;
// Fermeture déjeuner
$specialHour = 12;


// Variable permettant de gérer l'affichage du formulaire
$modifyAppointmentInBase = false;

// Tableau d'erreurs
$errors = [];
// Tableau de messages
$messages = [];

// Nous allons recupérer tous les patients via notre méthode pour pouvoir générer les options de notre select
$patientsObj = new Patients;
$selectPatientsArray = $patientsObj->getAllPatientsForSelect();

// Nous testons si nous avons bien une valeur non NULL dans le $_POST ModifyPatient qui signifie que nous venons bien de la page detailsPatient
if (!empty($_POST['modifyAppointment'])) {

    // J'instancie mon obj à l'aide de la classe appointments
    $appointmentsObj = new Appointments;
    // Nous allons récupérer les informations de notre patient nous permettant de pré-remplir le formulaire
    $appointmentDetailsArray = $appointmentsObj->getAppointmentDetails($_POST['modifyAppointment']);    
    // Pour plus de sécurité, je stocl l'id du patient à modifier dans une variable de session
    $_SESSION['idAppointmentToUpdate'] = $appointmentDetailsArray['id'];
}

// Nous détectons le submit du bouton addAppointmentBtn
if (isset($_POST['ModifyAppointmentBtn'])) {
    if (empty($errors)) {

        $appointmentDetails = [
            'patientId' => htmlspecialchars($_POST['patientId']),
            'dateHour' => htmlspecialchars($_POST['dateAppointment'] . ' - ' . $_POST['hourAppointment']),
            'idAppointmentToUpdate' => $_SESSION['idAppointmentToUpdate']
        ];

        $appointmentsObj = new Appointments;

        if ($appointmentsObj->updateAppointment($appointmentDetails)) {
            $modifyAppointmentInBase = true;
            $messages['updateAppointement'] = 'The appointment have been updated with succes.';
        } else {
            $messages['updateAppointement'] = 'Error with database connexion, please contact support.';
        }
    }
}