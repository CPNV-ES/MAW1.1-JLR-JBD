<?php
require_once SOURCE_DIR.'/model/query.php';

$query = new Query();

$title_exercise = $_POST['title'];

$query->insert($title_exercise);

header('Location: /exercises/'.$id.'/edit');