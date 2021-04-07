<?php
include_once 'head.php';
include_once 'includes/dbh.inc.php';
?>
<h1>Search Results</h1>

<?php
  if(isset($_POST['submit-search'])) {
    $search = mysqli_real_escape_string($conn, $_POST['search']);
    $sql = "SELECT * FROM offers WHERE offers_title LIKE '%$search%' OR offers_description LIKE '%$search%' OR offers_company LIKE '%$search%'";
    $result = mysqli_query($conn,$sql);
    $queryResults = mysqli_num_rows($result);

    if ($queryResults > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<li class='job-card'>
            <div class='job-primary'>
              <h2 class='job-title'><a href='details.php?id=".$row['offers_id']."'>".$row['offers_title']."</a></h2>
              <div class='job-meta'>
                <a class='meta-company' href='details.php?id=".$row['offers_id']."'>".$row['offers_company']."</a>
              </div>
            </div>
          </li>";
        }
    } else {
      echo "There are no results matching your search!";
    }
  }
?>

<?php
include_once 'footer.php';
?>



