<?php
require_once SOURCE_DIR . '/model/exercise_handler.php';

$handler = ExerciseHandler::getInstance();

$bag['view'] = 'view/exercises/answering';

$bag['exercises'] = $handler->getExercise();

return $bag;
