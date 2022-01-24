<?php

class Appointments extends Database
{
    /**
     * Methode permettant d'ajouter un rdv 
     *
     * @param array $appointmentDetails
     * @return boolean en fonction de l'execution de la requête
     */
    public function addAppointment(array $appointmentDetails)
    {
        $query = 'INSERT INTO `appointments` (`dateHour`, `idPatients`)
        VALUES (:dateHour, :idPatients)';

        $addAppointmentQuery = $this->dataBase->prepare($query);

        $addAppointmentQuery->bindValue(':dateHour', $appointmentDetails['dateHour'], PDO::PARAM_STR);
        $addAppointmentQuery->bindValue(':idPatients', $appointmentDetails['idPatients'], PDO::PARAM_STR);

        if ($addAppointmentQuery->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Methode permettant d'obtenir tous les rendez vous
     *
     * @return array
     */
    public function getAllAppointments()
    {
        $query = 'SELECT `appointments`.`id`, DATE_FORMAT(`dateHour`, "%d/%m/%Y") as `date`, DATE_FORMAT(dateHour, "%H:%i") as `hour`, CONCAT(`lastname`," ",`firstname`) as `patient`
        FROM appointments
        INNER JOIN `patients` ON `appointments`.`idPatients` = `patients`.`id`
        ORDER BY `dateHour` ASC';

        $getAllAppointmentQuery = $this->dataBase->query($query);

        return $getAllAppointmentQuery->fetchAll();
    }

    /**
     * methode permettant d'obtenir tous les infos d'un rdv avec son id
     *
     * @param string $appointmentId
     * @return array
     */
    public function getAppointmentDetails(string $appointmentId)
    {
        $query = 'SELECT `appointments`.`id`, DATE_FORMAT(`dateHour`, "%Y-%m-%d") as `date`, DATE_FORMAT(dateHour, "%H:%i") as `hour`, CONCAT(`lastname`," ",`firstname`) as `patient`, `patients`.`id` as `patientId`
        FROM appointments
        INNER JOIN `patients` ON `appointments`.`idPatients` = `patients`.`id`
        WHERE `appointments`.`id`= :appointmentId
        ORDER BY `dateHour` ASC';

        $getAppointmentDetailsQuery = $this->dataBase->prepare($query);

        $getAppointmentDetailsQuery->bindValue(':appointmentId', $appointmentId, PDO::PARAM_STR);

        if ($getAppointmentDetailsQuery->execute()) {
            return $getAppointmentDetailsQuery->fetch();
        } else {
            return false;
        }
    }

    /**
     * Methode permettant de mettre à jour un RDV
     * 
     * @param string $appointmentId
     * @return boolean permettant de savoir si l'update est ok.
     */
    public function updateAppointment(array $appointmentDetails)
    {

        $query = 'UPDATE `appointments` SET
        `dateHour` = :dateHour,
        `idPatients` = :idPatients
        WHERE `id` = :id';

        $updateAppointmentQuery = $this->dataBase->prepare($query);

        $updateAppointmentQuery->bindValue(':dateHour', $appointmentDetails['dateHour'], PDO::PARAM_STR);
        $updateAppointmentQuery->bindValue(':idPatients', $appointmentDetails['patientId'], PDO::PARAM_STR);
        $updateAppointmentQuery->bindValue(':id', $appointmentDetails['idAppointmentToUpdate'], PDO::PARAM_STR);

        if ($updateAppointmentQuery->execute()) {
            return true;
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
    public function deleteAppointment(string $appointmentId)
    {
        $query = 'DELETE FROM `appointments` WHERE `id` = :id';

        $deleteAppointmentQuery = $this->dataBase->prepare($query);

        $deleteAppointmentQuery->bindValue(':id', $appointmentId, PDO::PARAM_STR);

        if ($deleteAppointmentQuery->execute()) {
            return true;
        } else {
            return false;
        }

    }
}