<?php

require_once SOURCE_DIR . '/model/exercise_handler.php';

$title_exercise = $_POST['title'];


$id_exercise = $bag["id_exercise"];
$id_field = $bag["id_field"];

$query = new Query();
$handler = ExerciseHandler::getInstance();
$bag['data'] = $handler->getQuestion($id_field);

if ($_POST["label"] != "") {
    $query->updateQuestion($bag['id_field'], $_POST['label'], $_POST['value_kind']);
    header("Location: /exercises/$id_exercise/edit");
} else {
    $bag['view'] = 'view/fields/edit';
}
return $bag;
