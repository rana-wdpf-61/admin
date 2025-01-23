<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .invoice-container {
            max-width: 1200px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #007BFF;
            padding-bottom: 10px;
        }

        .company-details {
            text-align: left;
        }

        .company-details h2 {
            margin: 0;
        }

        .invoice-details {
            text-align: right;
            display: flex;
        }

        .invoice-title {
            font-size: 40px;
            font-weight: bold;
            color: #007BFF;
            margin-right: 650px;
        }

        .invoice-body {
            margin-top: 20px;
        }

        .billing-info,
        .items-table {
            width: 100%;
            margin-bottom: 20px;
        }

        .billing-info td {
            padding: 5px 0;
        }

        .items-table th,
        .items-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
           
        }

        table,
        tr,
        th,
        td {
            empty-cells: hide;
           
        }

        .total-row {
            font-weight: bold;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #888;
        }

        #DeliveryDate {
            max-width: 80px;
        }

        input {
            max-width: 100px;
        }

        .container-para {
            width: 100%;
            /* border: 1px solid black;*/
            margin-bottom: 30px
        }

        .child-container--one {

            width: 40%;
            float: left;
            /* border: 1px solid black; */

        }

        .child-container--two {

            width: 40%;
            /* border: 1px solid black; */
            float: right;

        }
    </style>
</head>


<body>
    <main class="container">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">CREATE PURCHASES</div>

            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Create a New Purchases</li>
                    </ol>
                </nav>
            </div>

            <div class="ms-auto">
            <div class="btn-group">
                    <a class="btn btn-primary" href="<?php echo $base_url?>/purchases/index"><i class="bi bi-arrow-left"></i> Go Back</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h4>Create a Purchases</h4>
                        <div class="invoice-header">
                        </div>
                        <div class="invoice-body">
                            <div class="row g-3 align-items-center" style="margin-left: 390px;">
                                <div class="col-auto">
                                    <label for="inputPassword6" class="col-form-label"><span style="font-size:16px; font-weight:600;">Purchase Date :</span> </label>
                                </div>
                                <div class="col-auto">
                                    <input type="date" id="purchases_date" name="name" class="form-control">
                                </div>
                                <div class="col-auto">
                                    <label for="inputPassword6" class="col-form-label"><span style="font-size:16px; font-weight:600;">Delivery Date :</span> </label>
                                </div>
                                <div class="col-auto">
                                    <input type="date" id="Purchases_deliveryDate" name="name" class="form-control" >
                                </div>
                            </div> <br> <br>
                            <!-- <div class="row row col-md-md-12">
                                <div class="col-md-3">

                                </div>
                                <div class="col-md-3">
                                    <label for="" class="form-label">Purchase Date :</label>
                                    <input type="date" id="purchases_date" name="name" class="form-control" value="<?php // echo date("d-m-Y") 
                                                                                                                    ?>">
                                </div>
                                <div class="col-md-3">
                                    <label for="" class="form-label">Delivery Date :</label>
                                    <input type="date" id="Purchases_deliveryDate" name="name" class="form-control" value="<?php // echo date("d-m-Y", strtotime("+3 days")); 
                                                                                                                            ?>">
                                </div>
                            </div> -->
                            <div class="container-para">

                                <div class="child-container--one">
                                    <h5>Supplier Information :</h5>
                                    <span><?php echo Supplier::html_select("supplier") ?></span> <br>
                                    <strong>Phone :</strong> <span id="Sphone" style="font-size: 16px;"></span> <br>
                                    <strong>Email :</strong> <span id="email" style="font-size: 16px;"></span> <br>
                                    <strong>Address :</strong> <span id="Saddress" style="font-size: 16px;"></span> <br> <br>
                                </div>

                                <div class="child-container--two">
                                    <h5>Warehouse Details :</h5>
                                    <span><?php echo Warehouse::html_select("warehouse") ?></span> <br>
                                    <strong>Phone :</strong> <span id="Wphone" style="font-size: 16px;"></span> <br>
                                    <strong>Email :</strong> <span id="location" style="font-size: 16px;"></span> <br>
                                    <strong>Address :</strong> <span id="Waddress" style="font-size: 16px;"></span> <br> <br>
                                </div>

                            </div>

                            <table class="items-table ">
                                <thead>
                                    <tr>
                                        <th>Description</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Discount/Item</th>
                                        <th>Total</th>
                                        <th colspan="2"><button class="btn btn-danger" id="clearAll">ClearAll</button></th>

                                    </tr>
                                    <tr>
                                        <th><?php echo Product::html_select("product_id") ?></th>
                                        <th><input type="number" class="form-control" id="item_qty" name="item_qty" placeholder="Quantity"></th>
                                        <th><input type="number" class="form-control" id="unit_price" class="unitP" name="unit_price" placeholder="Unit_Price"></th>
                                        <th><input type="number" class="form-control" id="discount" name="discount" placeholder="Discount"></th>
                                        <th>0.00</th>
                                        <th><button class="btn btn-info" id="btn_add">Add</button></th>
                                    </tr>
                                </thead>
                                <tbody id="data_appned">

                                </tbody>
                                <tfoot id="">
                                    <tr class="totals">
                                        <td rowspan="5" colspan="2"></td>
                                        <td colspan="2">Subtotal :</td>
                                        <td id="subtotal">00.00</td>
                                    </tr>
                                    <tr class="totals">
                                        <td colspan="2">VAT (05%) :</td>
                                        <td id="vat">00.00</td>
                                    </tr>
                                    <tr class="totals">
                                        <td colspan="2">Total Amount :</td>
                                        <td id="net_total">00.00</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end "><button class="btn btn-success process">Data Send</button></div>

                        <!-- invoice end -->
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>

