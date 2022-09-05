<?php

function connect($query){
    try {
        $dbh = new PDO('mysql:host=10.229.32.55;dbname=maw11', "JON", "");
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement= $dbh->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $dbh = null;
    } catch (PDOException $e) {
        echo 'Échec lors de la connexion : ' . $e->getMessage();
    }
    return $result;
}
?>