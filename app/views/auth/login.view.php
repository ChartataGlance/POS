<?php require views_path('partials/header') ?>
<main>
   <div class="login">
      <!--  -->
      <div class="logina"></div>
      <!--  -->
      <div class="loginb">

         <form class="login-form-div"  method="post" novalidate>
            <h1>Login...</h1>
            <p style="color: red; text-transform: capitalize; font-size: 1.2rem; text-align:center;"><?php if (isset($error['0'])) echo $error[0]; ?></p>

            <div class="login-input-div">
               <label for="email">Email</label>
               <input class="login-input-email" style="text-transform: lowercase;" value="<?= set_value('user_email') ?>" type="email" name="user_email" placeholder="Enter your Email to Login!">
               <?php if (!empty($errors['user_email'])) : ?>
                  <small class="txterr"><?= $errors['user_email'] ?></small>
               <?php endif; ?>
            </div>

            <div class="login-input-div">
               <label for="Password">Password</label>
               <input class="login-input-email" type="password" name="user_password" value="<?= set_value('user_password') ?>" placeholder="Enter your Password to Login!">
               <?php if (!empty($errors['user_password'])) : ?>
                  <small class="txterr"><?= $errors['user_password'] ?></small>
               <?php endif; ?>
            </div>

            <div class="login-btn-div">
               <button type="submit" name="login_btn" class="login-btn">Login . . .</button>
            </div>

            <div class="login-redirect-div">
               Not Registered ? <a href="index.php?page=signup">Click here to SignUp!</a>
            </div>

         </form>


      </div>
      <!--  -->
      <div class="loginc"></div>
      <!--  -->
   </div>

</main>
<?php require views_path('partials/footer') ?>
<style>
   .logina {
      grid-area: logina;
   }

   .loginc {
      grid-area: loginc;
   }

   /* --margi-auto: 0 auto ; */
   .loginb {
      grid-area: loginb;
      display: grid;
      grid-template-columns: 70% 20%;
      background-color: #1a1a1922;
      box-shadow: 1px 10px 30px rgba(14, 14, 14, 1);
      /* margin: var(--margi-auto); */
      
   }


   .login-form-div {
      max-width: var(--card-width);
      width: 100%;
      height: var(--card-heigh);
      margin-left: clamp(10%, 2vw, 2vw);
      margin-top: clamp(10%, 2vw, 2vw);
      margin-bottom: clamp(10%, 2vw, 2vw);

      background-color: rgba(34, 56, 78, 0.4);
      box-shadow: 1px 10px 30px rgba(14, 14, 14, 1);
   }

   .login-form-div h1 {
      padding: 5%;
      margin: 10%;
      font-family: var(--ubuntu);
      font-weight: 600;
      color: rgb(226, 212, 215);
      font-size: clamp(2rem, 1.8vh, 3rem);
      letter-spacing: clamp(0.3rem, 0.1vh, 0.2rem);
   }

   .login-input-div {
      margin: 10%;
      margin-left: 10%;
      margin-right: 10%;
      /* margin-bottom: 10%; */
   }


   .login-btn-div {
      margin-top: 10%;
      margin-left: 60%;
   }

   /* Content */
   label {
      color: aliceblue;
      font-size: 1rem;
   }

   .login-input-div input {
      width: 100%;
      height: 50px;
      border: 1px solid #544242;
      margin: 2px 0;
      padding: 10px;
      line-height: 40px;
      color: rgb(229, 219, 219);
      outline: none;
      border-radius: 8px;
      font-size: 1.2rem;
      font-weight: 500;
      font-family: var(--ubuntu);
      box-shadow: 0.1px 0.1px 2px rgb(209, 189, 189);
      background: rgba(34, 56, 78, 0.5);

   }

   ::placeholder {
      color: rgb(129, 136, 119);
   }

   input:focus {
      border: 2px solid #1a1a19d2;
   }

   input:focus::placeholder {
      color: #b9b9b9;
   }

   .login-redirect-div a {
      color: aliceblue;
      font-size: 1rem;
   }

   .login-redirect-div {
      color: aliceblue;
      font-size: 1.2rem;
      padding: 5%;
   }


   .login-btn {
      width: 80%;
      height: 50px;
      line-height: 40px;
      font-size: 1.3rem;
      font-weight: 500;
      font-family: var(--ubuntu);
      color: rgb(229, 219, 219);
      /* background: rgba(223, 227, 230, 0.1); */
      background: rgba(34, 56, 78, 0.5);
      border: 1px solid #544242;
      margin: 0 2px;
      border-radius: 8px;
      box-shadow: 6px 6px 10px -1px rgba(26, 1, 1, 0),
         -6px -6px 10px -1px rgba(255, 255, 255, 0);
      cursor: pointer;
      transition: transform 0.5s;
   }

   .login-btn:hover {
      box-shadow: inset 4px 4px 6px -1px rgba(2, 1, 1, 0.2),
         inset -2px -2px 2px -1px rgba(255, 255, 255, 1),
         -0.5px -0.5px 0px rgba(255, 255, 255, 1),
         0.5px 0.5px 0px rgba(0, 0, 0, 0.15), 0px 12px 10px -10px rgba(0, 0, 0, 0);
      border: 1px solid rgba(0, 0, 0, 0.01);
      transform: translateY(2px);
   }
</style>