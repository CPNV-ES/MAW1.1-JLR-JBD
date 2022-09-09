<?php
require_once SOURCE_DIR.'/model/queries.php';

$title_exercise = $_POST['title'];

insert($title_exercise);
$id = selectNewestExercise()['idExercises'];
header('Location: /exercises/'.$id.'/edit');