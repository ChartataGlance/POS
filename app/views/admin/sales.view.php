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
<table width="100%">
   <tr>
      <th>Barcode</th>
      <th>Receipt No</th>
      <th>Description</th>
      <th>Qty</th>
      <th>Amount</th>
      <th>Total</th>
      <th>Cashier</th>
      <th>Date</th>
      <th>
         <a href="index.php?pg=home">
            <button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add new</button>
         </a>
      </th>
   </tr>



   <!--  [id] => 16 
         [barcode] => 2222801121 
         [receipt_no] => 6 
         [description] => nov product 
         [qty] => 5 [amount] => 8.00 
         [total] => 40.00 
         [date] => 2022-11-21 22:40:31 
         [user_id] => 1  -->


   <?php if (!empty($saleslist)) : ?>

      <?php foreach ($saleslist as $sale) : ?>
         <tr>
            <td><?= esc($sale['barcode']) ?></td>
            <td><?= esc($sale['receipt_no']) ?></td>
            <td>
               <?= esc($sale['description']) ?>
            </td>
            <td><?= esc($sale['qty']) ?></td>
            <td><?= esc($sale['amount']) ?></td>
            <td><?= esc($sale['total']) ?></td>
            <?php
            // $cashier = get_user_by_id($sale['user_id']);
            // if (empty($cashier)) {
            //    $name = "Unknown";
            //    $namelink = "#";
            // } else {
            //    $name = $cashier['username'];
            //    $namelink = "index.php?pg=profile&id=" . $cashier['id'];
            // }
            ?>
            <td>
               <!-- <a href="<?= $namelink ?>">
		                  <?= esc($name) ?>
		               </a> -->
            </td>

            <td><?= date("jS M, Y", strtotime($sale['date'])) ?></td>
            <td>
               <a href="index.php?pg=sale-edit&id=<?= $sale['id'] ?>">
                  <button class="btn btn-success btn-sm">Edit</button>
               </a>
               <a href="index.php?pg=sale-delete&id=<?= $sale['id'] ?>">
                  <button class="btn btn-danger btn-sm">Delete</button>
               </a>
            </td>
         </tr>
      <?php endforeach; ?>
   <?php endif; ?>
</table>