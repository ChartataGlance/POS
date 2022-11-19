<h1>products</h1>
<div>
   <style>
      th {
         background: #ffffff22;
         color: #ffffff;
         font-size: larger;
         padding: 5px;
         border-radius: 7px;
         font-family: 'Ubuntu'sans-serif;
         text-transform: capitalize;
      }
   </style>
   <table width="100%" style="background: rgb(32,45,78); padding: 10px;">
      <tr>
         <th>Barcode</th>
         <th>Product</th>
         <th>qty</th>
         <th>price</th>
         <th>image</th>
         <th> <a href="index.php?page=product-new">addNew</a></th>
      </tr>
      <?php if (!empty($productlist)) : ?>
         <?php foreach ($productlist as $product) : ?>
            <tr>
               <td><?= esc($product['barcode']) ?></td>
               <td>
                  <!-- Product-detaile-link -->
                  <a href="index.php?page=product-detaile&id=<?= esc($product['id']) ?>" >
                  <?= esc($product['description']) ?>
                  </a>
               </td>
               <td><?= esc($product['qty']) ?></td>
           
               <td><?= esc($product['amount']) ?></td>
               <td><img width="60px" src="<?= esc($product['image']) ?>" alt=""></td>
               <td><?= date("jS M, Y", strtotime($product['date'])) ?></td>
               <td>
               <a href="index.php?page=product-edit&id=<?= esc($product['id']) ?>" >
                  <button>Edit</button>
               </a>
               <a href="index.php?page=product-delete&id=<?= esc($product['id']) ?>" >
                  <button>Delete</button>
               </a>

               </td>

            </tr>

         <?php endforeach; ?>

      <?php endif; ?>
   </table>
</div>