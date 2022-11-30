<?php
require_once SOURCE_DIR.'/model/exercise_handler.php';

$handler = ExerciseHandler::getInstance();



$handler->deleteQuestion($bag["id_field"]);
header('Location: /exercises/'.$bag["id_exercise"].'/edit');
