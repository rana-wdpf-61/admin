<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
    background-color: #f8f8f8;
  }

  .invoice-container {
    max-width: 600px;
    margin: auto;
    background: white;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
  }

  .header {
    text-align: center;
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
  }

  .header span {
    font-size: 40px;
    font-weight: bold;
  }

  .details {
    display: flex;
    justify-content: space-between;
  }

  .details,
  .payment-info {
    margin-bottom: 20px;
    font-size: 14px;
  }

  .details div,
  .payment-info div {
    margin-bottom: 5px;

  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
  }

  th,
  td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
  }

  th {
    background: #f5f5f5;
    font-weight: bold;
  }

  .total-row {
    font-weight: bold;
  }

  .footer {
    text-align: center;
    margin-top: 20px;
  }

  input {
    max-width: 40px;
  }
</style>
<div class="invoice-container">
  <div class="header">
    <span>&</span> INVOICE
  </div>
  <div class="details">
    <div>
      <div>Supplier</div>
      <div><strong>Billed To:</strong>
        <?php

        echo  Supplier::html_select("supplier")
        ?>
      </div>
      <div id="phone"></div>
      <div id="email"></div>



    </div>
    <div>
       <div>WareHouse</div>
       <div>
           <?php 
              echo Warehouse::html_select()
           ?>
       </div>
       <!-- <div>Shipping Address <input type="text" id="txtShippingAddress"></div> -->
    </div>
    <div>
      <div ><strong>Invoice No:</strong> <?php echo Purchase::get_last_id() + 1 + 1000 ?></div>
      <div ><strong>Date:</strong> <span id="txtPurchaseDate"> <?php echo date("d-m-Y") ?></span></div>
      <div><strong>Delivary Date:</strong> <input type="text" id="txtDeliveryDate" value=<?php echo date("d-m-Y"); ?>> </div>
    </div>

  </div>
  <table>
    <thead>
      <tr>
        <th>Item</th>
        <th>Quantity</th>
        <th>Unit Price</th>
        <th>Discount</th>
        <th>Total</th>
        <th> <button id="clearAll" class="btn btn-danger">ClearAll</button> </th>
      </tr>
      <tr>
        <th> <?php
              echo  Product::html_select()
              ?></th>
        <th><input type="text" id="qty" name="qty"></th>
        <th><input type="text" id="uint_price" name="uint_price"></th>
        <th><input type="text" id="discount" name="discount"></th>
        <th id="total">Total</th>
        <th><button class="btn btn-info" id="btn_add">Add</button></th>
      </tr>

    </thead>

    <tbody id="data_appned">

    </tbody>
    <tfoot>
      <!-- <tr>
        <td colspan="4">&nbsp;</td>
      </tr> -->

      <tr>
        <td colspan="3">Discount</td>
        <td></td>
        <td></td>
        <td id="totaldiscount">$500</td>
      </tr>
      <tr>
        <td colspan="3">Tax</td>
        <td></td>
        <td></td>
        <td id="tax">$500</td>
      </tr>
      <tr>
        <td colspan="3">Subtotal</td>
        <td></td>
        <td></td>
        <td id="totalsubtoal">$500</td>
      </tr>

      <tr class="total-row">

        <td colspan="3">Total</td>
        <td></td>
        <td></td>
        <td id="net_total">$500</td>
      </tr>
    </tfoot>
  </table>
  <div class="footer d-flex gap-1 justify-content-between ">
    <p>Thank you!</p>
   
    <div class="payment-info ">
     
      <div><button class="btn btn-success process">Process</button> </div>
    </div>
  </div>
</div>
<script src="<?php echo $base_url ?>/js/cart.js"></script>
<script>
  $(function() {
    1 // class initialized
    let cart = new Cart("purchase");
    print_cart()
    $("#delivary").datepicker({
      dateFormat: 'dd-mm-yy'
    });

    // supplier dropdown
    $("#supplier").on("change", function() {
      let supplier_id = $(this).val();
      $.ajax({
        url: "<?php echo $base_url ?>/api/supplier/find",
        type: "get",
        data: {
          id: supplier_id
        },
        success: function(res) {
          let sup = JSON.parse(res)
          $("#phone").text(sup.supplier.mobile)
          $("#email").text(sup.supplier.email)
        },
        error: function(res) {}
      })
    })

    2 //add button 
    $("#btn_add").on("click", function() {
      let qty = $("#qty").val();
      let price = $("#uint_price").val();
      let discount = $("#discount").val();
      let product_id = $("#cmbProduct").val();
      let product_name = $("#cmbProduct option:selected").text();
      let total_discount = discount * qty;
      let subtotal = price * qty - total_discount;

      // console.log(qty, price, discount, product_id, product_name);
      let item = {
        "name": product_name,
        "item_id": product_id,
        "price": price,
        "qty": parseFloat(qty),
        "discount": discount,
        'total_discount': total_discount,
        "subtotal": subtotal
      };
      cart.save(item);
      print_cart()
    });



    // remove item

    $("body").on("click", ".delete", function() {
      let id = $(this).data("id");
      cart.delItem(id)
      print_cart() 
    });


    $("#clearAll").on("click", function() {
      cart.clearCart();
     $("#qty").val("");
       $("#uint_price").val("");
      $("#discount").val("");
      print_cart() 
    });


    function print_cart() {


      let purchase = cart.getCart();
      console.log(purchase);

      let sn = 1;
      let $bill = "";
      let subtotal = 0;
      let total_discount = 0;


      if (purchase != null) {
        let html = "";
        purchase.forEach(function(item, i) {
        
          subtotal += item.price * item.qty - item.discount;
          let itemsubtotal = item.price * item.qty - item.discount;
          total_discount += parseFloat(item.discount);
          html += `
               <tr>
                  <td>${item.name}</td>
                  <td>${item.qty}</td>
                  <td>${item.price}</td>
                  <td>${item.discount}</td>
                  <td>${itemsubtotal}</td>
                  <td><button data-id=${item.item_id} class="btn btn-warning delete">&#8722;</button></td>
                </tr>
             `;

        })


        $("#data_appned").html(html);

        //Order Summary
        $("#totaldiscount").text(total_discount);
        $("#totalsubtoal").html(subtotal);
        let tax = (subtotal * 0.05).toFixed(2);
        $("#tax").html(tax);
        $("#net_total").html(parseFloat(subtotal) + parseFloat(tax));
      }


    }


    //processs to database

    $(".process").on("click", function(){
     

      let warehouse_id=$("#cmbWarehouse").val();
      let supplier_id = $("#supplier").val();
      let purchase_date = $("#txtPurchaseDate").text();
      let delivery_date = $("#txtDeliveryDate").val();
      let discount = 0;
      let vat = 0;
      let shipping_address = "";
      let remark = "";
      let order_total = $("#net_total").text();
      let products = cart.getCart();

      //console.log(warehouse_id);
      

      $.ajax({
        url: 'http://localhost/project/admin/api/Process/save',
        type: 'POST',
        data: {
          "warehouse_id": warehouse_id,
          "supplier_id": supplier_id,
          "purchase_date": purchase_date, 
          "delivery_date":  delivery_date,    
          "shipping_address": shipping_address,
          "discount": discount,
          "vat": vat,
          "remark": remark,
          "purchase_total": order_total,
          "products": products
        },
        success: function(res) {
          console.log(res);
          cart.clearCart();
          $("#data_appned").html("");
        },

        error:function(err){
           console.log(err);
           
        }


      });



    })



  })
</script>