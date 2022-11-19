<?php require views_path('partials/header') ?>
<main>
	<style>
		.form-control {
			display: block;
			width: 60%;
			line-height: 20px;
			padding: 20px;
			font-size: 1rem;
			color: aliceblue;
			background: #000;
		}

		.mb-3 {
			margin-bottom: 5px;
			padding: 10px;
		}

		.form-label,
		.input-group-text {
			color: gray;
			padding: 10px;
		}

		.form-div {
			max-width: 677px;
			min-width: 320px;

		}
	</style>
	<center>
		<h1 style="color:tomato ;"> Are You Sure do You Want Delete?</h1>
		<div class="form-div">
			<?php if (!empty($row)) : ?>

				<form width="200px" method="post" enctype="multipart/form-data">

					<h1 class="form-label">Edit Product</h1>
					<?= set_value('barcode', $row['barcode']) ?>
					<div class="mb-3">
						<label for="productControlInput1" class="form-label">Product description</label>
						<input disabled value="<?= set_value('description', $row['description']) ?>" name="description" type="text" class="form-control <?= !empty($errors['description']) ? 'border-danger' : '' ?>" id="productControlInput1" placeholder="Product description">
						<?php if (!empty($errors['description'])) : ?>
							<small class="text-danger"><?= $errors['description'] ?></small>
						<?php endif; ?>
					</div>

					<div class="mb-3">
						<label for="barcodeControlInput1" class="form-label">Barcode <small class="text-muted">(optional)</small></label>
						<input readonly value="<?= set_value('barcode', $row['barcode']) ?>" name="barcode" type="text" class="form-control <?= !empty($errors['barcode']) ? 'border-danger' : '' ?>" id="barcodeControlInput1" placeholder="Product barcode">
						<?php if (!empty($errors['barcode'])) : ?>
							<small class="text-danger"><?= $errors['barcode'] ?></small>
						<?php endif; ?>
					</div>

					<div class="input-group mb-3">
						<span class="input-group-text">Qty:</span>
						<input value="<?= set_value('qty', $row['qty']) ?>" name="qty" value="1" type="number" class="form-control <?= !empty($errors['qty']) ? 'border-danger' : '' ?>" placeholder="Quantity" aria-label="Quantity">
						<span class="input-group-text">Amount:</span>
						<input value="<?= set_value('amount', $row['amount']) ?>" name="amount" value="0.00" step="0.05" type="number" class="form-control <?= !empty($errors['amount']) ? 'border-danger' : '' ?>" placeholder="Amount" aria-label="Amount">
					</div>

					<?php if (!empty($errors['qty'])) : ?>
						<small class="text-danger"><?= $errors['qty'] ?></small>
					<?php endif; ?>
					<?php if (!empty($errors['amount'])) : ?>
						<small class="text-danger"><?= $errors['amount'] ?></small>
					<?php endif; ?>

					<div class="mb-3">
						<label for="formFile" class="form-label">Product Image</label>
						<input name="image" class="form-control <?= !empty($errors['image']) ? 'border-danger' : '' ?>" type="file" id="formFile">
						<?php if (!empty($errors['image'])) : ?>
							<small class="text-danger"><?= $errors['image'] ?></small>
						<?php endif; ?>
					</div>
					<br>
					<img width="200px" src="<?= set_value('image', $row['image']) ?>">

					<br>
					<button>Delete</button>

					<a href="index.php?page=admin&tab=products">
						<button type="button">Cancel</button>
					</a>
				</form>

			<?php else : ?>
				<p>That Product Not Found?</p>
				<a href="index.php?page=admin&tab=products">
					<button type="button">Back to Product Page</button>
				</a>
			<?php endif; ?>
		</div>
	</center>
</main>
<?php require views_path('partials/footer') ?>