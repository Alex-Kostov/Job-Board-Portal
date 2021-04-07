<?php

include_once 'dbh.inc.php';

function emptyInput($username, $password)
{
  $result = null;
  if (empty($username) || empty($password)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

function emptyField($input)
{
}
function uidExists($conn, $username)
{
  $sql = "SELECT * FROM users WHERE user_username = ?;";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../login.php?error=stmt-failed");
    exit();
  }
  mysqli_stmt_bind_param($stmt, "s", $username);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
  } else {
    $result = false;
    return $result;
  }

  mysqli_stmt_close($stmt);
}

function loginUser($conn, $username, $password)
{
  $userExists = uidExists($conn, $username, $username);

  if ($userExists === false) {
    header("location: ../login.php?error=wronglogin");
    exit();
  }

  $passwordUnHashed = $userExists["user_password"];
  $passwordHashed = password_hash($passwordUnHashed, PASSWORD_DEFAULT);
  $checkPassword = password_verify($password, $passwordHashed);

  if ($checkPassword === false) {
    header("location: ../login.php?error=wronglogin");
    exit();
  } else if ($checkPassword === true) {
    session_start();
    $_SESSION["loggedin"] = true;
    $_SESSION["username"] = $userExists["user_username"];
    header("location: ../edit.php");
    exit();
  }
}

function getData($conn, $sql)
{
  $result = mysqli_query($conn, $sql);
  $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_free_result($result);
  // mysqli_close($conn);
  return $data;
}
function getDataSinglePage($conn, $id)
{
  $sql = "SELECT * FROM offers WHERE offers_id = $id";
  return getData($conn, $sql);
}
function getDataEditPage($conn)
{
  $sql = "SELECT offers_id, offers_title, offers_company, offers_created_at FROM offers WHERE offers_status = 'approved'";
  return getData($conn, $sql);
}
function getDataHomePage($conn)
{
  $sql = "SELECT offers_id, offers_title, offers_description, offers_company, offers_salary, offers_imageUrl, offers_location,offers_created_at, offers_type FROM offers WHERE offers_status = 'approved'";
  return getData($conn, $sql);
}
function getRelatedPage($conn, $id)
{
  $sql = "SELECT * FROM offers WHERE offers_id != $id AND offers_status = 'approved'";
  return getData($conn, $sql);
}
function deleteRowById($conn, $id)
{
  $sql = "DELETE FROM offers WHERE offers_id = $id";
  $data = mysqli_query($conn, $sql);

  if ($data) {
    header("location: ../edit.php?delete=success");
    exit();
  } else {
    header("location: ../edit.php?delete=failed");
    exit();
  }
}
function updateRow($conn, $id, $title, $description, $company, $salary, $imageUrl, $type, $location)
{
  $sql = "UPDATE offers SET offers_title = ?, offers_description = ?, offers_company = ?, offers_salary = ?, offers_imageUrl = ?, offers_type = ?, offers_location = ? WHERE offers_id = ?";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../edit.php?error=stmt-failed");
    exit();
  }
  mysqli_stmt_bind_param($stmt, "ssssssss", $title, $description, $company, $salary, $imageUrl, $type, $location, $id);
  mysqli_stmt_execute($stmt);

  $data = mysqli_stmt_get_result($stmt);

  if ($data) {
    header("location: ../edit.php?update=success");
    exit();
  } else {
    header("location: ../edit.php?update=failed");
    exit();
  }
}
function createRow($conn, $title, $description, $company, $salary, $imageUrl, $type, $location)
{
  $sql = "INSERT INTO offers (offers_title, offers_description, offers_company, offers_salary,offers_imageUrl, offers_type , offers_location) VALUES (?, ?, ?, ?, ?, ?, ?);";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../create.php?error=stmt-failed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "sssssss", $title, $description, $company, $salary, $imageUrl, $type, $location);
  mysqli_stmt_execute($stmt);

  header("location: ../index.php?create=success");
  exit();
}
function timeAgo($time_ago)
{
  //I find this function in google i didn't write it.
  //there was problem with  corect time zone maybe. i added 3600 seconds on line 159 and now it's working :)
  $cur_time   = time();
  $time_elapsed   = $cur_time - $time_ago + 3600;
  $seconds   = $time_elapsed;
  $minutes   = round($time_elapsed / 60);
  $hours     = round($time_elapsed / 3600);
  $days     = round($time_elapsed / 86400);
  $weeks     = round($time_elapsed / 604800);
  $months   = round($time_elapsed / 2600640);
  $years     = round($time_elapsed / 31207680);
  // Seconds
  if ($seconds <= 60) {
    echo "$seconds seconds ago";
  }
  //Minutes
  else if ($minutes <= 60) {
    if ($minutes == 1) {
      echo "one minute ago";
    } else {
      echo "$minutes minutes ago";
    }
  }
  //Hours
  else if ($hours <= 24) {
    if ($hours == 1) {
      echo "an hour ago";
    } else {
      echo "$hours hours ago";
    }
  }
  //Days
  else if ($days <= 7) {
    if ($days == 1) {
      echo "yesterday";
    } else {
      echo "$days days ago";
    }
  }
  //Weeks
  else if ($weeks <= 4.3) {
    if ($weeks == 1) {
      echo "a week ago";
    } else {
      echo "$weeks weeks ago";
    }
  }
  //Months
  else if ($months <= 12) {
    if ($months == 1) {
      echo "a month ago";
    } else {
      echo "$months months ago";
    }
  }
  //Years
  else {
    if ($years == 1) {
      echo "one year ago";
    } else {
      echo "$years years ago";
    }
  }
}
function getDataForRewiew($conn)
{
  $sql = "SELECT * FROM offers WHERE offers_status = 'waiting for approval'";
  $result = mysqli_query($conn, $sql);
  return $result;
}
function updateStatus($conn, $id, $status)
{
  $sql = "UPDATE offers SET offers_status = ? WHERE offers_id = ?";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: approve.inc.php?error=stmt-failed");
    exit();
  }
  mysqli_stmt_bind_param($stmt, "ss", $status,$id);
  mysqli_stmt_execute($stmt);
}