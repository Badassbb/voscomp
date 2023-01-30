<?php
$id = $_GET["id"];

if (filter_var($id, FILTER_VALIDATE_INT)!== false) {
  echo("Variable is an integer");
} else {
  echo("Variable is not an integer");
  $id = 1;
}

echo $id;

?>