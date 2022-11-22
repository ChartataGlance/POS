<style>
   .logo {

      font-size: 2.2rem;
      font-weight: 700;
      letter-spacing: 0.4rem;
      color: rgb(218, 216, 226);
   }

   nav {
      display: flex;
      justify-content: space-around;
      align-items: center;
      background-color: var(--clr-shade-base);
      min-height: 100px;
      border-radius: 2rem 2rem 0 0;
      /* box-shadow: var(--box-shadow); */
   }
   .navbar-nav{
      padding: 10px;
   }


   .con-link a {
      display: flex;
      justify-content: center;
      align-items: center;
      color: aqua;
      background: rgba(25, 118, 185, 0.2);
      height: 39px;
      width: 59px;
      margin-left: 15px;
      border-radius: 10px;
      box-shadow: 6px 6px 10px -1px rgba(26, 1, 1, 0.2),
         -6px -6px 10px -1px rgba(255, 255, 255, 0.02);
      cursor: pointer;
      transition: transform 0.5s;
   }



   .con-link a:hover {
      box-shadow: inset 4px 4px 6px -1px rgba(2, 1, 1, 0.2),
         inset -2px -2px 2px -1px rgba(255, 255, 255, 1),
         -0.5px -0.5px 0px rgba(255, 255, 255, 1),
         0.5px 0.5px 0px rgba(0, 0, 0, 0.15),
         0px 12px 10px -10px rgba(0, 0, 0, 0.0);
      border: 1px solid rgba(0, 0, 0, 0.01);
      transform: translateY(2px);
   }
   form{
      justify-self: center;
   }
</style>
<body>
<nav>
   <a href="index.php?page=home">
      <center>
         <h1 class="logo">ChartataGlance</h1>
      </center>
   </a>
   <ul style=" display: flex; " class="con-link">
      <a href="https://twitter.com/Chartataglance">
         <img src="https://firebasestorage.googleapis.com/v0/b/chartataglancecom.appspot.com/o/twitter.svg?alt=media&token=87d580b1-4b98-44cf-8336-4a43bacf7e57" alt="twitter">
      </a>
      <a href="https://t.me/ChartataGlance">
         <img src="https://firebasestorage.googleapis.com/v0/b/chartataglancecom.appspot.com/o/tele.svg?alt=media&token=fe8a26e1-9b9c-4fbd-9d15-372ce200d45d" alt="tele">

      </a>
      <a href="https://wa.me/447833322251">
         <img src="https://firebasestorage.googleapis.com/v0/b/chartataglancecom.appspot.com/o/whatsup.svg?alt=media&token=2291fef3-2dbe-4c38-85f7-c4c9b9771bd9" alt="whatsup">
      </a>
   </ul>
</nav>
<style>
.nav-link-li{
   color: aliceblue;
   padding: 20px;
   
}
.navbar-links-ul{
   display: flex;
   justify-content: center;
}
</style>
<div class="navbar-nav">
   <ul class="navbar-links-ul">
      <li class="nav-item"><a class="nav-link-li active" aria-current="page" href="index.php?page=home">home</a></li>
      <li class="nav-item"><a class="nav-link-li" href="index.php?page=admin">admin</a></li>
      <?php if(! Auth::logged_in()):?>
      <li class="nav-item"><a class="nav-link-li" href="index.php?page=login">login</a></li>
      <li class="nav-item"><a class="nav-link-li" href="index.php?page=signup">signup</a></li>
      <?php endif; ?>

      <li class="nav-item"><a class="nav-link-li" href="index.php?page=shop">Shop</a></li>
      <li class="nav-item"><a class="nav-link-li" href="index.php?page=pos">pos</a></li>
      <li class="nav-item"><a class="nav-link-li" href="index.php?page=cart">Cart</a></li>
      <li class="nav-item"><a class="nav-link-li" href="index.php?page=product-new">product-new</a></li>
   </ul>
</div>

