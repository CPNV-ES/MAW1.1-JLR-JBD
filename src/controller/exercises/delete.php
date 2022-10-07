<?php
require_once SOURCE_DIR.'/model/exerciseHandler.php';

$title_exercise = $_POST['title'];

$handler = ExerciseHandler::getInstance();;

$handler->delete($bag["id_exercise"]);
header('Location: /exercises');