<?php

function Connect($query){
try {
    $dbh = new PDO('mysql:host=10.229.32.55;dbname=maw11', "JON", "");
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$result = $dbh->query($query);
$dbh = null;
} catch (PDOException $e) {
    echo 'Échec lors de la connexion : ' . $e->getMessage();
}
return $result;
}
?>