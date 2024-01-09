<?php

$connect = mysqli_connect('localhost', 'dacentric', 'secret', 'dacentric');  //Dacentric@db -----  dacenj4b_dacentric

if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL :' . mysqli_connect_errno());
}
?>