<?php
require_once SOURCE_DIR.'/model/queries.php';

$title_exercise = $_POST['title'];
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
var_dump(parse_url($url));

$bag['view'] = 'view/exercises/index';
delete($title_exercise);

return $bag;