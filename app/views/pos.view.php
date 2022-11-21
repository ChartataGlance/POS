<?php defined("ROOTPATH") ? "" : die(); ?>
<?php require views_path('partials/header'); ?>
<link rel="stylesheet" href="assets/css/modal.css">
<style>


</style>
<main>
	<div class="cart-item-link">
		<Center>
			<h1><span class="js-cart-count">0</span> Items in YOUR CART</h1>
		</Center>
	</div>

	<input onkeyup="check_for_enter_key(event)" oninput="search_item(event)" type="text" class="js-search">
	<div onclick="add_item(event)" class="js-items"></div>

	<table width="100%">
		<tr>
			<th>image</th>
			<th>description</th>
			<th>amount</th>
		</tr>
		<tbody class="js-cart" width="100%">
			<tr></tr>
		</tbody>
	</table>

	<div class="js-gtotal" style="font-size:2rem; color:#fff;"></div>
	<center>
		<div>
			<button class="btn-gen" onclick="clear_all()">Clear Cart</button>
			<button class="btn-gen" role="close-button" onclick="show_modal('checkout')">Checkout</button>
		</div>
	</center>


	<div onclick="hide_modal(event,'checkout')" class="popup-backdrop checkout hide" role="close-button">
		<div class="popup">
			<div class="tender">
				<center>
					<h1>Checkout</h1>
				</center>
				<button class="btn-close" role="close-button" onclick="hide_modal(event,'checkout')">cancel</button>
				<input type="number" maxlength='7' placeholder="1000.00" class="input-pay-amount">
				<button role="close-button" onclick="validate_amount_paid(event)" class="btn-next-change">Calculate</button>
			</div>
		</div>
	</div>


	<div onclick="hide_modal(event,'change')" class="popup-backdrop change hide" role="close-button">
		<div class="popup">
			<div class="tender">
				<center>
					<h1>Change due</h1>
				</center>
				<div class="change-amount"></div>
				<button class="btn-next-change">Next</button>
			</div>
		</div>
	</div>
</main>

<script>
	var PRODUCTS = [];
	var ITEMS = [];
	var BARCODE = false;
	var main_input = document.querySelector(".js-search")
	var GTOTAL = 0;
	var CHANGE = 0;

	function search_item(e) {
		var text = e.target.value.trim();
		var data = {};
		data.data_type = "search";
		data.text = text;
		send_data(data);
	}

	function send_data(data) {
		var ajax = new XMLHttpRequest();
		ajax.addEventListener('readystatechange', function(e) {
			if (ajax.readyState === 4) {



				if (ajax.status == 200) {
					if (ajax.responseText.trim() != "") {
						handle_result(ajax.responseText);
					} else {
						if (BARCODE) {
							alert("item not IN DataBase")
						}
					}

				} else {
					console.log("an error." + ajax.status + " Err TXT:" + ajax.statusText);
					console.log(ajax);
				}
				//clear main input
				if (BARCODE) {
					main_input.value = "";
					main_input.focus();

				}
				BARCODE = false;
			}
		});
		ajax.open('post', 'index.php?page=ajaxa', true);
		ajax.send(JSON.stringify(data));
	}




	function show_modal(modal) {
		if (modal == "checkout") {
			if (ITEMS.length == 0) {
				// alert("NOThing in the Cart!");
				return;
			}
			var mydiv = document.querySelector(".checkout");
			mydiv.classList.remove("hide");
			mydiv.querySelector(".input-pay-amount").value = "";
			mydiv.querySelector(".input-pay-amount").focus();
		} else
		if (modal == "change") {
			var mydiv = document.querySelector(".change");
			mydiv.classList.remove("hide");
			mydiv.querySelector(".change-amount").innerHTML = CHANGE;

		}
	}

	function hide_modal(e, modal) {
		if (e == true || e.target.getAttribute("role") == "close-button") {
			if (modal == "checkout") {
				var mydiv = document.querySelector(".checkout");
				mydiv.classList.add("hide");
			} else {
				if (modal == "change") {
					var mydiv = document.querySelector(".change");
					mydiv.classList.add("hide");
				}

			}

		}

	}

	function validate_amount_paid(e) {
		var amount = e.currentTarget.parentNode.querySelector(".input-pay-amount").value.trim();
		if (amount == "") {
			// alert("enter amount You Jackass!");
			return;
		}
		// mydiv.querySelector(".input-pay-amount").focus();
		amount = parseFloat(amount);
		CHANGE = amount - GTOTAL;
		CHANGE = CHANGE.toFixed(2);
		if (amount < GTOTAL) {
			var mydiv = document.querySelector(".change-amount");
			mydiv.style.backgroundColor = "red";
		}

		CHANGE = amount - GTOTAL;
		CHANGE = CHANGE.toFixed(2);

		hide_modal(true, 'checkout');
		show_modal('change');

		ITEMS_NEW = [];
		for(var i = 0; i<ITEMS.length; i++)
		{
			var tmp = {};
			tmp.id = (ITEMS[i]['id'] );
			tmp.qty = (ITEMS[i]['qty']);
			
			ITEMS_NEW.push(tmp);
		}

		send_data({
			data_type: "checkout",
			text: ITEMS_NEW
		})
		console.log(ITEMS_NEW);
		

		ITEMS = [];
		refresh_items_display()

	}





	function check_for_enter_key(e) {
		if (e.keyCode == 13) {
			BARCODE = true;
			search_item(e);
		}
	}


	window.onload = main_input.focus();
	send_data({
		data_type: "search",
		text: ""
	});

</script>
<script src="assets/js/handleresult.js"></script>
<script src="assets/js/loadcard.js"></script>
<script src="assets/js/in_de_crease.js"></script>
<?php require views_path('partials/footer'); ?>