<?php

require_once SOURCE_DIR . '/model/exercise_handler.php';

$title_exercise = $_POST['title'];
$id_field = $bag["id_field"];


$handler = ExerciseHandler::getInstance();

$exercise = $handler->getExerciseFromQuestion($id_field);

$id = $handler->getExerciseFromQuestion($id_field);
$handler->deleteQuestion($id_field);

header("Location: /exercises/$id/edit");
