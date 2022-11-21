/** @format */

function add_item_from_index(index) {
	//check if items exists
	for (var i = ITEMS.length - 1; i >= 0; i--) {
		if (ITEMS[i].id == PRODUCTS[index].id) {
			ITEMS[i].qty += 1;
			refresh_items_display();
			return;
		}
	}
	var temp = PRODUCTS[index];
	temp.qty = 1;
	ITEMS.push(temp);
	refresh_items_display();
}

function add_item(e) {
	if (e.target.tagName == "IMG") {
		var index = e.target.getAttribute("index");
		add_item_from_index(index);
	}
}

function refresh_items_display() {
	var cart_count = document.querySelector(".js-cart-count");
	cart_count.innerHTML = ITEMS.length;

	var cart_div = document.querySelector(".js-cart");
	cart_div.innerHTML = "";
	var grant_total = 0;

	for (var i = ITEMS.length - 1; i >= 0; i--) {
		cart_div.innerHTML += cart_html(ITEMS[i], i);
		grant_total += ITEMS[i].qty * ITEMS[i].amount;
	}

	var gtotal_div = document.querySelector(".js-gtotal");
	gtotal_div.innerHTML = "Total: £" + grant_total;
	GTOTAL = grant_total;
}
function handle_result(result) {
	// console.log(result);
	var obj = JSON.parse(result);

	if (typeof obj != "undefined") {
		if (obj.data_type == "search") {
			var mydiv = document.querySelector(".js-items");
			mydiv.innerHTML = "";
			PRODUCTS = [];
			// var mydiv = document.querySelector(".js-items");
			if (obj.data != "") {
				PRODUCTS = obj.data;
				for (var i = 0; i < obj.data.length; i++) {
					mydiv.innerHTML += product_html(obj.data[i], i);
				}
				if (BARCODE && PRODUCTS.length == 1) {
					add_item_from_index(0);
				}
			}
		}
	}
}
