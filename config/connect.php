<?php
// pasted this code because i got an error while fetching data for particular id and i found this in stack overflow
// After that all MySQL errors will be transferred into PHP exceptions. Uncaught exception, in turn, makes a PHP fatal error. Thus, in case of a MySQL error, you'll get a conventional PHP error.
// That will instantly make you aware of the error cause. And a stack trace will lead you to the exact spot where the error occurred.
// mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$conn = mysqli_connect("localhost", "Hariharan", "test1234", "dish_up");

if(!$conn){
  echo "connection error" . mysqli_connect_error();
}

?>
