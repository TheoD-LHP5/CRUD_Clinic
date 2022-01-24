<?php

require_once '../models/dataBase.php';
require_once '../models/appointments.php';

$appointmentsObj = new Appointments;

if (isset($_GET['idAppointment'])) {
    // Récupération des détails du rendez-vous via l'ID
    $detailsAppointmentArray = $appointmentsObj->getAppointmentDetails($_GET['idAppointment']);
} else {
    $detailsAppointmentArray = false;
}