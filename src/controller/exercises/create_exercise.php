<?php
require_once SOURCE_DIR.'/model/queries.php';

$title = $_POST['title'];


$bag['view'] = 'view/exercises/create_exercise';
insert($title);

return $bag;