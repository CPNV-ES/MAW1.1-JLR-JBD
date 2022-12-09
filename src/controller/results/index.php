<?php
require_once SOURCE_DIR . '/model/query.php';
require_once SOURCE_DIR . '/model/exercise_handler.php';

$handler = ExerciseHandler::getInstance();
$results = array();
$bag['view'] = 'view/results/index';

$bag['answers'] = $handler->getAnswersFromExercise($bag['id_exercise']);
$bag['questions'] = $handler->getQuestionsFromExercise($bag['id_exercise']);
foreach ($bag['answers'] as $answer) {
    $results += $handler->getResultsFromAnswer($answer->getId());
}
var_dump($results);
$bag['results'] = $results;
return $bag;
