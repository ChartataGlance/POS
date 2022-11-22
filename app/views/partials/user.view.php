<div class="navbar-nav">
<ul class="navbar-links-ul">
<?php if(Auth::logged_in()):?>
      <li class="nav-item"><a class="nav-link-li" href="index.php?page=profile">profile</a></li>
      <li class="nav-item"><a class="nav-link-li" href="index.php?page=profile-settings">profile-settings</a></li>
      <li class="nav-item"><a class="nav-link-li" href="index.php?page=subscribe">subscribe</a></li> 
      <li class="nav-item"><a class="nav-link-li" href="index.php?page=logout">logout</a></li>
      <?php endif; ?>
   </ul>
</div>