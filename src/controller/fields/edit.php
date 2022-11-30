<?php

require_once SOURCE_DIR . '/model/exercise_handler.php';

$title_exercise = $_POST['title'];


$id_exercise = $bag["id_exercise"];
$id_field = $bag["id_field"];

echo $id_exercise;
$handler = ExerciseHandler::getInstance();
$bag['data'] = $handler->getQuestion($id_field);
var_dump($bag["question"]);
$bag['view'] = 'view/fields/edit';
return $bag;
