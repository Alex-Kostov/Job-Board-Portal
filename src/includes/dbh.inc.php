<?php

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "job-portal";
$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());  
}

// $filename = 'databasecode.sql';
// $handle = fopen($filename,"r+");
// $contents = fread($handle,filesize($filename));
// $sql = explode(';',$contents);
// foreach($sql as $query){
//   $result = mysqli_query($conn,$query);
//   if($result){
//       echo '<tr><td><br></td></tr>';
//       echo '<tr><td>'.$query.' <b>SUCCESS</b></td></tr>';
//       echo '<tr><td><br></td></tr>';
//   }
// }
// fclose($handle);
// echo 'Successfully imported';