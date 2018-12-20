<?php

$mysqli = new mysqli('tut07-db', getenv('MYSQL_USER'), getenv('MYSQL_PASSWORD'), 'information_schema');

if ($mysqli->connect_error) {
    echo 'Connection Error [', $mysqli->connect_errno, ']: ', $mysqli->connect_error;
} else {
    echo 'MySQLi Connected Successfully!';
}