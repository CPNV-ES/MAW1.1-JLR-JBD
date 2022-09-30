<?php
require_once SOURCE_DIR.'/model/query.php';

$title_exercise = $_POST['title'];

$query = Query::getInstance();

$query->delete($bag["id_exercise"]);
header('Location: /exercises');
return $bag;