<?php
require_once SOURCE_DIR.'/model/queries.php';

$bag['view'] = 'view/exercises/index';

$bag['exercises'] = selectAllExercises();

return $bag;