<script src="<?php echo $base_url ?>/js/cart.js"></script>
<script>
    $(document).ready(function() {
        // alert();
        let cart = new Cart("purchases");
        print_cart()

        // $("#deliveryDate").datepicker({
        //   dateFormat: 'dd-mm-yy'
        // });


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
                    //console.log(res);
                    $("#Sphone").text(sup.supplier.phone)
                    $("#email").text(sup.supplier.email)
                    $("#Saddress").text(sup.supplier.address)

                    console.log(phone, email, address);

                },
                error: function(res) {}
            })

        })


        $("#warehouse").on("change", function() {
            let warehouse_id = $(this).val();

            $.ajax({
                url: "<?php echo $base_url ?>/api/warehouse/find",
                type: "get",
                data: {
                    id: warehouse_id
                },
                success: function(res) {
                    let ware = JSON.parse(res)
                    console.log(res);

                    $("#Wphone").text(ware.warehouse.phone)
                    $("#location").text(ware.warehouse.location)
                    $("#Waddress").text(ware.warehouse.address)

                    console.log(phone, location, address);

                },
                error: function(res) {}
            })

        })



        $("#product_id").on("change", function() {
            let product_id = $(this).val();
            $.ajax({
                url: "<?php echo $base_url ?>/api/Product/find",
                type: "post",
                data: {
                    id: product_id
                },
                success: function(res) {
                    //console.log(res);

                    let product_data = JSON.parse(res)

                    $("#unit_price").val(product_data.product.offer_price);

                },
                error: function(res) {}
            })



        })



        $("#btn_add").on("click", function() {
            // alert();
            let item_qty = $("#item_qty").val();
            let unit_price = $("input[id='unit_price']").val();
            let discount = $("#discount").val();
            let product_id = $("#product_id").val();
            let product_name = $("#product_id option:selected").text();
            let total_discount = discount * item_qty;
            let subtotal = unit_price * item_qty - total_discount;

            //  console.log(item_qty, "unit price",unit_price, discount, product_id, product_name,"sfkld");

            let item = {
                "name": product_name,
                "item_id": product_id,
                "price": unit_price,
                "qty": parseFloat(item_qty),
                "discount": discount,
                'total_discount': total_discount,
                "subtotal": subtotal
            };
            cart.save(item);
            print_cart()

            $("#item_qty").val("");
            $("#unit_price").val("");
            $("#discount").val("");
            print_cart()

        })

        $("body").on("click", ".delete", function() {
            let id = $(this).data("id");
            cart.delItem(id)
            print_cart()
        });



        $("#clearAll").on("click", function() {
            cart.clearCart();
            $("#item_qty").val("");
            $("#unit_price").val("");
            $("#discount").val("");
            print_cart()
        });


        function print_cart() {

            let purchases = cart.getCart();
            //.log(purchases);

            let sn = 1;
            let $bill = "";
            let subtotal = 0;
            let total_discount = 0;

            //console.log(subtotal);



            if (purchases != null) {
                let html = "";
                purchases.forEach(function(item, i) {

                    subtotal += (item.price * item.qty) - item.discount;
                    // subtotal += item.subtotal;
                    let itemsubtotal = (item.price * item.qty) - item.discount;
                    total_discount += parseFloat(item.discount);
                    html += `
                 <tr>
                    <td>${item.name}</td>
                    <td>${item.qty}</td>
                    <td>${item.price}</td>
                    <td>${item.discount}</td>
                    <td>${itemsubtotal}</td>
                    <td><button data-id=${item.item_id} class="btn btn-warning delete">X</button></td>
                </tr>
               `;

                })


                $("#data_appned").html(html);

                //Order Summary
                $("#totaldiscount").text(total_discount);
                $("#subtotal").html(subtotal);
                let tax = (subtotal * 0.05).toFixed(2);
                $("#vat").html(tax);
                $("#net_total").html(parseFloat(subtotal) + parseFloat(tax));
            }


        }


        //processs to database

        $(".process").on("click", function() {
            let warehouse_id = $("#warehouse").val();
            let supplier_id = $("#supplier").val();
            let date = $("#purchases_date").val();
            let delivery_date = $("#Purchases_deliveryDate").val();
            let discount = $("#discount").val();
            let vat = 0;
            let shipping_address = "";
            let remark = "";
            let order_total = $("#net_total").text();
            let products = cart.getCart();

            // console.log(products);
            // console.log(warehouse_id, supplier_id, date, delivery_date, order_total);


            $.ajax({
                url: '<?php echo $base_url ?>/api/Process/save',
                type: 'POST',
                data: {
                    "warehouse_id": warehouse_id,
                    "supplier_id": supplier_id,
                    "date": date,
                    "delivery_date": delivery_date,
                    "shipping_address": shipping_address,
                    "discount": discount,
                    "vat": vat,
                    "remark": remark,
                    "order_total": order_total,
                    "products": products
                },
                success: function(res) {
                    console.log(res);
                    alert("Production build successful!");
                    cart.clearCart();
                    $("#data_appned").html("");
                    $("#subtotal").text("0.00");
                    $("#vat").text("0.00");
                    $("#net_total").text("0.00");
                    $("#Wphone").text("");
                    $("#location").text("")
                    $("#Waddress").text("")
                    $("#Sphone").text("")
                    $("#email").text("")
                    $("#Saddress").text("")
                },

                error: function(err) {
                    console.log(err);

                }


            });



        });

    })
</script>