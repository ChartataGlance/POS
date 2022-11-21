/** @format */

function change_qty(direction, e) {
	var index = e.currentTarget.getAttribute("index");
	if (direction == "up") {
		ITEMS[index].qty += 1;
	} else if (direction == "down") {
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

function clear_all() {
	// if (!confirm("Are You Sure ?")) return;

	ITEMS = [];
	refresh_items_display();
}

function clear_item(index) {
	ITEMS.splice(index, 1);

	refresh_items_display();
}
