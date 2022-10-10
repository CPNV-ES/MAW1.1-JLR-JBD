<?php
require_once SOURCE_DIR.'/model/query.php';

$query = new Query();

$title_exercise = $_POST['title'];

$query->insert($title_exercise);
$id = $query->select($title_exercise)[0]->getId();

header('Location: /exercises/'.$id.'/edit');