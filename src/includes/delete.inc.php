<?php
include_once 'functions.inc.php';
include_once 'dbh.inc.php';

$id = $_GET['id'];
$result = deleteRowById($conn,$id);




