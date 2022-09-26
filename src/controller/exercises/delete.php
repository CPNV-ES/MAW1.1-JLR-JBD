<?php
require_once SOURCE_DIR.'/model/queries.php';

$title_exercise = $_POST['title'];


delete($bag["id_exercise"]);
header('Location: /exercises');
return $bag;