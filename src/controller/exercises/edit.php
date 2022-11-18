<?php
require_once SOURCE_DIR.'/model/query.php';
require_once SOURCE_DIR.'/model/exercise_handler.php';

$query = new Query();
$exerciseHandler = exerciseHandler::getInstance();

if($_POST['field']['label'] != ""){
    if($_POST['field']['value_kind'] < 3){
        $query->insertQuestion($bag['id_exercise'], $_POST['field']['label'], $_POST['field']['value_kind']);
    }
}

$bag['data'] = $exerciseHandler->getQuestionsFromExercise($bag['id_exercise']);
$bag['view'] = 'view/exercises/edit';

