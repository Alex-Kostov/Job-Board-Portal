<?php
include_once 'head.php';
?>

<h2>Login</h2>
<form action="includes/login.inc.php" method="post">
  <input type="text" name="username" placeholder="Username...">
  <input type="password" name="password" placeholder="Password...">
  <button type="submit" name="submit">Login</button>
</form>

<?php
if (isset($_GET["error"])) {
  if ($_GET["error"] == "emptyinput") {
    echo "<p>All fields are required!</p>";
  } else if ($_GET["error"] == "wronglogin") {
    echo "<p>Incorrect login infomartion!</p>";
  }
}
?>

<?php
include_once 'footer.php';
?>