<?php

$mysqli = new mysqli('tut10-db', getenv('MYSQL_USER'), getenv('MYSQL_PASSWORD'), 'information_schema');

if ($mysqli->connect_error) {
    echo 'Connection Error [', $mysqli->connect_errno, ']: ', $mysqli->connect_error, PHP_EOL;
} else {
    echo 'MySQLi Connected Successfully!', PHP_EOL;
}