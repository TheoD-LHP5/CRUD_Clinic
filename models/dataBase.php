<?php

class Database
{
    protected $dataBase;

    private $user = 'Theo92DBqc';
    private $password = 'cod92highlanderdb';
    private $dbName = 'hospitale2n';

    public function __construct()
    {
        // Nous effectuons un try and catch pour obtenir un message d'erreur explicite en cas de non connexion
        try {
            // Nous effectuons une instance PDO pour nous connecter à la base de données
            $this->dataBase = new PDO("mysql:host=localhost;dbname=$this->dbName;charset=utf8", $this->user, $this->password);
        } catch (Exception $errorMessage) {
            die('Erreur : ' . $errorMessage->getMessage()); 
        }
    }
}