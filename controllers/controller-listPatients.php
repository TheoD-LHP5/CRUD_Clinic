<?php

require_once '../models/database.php';
require_once '../models/patients.php';

$patientsObj = new Patients;
$messages = [];

if(isset($_POST['deleteBtn'])){
    if($patientsObj->deletePatient($_POST['deleteBtn'])){
        $messages['delete'] = 'The patient have been deleted with succes.';
    } else {
        $messages['delete'] = 'The patient could not been deleted, please contact support.';
    }
}

$allPatientsArray = $patientsObj->getAllPatients();