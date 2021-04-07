<footer class="site-footer">
  <p>Copyright 2020 | Developer links:
  <a href="index.php">Home</a>,
    <a href="edit.php">Admin</a>,
    <a href="create.php">Add</a>,
    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
      echo "<a href='includes/logout.inc.php'>Logout</a>";
    } else {
      echo "<a href='login.php'>Login</a>";
    } ?>,
    <a href="includes/export.inc.php">Export db</a>

  </p>
</footer>

</div>
</body>

</html>