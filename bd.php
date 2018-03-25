<?php
  $mysqli = new mysqli('localhost', 'root', '', 'user');
 if ($mysqli->connect_error) {
    die('HERE SOME PROBLEM (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}
mysqli_debug("d:t:o,/tmp/client.trace");
$mysqli->set_charset("utf8");
?>