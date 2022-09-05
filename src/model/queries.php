<?php
require __DIR__ . "/connect.php";
function insert($title)
{
  $query = "INSERT INTO exercices(Title)  VALUES ('$title')";
  connect($query);
}

function selectAllExercises()
{
  $query = 'SELECT idExercices, title, "state" FROM exercices';
  $result = connect($query);
 
  return $result;
}

?>