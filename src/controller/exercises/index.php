<?php
require_once SOURCE_DIR.'/model/exercise_handler.php';

$handler = ExerciseHandler::getInstance();

//var_dump($handler->exists(129,133));


die();
$bag['view'] = 'view/exercises/index';

$bag['exercises'] = $handler->getExercise();

return $bag;