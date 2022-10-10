<?php
require_once SOURCE_DIR.'/model/exerciseHandler.php';

$handler = ExerciseHandler::getInstance();;

$bag['view'] = 'view/exercises/index';

$bag['exercises'] = $handler->getExercise();

return $bag;