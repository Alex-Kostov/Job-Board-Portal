<?php

include_once 'dbh.inc.php';
include_once 'functions.inc.php';

$id = $_GET['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$company = $_POST['company'];
$salary = $_POST['salary'];
$imageUrl = $_POST['imageUrl'];
$type = $_POST['type'];
$location = $_POST['location'];


updateRow($conn,$id,$title,$description,$company,$salary,$imageUrl,$type,$location);

header("location: ../edit.php");
exit();