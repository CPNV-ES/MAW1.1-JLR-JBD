<?php
require_once SOURCE_DIR . '/model/query.php';
require_once SOURCE_DIR . '/model/exercise_handler.php';

$handler = ExerciseHandler::getInstance();
$results = array();
$bag['view'] = 'view/results/answer';

$bag["results"]  = $handler->getResultsFromAnswer($bag["id_answer"]);
$bag["answers"] = $handler->getAnswer($bag["id_answer"]);


return $bag;
