<?php defined("ROOTPATH") ? "" : die(); ?>
<?php require views_path('partials/header'); ?>
<style>
	.js-items {
		border: 2px solid #fff;
		padding: 10px;
		color: gray;
		background: rgba(102, 102, 102, 0.059);
		display: grid;
		max-width: 80%;
		grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
		justify-items: center;
	}

	.items-card {
		box-shadow: 0.2px 0.2px 3px #fff;
		padding: 20px;
	}

	.cart-item-link {
		padding: 10px;
		box-shadow: 0.2px 0.2px 3px #fff;
		color: gray;

	}

	.js-cart-count {
		color: #fff;
	}

	.cart-html {
		color: gainsboro;

	}

	.qty-input {
		width: 60px;
		line-height: 20px;
		font-size: 2rem;
		padding: 10px;

	}
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
			<tr>


			</tr>
		</tbody>
	</table>
	<div class="js-gtotal" style="font-size:2rem; color:#fff;">Total:£ 00.00</div>
	<div>
		<button onclick="clear_all()">Clear Cart</button>
	</div>
</main>


<script>
	var PRODUCTS = [];
	var ITEMS = [];
	var BARCODE = false;


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
					handle_result(ajax.responseText);
				} else {
					console.log("an error." + ajax.status + " Err TXT:" + ajax.statusText);
					console.log(ajax);
				}
				//clear main input
				if(BARCODE)
				{
					main_input.value = "";
					main_input.focus();

				}
				BARCODE = false;
			}
		});
		ajax.open('post', 'index.php?page=ajaxa', true);
		ajax.send(JSON.stringify(data));
	}

	function handle_result(result) {
		var obj = JSON.parse(result)

		if (typeof obj != "undefined") {
			if (obj.data_type == "search") {
				var mydiv = document.querySelector(".js-items");
				mydiv.innerHTML = "";
				PRODUCTS = [];

				if (obj.data != "") {
					PRODUCTS = obj.data;
					for (var i = 0; i < obj.data.length; i++) {
						mydiv.innerHTML += product_html(obj.data[i], i);
					}
					if(BARCODE){
						add_item_from_index(0)
					}
				} else {
					if (BARCODE){ alert("item not IN DataBase")}
				}


			}
		}
	}


	function product_html(data, index) {
		return `
		<div class="items-card">
		 ${data.id}<br>
		 ${data.amount}<br>
		 ${data.barcode}<br>
		 ${data.description}<br>
		 <img index="${index}" width="100px" src="${data.image}"><br>
		 <button style="padding:5px;">view more</button>
		 </div>
		
		`;
	}
	// index="${index}"
	function cart_html(data, index) {
		return `
		   <tr class="cart-html">
				<td>${data.id}</td>
				<td>${data.barcode}</td>
				<td>${data.description}</td>
		      <td><img  width="100px" src="${data.image}"></td>
				   <td><div style="max-width:150px">
		             <span index="${index}" class="qty-input"  onclick="change_qty('down',event)"  style="cursor: pointer; padding:10px;">-</span>
		            <input index="${index}" class="qty-input"  onblur= "change_qty('input',event)"   value="${data.qty}">
		             <span index="${index}" class="qty-input"  onclick="change_qty('up',event)"  style="cursor: pointer; padding:10px;">+</span>
	            </div></td>
				
				<td>£${data.amount}</td>
			</tr>
		`;
	}

	function add_item_from_index(e) {
		if (e.target.tagName == "IMG") {
			var index = e.target.getAttribute("index");

			for (var i = ITEMS.length - 1; i >= 0; i--) {
				if (ITEMS[i].id == PRODUCTS[index].id) {
					ITEMS[i].qty += 1;
					refresh_items_display();
					return;
				}
			}
			var temp = PRODUCTS[index]
			ITEMS.push(temp);
			temp.qty = 1
			refresh_items_display();
		}
	}

	function add_item(e) {
		if (e.target.tagName == "IMG") {
			var index = e.target.getAttribute("index");

			add_item_from_index(e);
		}
	}

	function refresh_items_display() {
		var cart_count = document.querySelector(".js-cart-count");
		cart_count.innerHTML = ITEMS.length;

		var cart_div = document.querySelector(".js-cart")
		cart_div.innerHTML = "";
		var grant_total = 0;

		for (var i = ITEMS.length - 1; i >= 0; i--) {
			cart_div.innerHTML += cart_html(ITEMS[i], i);
			grant_total += (ITEMS[i].qty * ITEMS[i].amount);
		}

		var gtotal_div = document.querySelector(".js-gtotal");
		gtotal_div.innerHTML = "Total: £" + grant_total;
		// console.log(grant_total);
	}

	function clear_all() {
	
			// if (!confirm("Are You Sure ?")) return;
		ITEMS = [];

		refresh_items_display();
	}

	function change_qty(direction, e) {
		var index = e.currentTarget.getAttribute("index");
		if (direction == "up") {
			ITEMS[index].qty += 1;
		} else
		if (direction == "down") {
			ITEMS[index].qty -= 1;
		} else {
			ITEMS[index].qty = parseInt(e.currentTarget.value);
		}
		//not less then 1
		if (ITEMS[index].qty < 1) {
			ITEMS[index].qty = 1;
		}
		refresh_items_display();
	}

	function check_for_enter_key(e) {
		if (e.keyCode == 13) {
			BARCODE = true;
		}

	}

	send_data({
		data_type: "search",
		text: ""
	});
</script>
<?php require views_path('partials/footer'); ?>