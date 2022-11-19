<?php require views_path('partials/header') ?>

<main>
   <div class="signup">
      <!--  -->
      <div class="signupa"></div>
      <!--  -->
      <div class="signupb">
         <form class="signup-form-div" autocomplete="off" method="post" novalidate>

            <h1>Signup...</h1>

            <div class="signup-input-div">
               <p style="color: red; text-transform: capitalize; font-size: 1.2rem; text-align:center;"><?php if (isset($error['0'])) echo $error[0]; ?></p>
               <label for="name">Name</label>
               <input style="text-transform: capitalize;" type="name" value="<?= set_value('user_name')?>" name="user_name" placeholder="Your Name to Signup!">
               <?php if(!empty($errors['user_name'])): ?>
                  <small class="txterr" ><?= $errors['user_name'] ?></small>
                  <?php endif;?>
            </div>


            <div class="signup-input-div">
               <label for="email">Email</label>
               <input style="text-transform: lowercase;" type="email"  value="<?= set_value('user_email')?>" name="user_email" placeholder=" Email to Signup!">
               <?php if(!empty($errors['user_email'])): ?>
                  <small class="txterr" ><?= $errors['user_email'] ?></small>
                  <?php endif;?>

            </div>


            <div class="signup-input-div">
               <label for="Password">Password</label>
               <input type="password"  value="<?= set_value('user_password')?>" name="user_password" placeholder="Enter your Password to Signup!">
               <?php if(!empty($errors['user_password'])): ?>
                  <small class="txterr"><?= $errors['user_password'] ?></small>
                  <?php endif;?>
            </div>

            <div class="signup-input-div">
               <label for="confirm-Password">Confirm Password</label>
               <input type="password" name="confirm_password" value="<?= set_value('confirm_password')?>" placeholder="Confirm your Password!">
               <?php if(!empty($errors['confirm_password'])): ?>
                  <small class="txterr"><?= $errors['confirm_password'] ?></small>
                  <?php endif;?>
            </div>

            <div class="signup-btn-div">
               <button type="submit" name="signup_btn" class="signup-btn">SignUp. . .</button>
            </div>

            <div class="signup-redirect-div">
               Already Registered ? <a href="index.php?page=login">Click Here to Login!</a>
            </div>

         </form>
      </div>
      <div class="signupc"></div>
   </div>
   <style>
      .signupa {
         grid-area: signupa;
      }

      .signupc {
         grid-area: signupc;
      }

      .signupb {
         grid-area: signupb;
         display: grid;
         grid-template-columns: 70% 20%;
         background-color: #1a1a1922;
         box-shadow: 1px 10px 30px rgba(14, 14, 14, 1);
         /* margin: var(--margi-auto); */
      }


      .signup-form-div {
         max-width: var(--card-width);
         width: 100%;
         height: var(--card-heigh);
         margin-left: clamp(10%, 2vw, 2vw);
         margin-top: clamp(10%, 2vw, 2vw);
         margin-bottom: clamp(10%, 2vw, 2vw);
         background-color: rgba(34, 56, 78, 0.1);
         box-shadow: 1px 10px 30px rgba(14, 14, 14, 1);
      }

      /* fix div */



      .signup-form-div h1 {
         padding: 5%;
         margin-top: 5%;
         font-family: var(--ubuntu);
         font-weight: 600;
         color: rgb(252, 252, 252);
         font-size: clamp(2rem, 1.8vh, 3rem);
         letter-spacing: clamp(0.3rem, 0.1vh, 0.2rem);
      }

      .signup-input-div {
         margin: 5%;
         margin-left: 10%;
         margin-right: 10%;
      }

      .signup-btn-div {
         margin-top: 10%;
         margin-left: 60%;
      }

      /* Content */

      .signup-input-div input {
         width: 100%;
         height: 50px;
         border: 1px solid #544242;
         margin: 2px 0;
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

      .signup-redirect-div a {
         color: aliceblue;
         font-size: 1rem;
      }

      .signup-redirect-div {
         color: aliceblue;
         font-size: 1.2rem;
         margin-left: 5%;
      }


      .signup-btn {
         width: 80%;
         height: 50px;
         line-height: 40px;
         font-size: 1.2rem;
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

      .signup-btn:hover {
         box-shadow: inset 4px 4px 6px -1px rgba(2, 1, 1, 0.2),
            inset -2px -2px 2px -1px rgba(255, 255, 255, 1),
            -0.5px -0.5px 0px rgba(255, 255, 255, 1),
            0.5px 0.5px 0px rgba(0, 0, 0, 0.15), 0px 12px 10px -10px rgba(0, 0, 0, 0);
         border: 1px solid rgba(0, 0, 0, 0.01);
         transform: translateY(2px);
      }
      .txterr{
         color: tomato;
      }
      label{
         color: gray;
         padding: 3px;
      }
   </style>
</main>
<?php require views_path('partials/footer') ?>