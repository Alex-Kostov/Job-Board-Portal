 <?php
  include_once 'head.php';
  include_once 'includes/functions.inc.php';
  include_once 'includes/dbh.inc.php';
  ?>

 <ul class="jobs-listing">

 <?php
    $offers = getDataHomePage($conn);
    foreach ($offers as $offer) { ?>
     <li class="job-card">
       <div class="job-primary">
         <h2 class="job-title"><a href="details.php?id=<?php echo $offer['offers_id'] ?>" ><?php echo $offer['offers_title'] ?></a></h2>
         <div class="job-meta">
           <a class="meta-company" href="details.php?id=<?php echo $offer['offers_id'] ?>"><?php echo $offer['offers_company'] ?></a>
           <span class="meta-date">Posted <?php echo timeAgo(strtotime($offer['offers_created_at'])) ?></span>
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

 <?php
  include_once 'footer.php';
  ?>