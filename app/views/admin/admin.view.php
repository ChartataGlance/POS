<?php require views_path('partials/header') ?>
<main>
   <style>
      .nav-link-li {
         color: aliceblue;
         padding: 20px;

      }

      .navbar-links-ul {
         display: flex;
         justify-content: center;
      }
      .active{
         /* font-size: x-large; */
         color: greenyellow;
      }
   </style>
   <div class="navbar-nav">
      <ul class="navbar-links-ul">
      <li class="nav-item"><a class="nav-link-li <?= ! $tab || $tab == 'dashboard' ?  'active' : '' ?>" href="index.php?page=admin&tab=dashboard">dashboard</a></li>
      <li class="nav-item"><a class="nav-link-li <?= ! $tab || $tab == 'users' ?      'active' : '' ?>" href="index.php?page=admin&tab=users">  users</a></li>
      <li class="nav-item"><a class="nav-link-li <?= ! $tab || $tab == 'products' ?   'active' : '' ?>" href="index.php?page=admin&tab=products">products</a></li>
      </ul>
   </div>
   <div >
      <center><h2 style="color: aliceblue;"><?=strtoupper($tab) ?></h2></center>
      <?php
      switch($tab){
         case 'products':
            require views_path('admin/products');
            break;
            default:
            break;
      }
      ?>
      
   </div>

</main>
<?php require views_path('partials/footer') ?>