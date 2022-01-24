<?php

class Patients extends Database
{
    /**
     * Methode permettant de rajouter un patient dans notre base de donnée.
     *
     * @param array $patientDetails contient toutes les informations du patient
     * @return boolean Permet de savoir si la requête est bien passé
     */
    public function addPatient(array $patientDetails)
    {
        $query = 'INSERT INTO `patients` (`lastname`, `firstname`, `birthdate`, `phone`, `mail`)
        VALUES (:lastname, :firstname, :birthdate, :phone, :mail)';

        $addPatientQuery = $this->dataBase->prepare($query);

        $addPatientQuery->bindValue(':lastname', $patientDetails['lastname'], PDO::PARAM_STR);
        $addPatientQuery->bindValue(':firstname', $patientDetails['firstname'], PDO::PARAM_STR);
        $addPatientQuery->bindValue(':birthdate', $patientDetails['birthdate'], PDO::PARAM_STR);
        $addPatientQuery->bindValue(':phone', $patientDetails['phone'], PDO::PARAM_STR);
        $addPatientQuery->bindValue(':mail', $patientDetails['mail'], PDO::PARAM_STR);

        if ($addPatientQuery->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Méthode permettant d'obtenir la liste de tous les patients
     *
     * @return array
     */
    public function getAllPatients()
    {
        $query = 'SELECT `id`, `lastname`, `firstname` FROM `patients` ORDER BY `lastname`';

        $getAllPatientsQuery = $this->dataBase->query($query);

        return $getAllPatientsQuery->fetchAll();
    }

    /**
     * Methode permettant d'obtenir les infos d'un client selon son ID
     *
     * @param string $idPatient
     * @return array ou false si la requête ne passe pas
     */
    public function getDetailsPatient(string $idPatient)
    {
        $query = 'SELECT * FROM patients WHERE id = :idPatient';

        $getDetailsPatientQuery = $this->dataBase->prepare($query);

        $getDetailsPatientQuery->bindValue(':idPatient', $idPatient, PDO::PARAM_STR);

        if ($getDetailsPatientQuery->execute()) {
            return $getDetailsPatientQuery->fetch();
        } else {
            return false;
        }
    }

    /**
     * Methode permettant de mettre à jour un patient
     * 
     * @param array contenant les infos du patient
     * @return boolean permettant de savoir si la requête s'est bien déroulée
     */
    public function updatePatient(array $patientDetails)
    {
        $query = 'UPDATE `patients` SET
        `lastname` = :lastname,
        `firstname` = :firstname,
        `birthdate` = :birthdate,
        `phone` = :phone,
        `mail` = :mail
        WHERE id = :id';

        $updatePatientQuery = $this->dataBase->prepare($query);

        $updatePatientQuery->bindValue(':lastname', $patientDetails['lastname'], PDO::PARAM_STR);
        $updatePatientQuery->bindValue(':firstname', $patientDetails['firstname'], PDO::PARAM_STR);
        $updatePatientQuery->bindValue(':birthdate', $patientDetails['birthdate'], PDO::PARAM_STR);
        $updatePatientQuery->bindValue(':phone', $patientDetails['phone'], PDO::PARAM_STR);
        $updatePatientQuery->bindValue(':mail', $patientDetails['mail'], PDO::PARAM_STR);
        $updatePatientQuery->bindValue(':id', $patientDetails['id'], PDO::PARAM_STR);

        if ($updatePatientQuery->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Méthode permettant d'obtenir la liste de tous les patients à insérer dans le select de notre prise de RDV
     *
     * @return array
     */
    public function getAllPatientsForSelect()
    {
        $query = 'SELECT `id`, `lastname`, `firstname` FROM `patients` ORDER BY `lastname`';

        $getAllPatientsQuery = $this->dataBase->query($query);

        return $getAllPatientsQuery->fetchAll();
    }

    /**
     * Methode permettant d'obtenir tous les rdv d'un patient selon son id
     * 
     * @param string nous récupérons un id sous forme de string
     * @return array tous les détails du rdv sous forme de tableau associatif
     * 
     */
    public function getPatientAppointments(string $idPatient)
    {
        $query = "SELECT appointments.id as appointmentId, DATE_FORMAT(dateHour, '%d/%m/%Y') as date, DATE_FORMAT(dateHour, '%H:%i') as hour
        FROM appointments
        INNER JOIN patients
        ON appointments.idPatients = patients.id
        WHERE idPatients = :idPatient";

        $getPatientAppointmentsQuery = $this->dataBase->prepare($query);

        $getPatientAppointmentsQuery->bindValue(':idPatient', $idPatient, PDO::PARAM_STR);

        if ($getPatientAppointmentsQuery->execute()) {
            return $getPatientAppointmentsQuery->fetchAll();
        } else {
            return false;
        }
    }

        /**
     * methode permettant d'effacer un rdv
     *
     * @param string $appointmentId
     * @return boolean permettant de savoir si le delete est ok
     */
    public function deletePatient(string $patientId)
    {
        $query = 'DELETE FROM `patients` WHERE `id` = :id';

        $deletePatientQuery = $this->dataBase->prepare($query);

        $deletePatientQuery->bindValue(':id', $patientId, PDO::PARAM_STR);

        if ($deletePatientQuery->execute()) {
            return true;
        } else {
            return false;
        }
    }

}
