<?php
require_once SOURCE_DIR.'/model/query.php';

$query = Query::getInstance();

$title_exercise = $_POST['title'];

$id = $query->insert($title_exercise);

var_dump($id);
die();
header('Location: /exercises/'.$id.'/edit');