<?php
require_once SOURCE_DIR.'/model/query.php';

$query = Query::getInstance();

$bag['view'] = 'view/exercises/index';

$bag['exercises'] = $query->selectAllExercises();

return $bag;