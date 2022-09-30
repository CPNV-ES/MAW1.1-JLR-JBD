<?php
require_once SOURCE_DIR.'/model/query.php';

$query = new Query();

$bag['view'] = 'view/exercises/index';

$bag['exercises'] = $query->select();

return $bag;