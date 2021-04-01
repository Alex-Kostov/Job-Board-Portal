<?php
include_once 'head.php';
include_once 'includes/functions.inc.php';
include_once 'includes/dbh.inc.php';
?>

<ul class="jobs-listing">

  <?php
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $offers = getDataEditPage($conn);
    foreach ($offers as $offer) {
  ?>
      <li class="job-card">
        <div class="job-primary">
          <h2 class="job-title"><a href="details.php?id=<?php echo $offer['offers_id'] ?>"><?php echo $offer['offers_title'] ?></a></h2>
          <div class="job-meta">
            <a class="meta-company" href="details.php?id=<?php echo $offer['offers_id'] ?>"><?php echo $offer['offers_company'] ?></a>
            <span class="meta-date">Posted <?php echo timeAgo(strtotime($offer['offers_created_at'])) ?></span>
          </div>
        </div>
        <div class="job-edit">
          <a href="editJob.php?id=<?php echo $offer['offers_id'] ?>">Edit</a>
          <a href="includes/delete.inc.php?id=<?php echo $offer['offers_id'] ?>">Delete</a>
        </div>
      </li>

    <?php  } ?>
</ul>

<?php
  } else {
    echo "Please <a href='login.php'>Login</a> first to see this page.";
  }
?>


<?php
include_once 'footer.php';
?>