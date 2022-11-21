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
         
         <td>£${data.amount * data.qty}</td>
         <td><button onclick="clear_item(${index})" >  Remove <br> <span>X</span></button></td>
      </tr>
   `;
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


