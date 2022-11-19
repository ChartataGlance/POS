<?php require views_path('partials/header') ?>
<link rel="stylesheet" href="assets/css/input.css">
<main>
   <form action="./subscriberData.php" method="post">

      <div class="form-group">
         <span>Name</span>
         <input class="form-field" type="text" name="user_name" placeholder="Name">
      </div>
      <div class="form-group">
         <span>Email</span>
         <input style="text-transform: lowercase;" class="form-field" type="email" name="user_email" placeholder="email">
      </div>
      <div class="form-group">
         <input class="form-field-btn" type="submit" value="Subscribe">
      </div>
   </form>
</main>
<?php require views_path('partials/footer') ?>