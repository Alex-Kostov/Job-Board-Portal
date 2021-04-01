<?php
include_once 'head.php';
include_once 'includes/dbh.inc.php';
include_once 'includes/functions.inc.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $data = getDataSinglePage($conn, $id);
}

?>

<div class="create-form">
  <h2>Edit Job</h2>
  <form action="includes/update.inc.php?id=<?php echo $id ?>" method="POST">
    <span>Title</span>
    <input type="text" name="title" placeholder="Title..." value="<?php echo $data['0']['offers_title'] ?>"> <br>
    <span>Description</span>
    <textarea name="description" placeholder="Description..." rows="3" cols="19"><?php echo $data['0']['offers_description'] ?></textarea><br>
    <span>Company</span>
    <input type="text" name="company" placeholder="Company..." value="<?php echo $data['0']['offers_company'] ?>"><br>
    <span>Salary</span>
    <input type="text" name="salary" placeholder="Salary..." value="<?php echo $data['0']['offers_salary'] ?>"><br>
    <span>Image url</span>
    <input type="text" name="imageUrl" placeholder="Image url..." value="<?php echo $data['0']['offers_imageUrl'] ?>"><br>
    <span>Job type</span>
    <input type="text" name="type" placeholder="Job type..." value="<?php echo $data['0']['offers_type'] ?>"><br>
    <span>Job location</span>
    <input type="text" name="location" placeholder="Job Location..." value="<?php echo $data['0']['offers_location'] ?>"><br>

    <button type="submit" name="submit">Add job</button>
    
  </form>
</div>

<?php
include_once 'footer.php';
?>