<?php
require_once SOURCE_DIR.'/model/queries.php';

$title = $_POST['title'];
var_dump($_POST);

$bag['view'] = 'view/exercises/create';
insert($title);

return $bag;