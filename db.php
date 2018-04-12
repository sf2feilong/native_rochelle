<?php

$dberror1 = "Could not connect to our database!";
$dberror2 = "Could not find selected table";

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die($dberror1);

$select_db = mysqli_select_db($conn, "event_manager") or die($dberror2);