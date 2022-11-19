<?php require views_path('partials/header') ?>
<main>
   <style>
      th {
         background: #ffffff22;
         color: #ffffff;
         font-size: larger;
         padding: 5px;
         border-radius: 7px;
         font-family: 'Ubuntu'sans-serif;
      }

      .qtyinput {
         width: 3rem;
      }
   </style>
   <table width="100%" style="background: rgb(32,45,78); padding: 10px;">
      <hr>
      <tr>

         <th>img</th>
         <th>Description</th>
         <th>amount</th>
         <th>Item Total</th>
         <th></th>
      </tr>
      <tbody style="background:#ffffff; text-align:center;">

         <form action="cart.php?action=remove&id=$productid" method="post">
            <tr>
               <td><img width="180px" src="https://i.ibb.co/zXmHzBk/category-a.png"></td>
               <td>$productname</td>
               <td>$$productprice</td>
               <td>Qty<input class="qtyinput" value="1" type="number"> <br> total=$</td>
               <td><button style="padding:5px; width:100px; margin-bottom:15px;" type="submit" name="wishlist">Save</button>
               <br><button style="padding:5px; width:100px; margin-bottom: 0px;" type="submit" name="remove">Remove</button>
               </td>
            </tr>
         </form>


      </tbody>


   </table>


   <hr>
</main>
<?php require views_path('partials/footer') ?>