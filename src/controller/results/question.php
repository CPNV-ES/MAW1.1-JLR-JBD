<?php
require_once SOURCE_DIR . '/model/query.php';
require_once SOURCE_DIR . '/model/exercise_handler.php';

$handler = ExerciseHandler::getInstance();
$results = array();
$bag['view'] = 'view/results/question';

$bag['answers'] = $handler->getAnswersFromExercise($bag['id_exercise']);
$bag['questions'] = $handler->getQuestion($bag['id_question']);


$bag['results'] = $handler->getResultsFromQuestion($bag['id_question']);



return $bag;
