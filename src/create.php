<?php
include_once 'head.php';
?>


<div class="create-form">
  <h2>Create new job</h2>
  <form action="includes/create.inc.php" method="POST">
    <?php
    if (isset($_GET['create'])) {
      if ($_GET['create'] === 'empty') {
        echo "<p>All fields are required!</p>";
      }
    }
    ?>
    <span>Title</span>
    <input type="text" name="title" placeholder="Title..."> <br>
    <span>Description</span>
    <textarea name="description" placeholder="Description..." rows="3" cols="19"></textarea><br>
    <span>Company</span>
    <input type="text" name="company" placeholder="Company..."><br>
    <span>Salary</span>
    <input type="text" name="salary" placeholder="Salary..."><br>
    <span>Image url</span>
    <input type="text" name="imageUrl" placeholder="Image url..."><br>
    <span>Job type</span>
    <input type="text" name="type" placeholder="Job type..."><br>
    <span>Job location</span>
    <input type="text" name="location" placeholder="Job location..."><br>

    <button type="submit" name="submit">Add job</button>
  </form>
</div>

<?php
include_once 'footer.php';
?>