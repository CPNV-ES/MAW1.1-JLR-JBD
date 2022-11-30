<?php
require_once SOURCE_DIR . '/model/exercise_handler.php';

$handler = ExerciseHandler::getInstance();

$bag['view'] = 'view/exercises/answering';

$bag['exercises'] = [];

foreach($handler->getExercise() as $exercise){
    if($exercise->getState() == 1){
        array_push($bag['exercises'],$exercise);
    }
}

return $bag;
