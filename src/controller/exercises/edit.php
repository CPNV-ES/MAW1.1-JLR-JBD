<?php
require_once SOURCE_DIR.'/model/query.php';

$query = new Query();

$bag['view'] = 'view/exercises/edit';

var_dump($_POST);
var_dump($bag['id_exercise']);

if($_POST['field']['label'] != ""){
    if($_POST['field']['value_kind'] < 3){
        $query->insertQuestion($bag['id_exercise'], $_POST['field']['label'], $_POST['field']['value_kind']);
    }
}


//$query->insertQuestion($bag['id_exercise'], $title, $type);

