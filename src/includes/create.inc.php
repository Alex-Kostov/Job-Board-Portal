<?php

include_once 'dbh.inc.php';
include_once 'functions.inc.php';

if (isset($_POST['submit'])) {


  $title = $_POST['title'];
  $description = $_POST['description'];
  $company = $_POST['company'];
  $salary = $_POST['salary'];
  $imageUrl = $_POST['imageUrl'];
  $type = $_POST['type'];
  $location = $_POST['location'];

  if (empty($title) || empty($description) || empty($company) || empty($salary) || empty($imageUrl) || empty($type) || empty($location)) {
    header("location: ../create.php?create=empty");
    exit();
  }

  createRow($conn, $title, $description, $company, $salary, $imageUrl, $type, $location);

  header("location: ../index.php?error=none");
  exit();
}
