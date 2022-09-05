<?php
require_once SOURCE_DIR.'/model/queries.php';

$bag['view'] = 'view/exercises/index';

$bag['exercises'] = selectAllExercises();

var_dump($bag['exercises']);
die();


return $bag;