<?php
require __DIR__ . "/connect.php";
function insert($title){
    $query = "INSERT INTO Exercices(Title)  VALUES ('$title')";
    
connect($query);
}

function select(){
    $query = 'SELECT * FROM Exercices';
  $result = connect($query);
  return $result;
}

?>