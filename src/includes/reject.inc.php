<?php

include_once 'dbh.inc.php';
include_once 'functions.inc.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
}

updateStatus($conn,$id,'rejected');
header("location: ../edit.php");
exit();
