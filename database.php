<?php
    function getConnexion(){
        $host = 'localhost';
        $dbName = 'sneak_me';
        $user = 'root';
        $password = '';
        try { 
            $db = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $user, $password);
        }
        catch (PDOException $e){
            die("Connexion échouée : " . $e->getMessage());
        }

        return $db;
    }
?>