<?php
include_once 'head.php';
include_once 'includes/dbh.inc.php';
include_once 'includes/functions.inc.php';
?>

<?php

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $data = getDataSinglePage($conn, $id);
}
?>

<div class="job-single">
  <main class="job-main">
    <div class="job-card">
      <div class="job-primary">
        <header class="job-header">
          <h2 class="job-title"><a href="#"><?php echo $data['0']['offers_title'] ?></a></h2>
          <div class="job-meta">
            <a class="meta-company" href="#"><?php echo $data['0']['offers_company'] ?></a>
            <span class="meta-date">Posted <?php echo timeAgo(strtotime($data['0']['offers_created_at'])) ?></span>
          </div>
          <div class="job-details">
            <span class="job-location"><?php echo $data['0']['offers_location'] ?></span>
            <span class="job-type"><?php echo $data['0']['offers_type'] ?></span>
          </div>
        </header>

        <div class="job-body">
         <p><?php echo $data['0']['offers_description'] ?></p>
        </div>
      </div>
    </div>
  </main>
  <aside class="job-secondary">
    <div class="job-logo">
      <div class="job-logo-box">
        <img src="<?php echo $data['0']['offers_imageUrl'] ?>" alt="company logo">
      </div>
    </div>
    <a href="#" class="button button-wide">Apply now</a>
  </aside>
</div>

<h2 class="section-heading">Other related jobs:</h2>
<ul class="jobs-listing">

<?php
    $offers = getRelatedPage($conn,$id);
    foreach ($offers as $offer) { ?>
     <li class="job-card">
       <div class="job-primary">
         <h2 class="job-title"><a href="details.php?id=<?php echo $offer['offers_id'] ?>" ><?php echo $offer['offers_title'] ?></a></h2>
         <div class="job-meta">
           <a class="meta-company" href="details.php?id=<?php echo $offer['offers_id'] ?>"><?php echo $offer['offers_company'] ?></a>
           <span class="meta-date">Posted <?php echo $offer['offers_created_at'] ?> days ago</span>
         </div>
         <div class="job-details">
           <span class="job-location"><?php echo $offer['offers_location'] ?></span>
           <span class="job-type"><?php echo $offer['offers_type'] ?></span>
         </div>
       </div>
       <div class="job-logo">
         <div class="job-logo-box">
           <img src="<?php echo $offer['offers_imageUrl'] ?>" alt="company-logo">
         </div>
       </div>
     </li>
   <?php } ?>

 </ul>

</ul>


<?php
include_once 'footer.php';
?>