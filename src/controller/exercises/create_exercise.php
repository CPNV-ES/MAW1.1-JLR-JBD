<?php
require_once SOURCE_DIR.'/model/queries.php';

$title_exercise = $_POST['title'];


$bag['view'] = 'view/exercises/create_exercise';
insert($title_exercise);

return $bag;