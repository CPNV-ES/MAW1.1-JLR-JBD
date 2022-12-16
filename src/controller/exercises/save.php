<?php
require_once SOURCE_DIR.'/model/exercise_handler.php';

$handler = ExerciseHandler::getInstance();

$handler->Answering($bag['id_exercise']);
header('Location: /exercises');