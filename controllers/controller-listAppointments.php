<?php

require_once '../models/dataBase.php';
require_once '../models/appointments.php';

$appointmentsObj = new Appointments;
$messages = [];

if(isset($_POST['deleteBtn'])){
    if($appointmentsObj->deleteAppointment($_POST['deleteBtn'])){
        $messages['delete'] = 'The appointment have been deleted with succes.';
    } else {
        $messages['delete'] = 'The appointment could not been deleted, please contact support.';
    }
}

// Creation d'un tableau permettant d'obtenir tous nos rendez-vous
$allAppointmentsArray = $appointmentsObj->getAllAppointments();