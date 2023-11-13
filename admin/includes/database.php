<?php

$connect = mysqli_connect('localhost', 'dacentric', 'secret', 'dacentric');

if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL :' . mysqli_connect_errno());
}
?>