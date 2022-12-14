<?php
require_once SOURCE_DIR . '/model/exercise_handler.php';

$exerciseHandler = exerciseHandler::getInstance();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $reponse = $_POST;
    unset($reponse['utf8'], $reponse['authenticity_token'], $reponse['commit']);
    $exerciseHandler->addAnswer($reponse);
    header("Location: /exercises/answering");
}
$bag['exercise'] = $exerciseHandler->getExercise($bag['id_exercise'])[0];
$bag['questions'] = $exerciseHandler->getQuestionsFromExercise($bag['id_exercise']);

$bag['view'] = 'view/results/exercise';

return $bag;