<?php
require_once SOURCE_DIR.'/model/queries.php';

$title = $_POST['title'];


$bag['view'] = 'view/exercises/create';
insert($title);

return $bag;