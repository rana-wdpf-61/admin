<?php
// echo Page::title(["title"=>"Create Production"]);
// echo Page::body_open();
// echo Html::link(["class"=>"btn btn-success", "route"=>"production", "text"=>"Manage Production"]);
// echo Page::context_open();
// echo Form::open(["route"=>"production/save"]);
// 	echo Form::input(["label"=>"Material","name"=>"material_id","table"=>"materials"]);
// 	echo Form::input(["label"=>"Uom","name"=>"uom_id","table"=>"uom"]);
// 	echo Form::input(["label"=>"Product","name"=>"product_id","table"=>"products"]);
// 	echo Form::input(["label"=>"Production Date","type"=>"text","name"=>"production_date"]);
// 	echo Form::input(["label"=>"Qty","type"=>"text","name"=>"qty"]);
// 	echo Form::input(["label"=>"Status","name"=>"status_id","table"=>"status"]);
// 	echo Form::input(["label"=>"Unit Cost","type"=>"text","name"=>"unit_cost"]);
// 	echo Form::input(["label"=>"Total Cost","type"=>"text","name"=>"total_cost"]);

// echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
// echo Form::close();
// echo Page::context_close();
// echo Page::body_close();

?>


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
            <div class="breadcrumb-title pe-3">CREATE INVOICE</div>

            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Create a New Purchases Invoice</li>
                    </ol>
                </nav>
            </div>

            <div class="ms-auto">
                <div class="btn-group">
                    <a class="btn btn-primary" href="<?php echo $base_url ?>/production/index"><i class="bi bi-arrow-left"></i> Go Back</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="card">

                    <div class="card-body">
                        <h4>Create a Production</h4>
                        <!-- <h5 class="mb-0">Create a New Purchases Invoice</h5>
                        <div class="p-4 border rounded mt-4"> -->
                        <!-- invoice start -->
                        <div class="invoice-header">
                            <!-- <div class="company-details">
                                        <h2>Company Name</h2>
                                        <p>123 Business Rd<br>City, State, ZIP<br>Email: info@company.com<br>Phone: (123) 456-7890</p>
                                    </div> -->
                            <!-- 
                            <div class="invoice-details">
                                <p class="invoice-title"></p>
                                <div style="text-align:left">
                                    <p> <strong> </strong><span id=""><?php // echo Purchases::get_last_id() + 1 + 1000 
                                                                        ?>
                                        </span><br><strong>Date:</strong> <span id="purchases_date"><?php echo date("d-m-Y") ?></span> <br>
                                        <strong>Delivery Date :</strong> <span><input type="text" id="Purchases_deliveryDate" value=<?php // echo date("d-m-Y"); 
                                                                                                                                    ?>></span>
                                    </p>
                                </div>
                            </div> -->

                        </div>

                        <div class="invoice-body">

                            <div class="container-para">
                                <div class="row g-3 align-items-center">
                                    <!-- <div class="col-md-6 child-container--one">
                                        <h5>Product Name :</h5>
                                        <span><?php // echo Product::html_select2("product_id")?></span> <br>
                                        <strong style="font-size: 16px;">Product Name :</strong> <span id="Pname" style="font-size: 16px;"></span> <br> 
                                    </div> -->
                                    <div class="col-auto">
                                        <label for="inputPassword6" class="col-form-label">Stating Date :</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="date" id="start_date" name="name" class="form-control" required="required" value="">
                                    </div>
                                    <div class="col-auto">
                                        <label for="inputPassword6" class="col-form-label">Ending Date :</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="date" id="end_date" name="name" class="form-control" required="required" placeholder="Uom Name">
                                    </div>
                                </div>
                            </div>

                            <table class="items-table ">
                                <thead>
                                    <tr>
                                        <th>Raw Materilas</th>
                                        <th>Quantity</th>
                                        <th>Unit Of Mesure</th>
                                        <th>Unit Cost</th>
                                        <th>Total Cost</th>
                                        <th colspan="2"><button class="btn btn-danger" id="clearAll">ClearAll</button></th>

                                    </tr>
                                    <tr>
                                        <th><?php echo Product::html_select3("rawmaterial") ?></th>
                                        <th><input type="number" class="form-control" id="item_qty" name="item_qty"></th>
                                        <th id="uom"><?php echo Uom::html_select("uom_id") ?></th>
                                        <th><input type="number" class="form-control" id="unit_price" class="unitP" name="unit_price"></th>
                                        <th>0.00</th>
                                        <th><button class="btn btn-info" id="btn_add">Add</button></th>
                                    </tr>
                                </thead>
                                <tbody id="data_appned">

                                </tbody>
                                <tfoot>
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

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end "><button class="btn btn-success process">Create Production</button></div>

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
        let cart = new Cart("production");
        print_cart()

        // $("#deliveryDate").datepicker({
        //   dateFormat: 'dd-mm-yy'
        // });


        $("#rawmaterial").on("change", function() {
            let product_id = $(this).val();

            $.ajax({
                url: "<?php echo $base_url ?>/api/product/find",
                type: "get",
                data: {
                    id: product_id
                },
                success: function(res) {
                    let pro = JSON.parse(res)
                    //console.log(res);
                    // $("#Pname").text(pro.product.name)
                    $("#unit_price").val(pro.product.offer_price);

                    // console.log(phone, email, address);

                },
                error: function(res) {}
            })

        })



        // $("#rawmaterial").on("change", function() {
        // 	let rawmaterial = $(this).val();
        // 	$.ajax({
        // 		url: "<?php echo $base_url ?>/api/rawmaterial/find",
        // 		type: "post",
        // 		data: {
        // 			id: rawmaterial
        // 		},
        // 		success: function(res) {
        // 			//console.log(res);

        // 			let rawmaterial_data = JSON.parse(res)

        // 			$("#unit_price").val(rawmaterial_data.rawmaterial.cost_per_unit);
        // 			$("#item_qty").val(rawmaterial_data.rawmaterial.quantity);
        // 			//$("#uom").text(rawmaterial_data.rawmaterial.uom_id);

        // 		},
        // 		error: function(res) {}
        // 	})



        // })



        $("#btn_add").on("click", function() {
            // alert();
            let item_qty = $("#item_qty").val();
            let uom_id = $("#uom_id").val();
            let uom_name = $("#uom_id option:selected").val();
            let price = $("#unit_price").val();
            let product_id = $("#rawmaterial").val();
            let product_name = $("#rawmaterial option:selected").text();
            let qty = item_qty * 0.1;
            let subtotal = price * qty;

            // console.log(item_qty, uom_id, uom_name, product_name, product_id, unit_price,subtotal);

            let item = {
                "rname": product_name,
                "uname": uom_name,
                "item_id": product_id,
                "uom_id": uom_id,
                "price": price,
                "qty": parseFloat(qty),
                "subtotal": subtotal
            };
            cart.save(item);
            print_cart()

            $("#item_qty").val("");
            $("#unit_price").val("");
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
            print_cart()
        });


        function print_cart() {

            let production = cart.getCart();
            //.log(purchases);

            let sn = 1;
            let bill = "";
            let subtotal = 0;

            //console.log(subtotal);

            if (production != null) {
                let html = "";
                production.forEach(function(item, i) {
                    subtotal += (item.price * item.qty);
                    // subtotal += item.subtotal;
                    let itemsubtotal = (item.price * item.qty);
                    html += `
                 <tr>
                    <td>${item.rname}</td>
                    <td>${item.qty}</td>
                    <td>${item.uname}</td>
                    <td>${item.price}</td>
                    <td>${itemsubtotal}</td>
                    <td><button data-id=${item.item_id} class="btn btn-warning delete">&#8722;</button></td>
                </tr>
               `;

                })


                $("#data_appned").html(html);

                //Order Summary
                $("#subtotal").html(subtotal);
                let tax = (subtotal * 0.05).toFixed(2);
                $("#vat").html(tax);
                $("#net_total").html(parseFloat(subtotal) + parseFloat(tax));
            }


        }


        //processs to database

        $(".process").on("click", function() {
            // alert()
            let material_id = $("#rawmaterial").text();
            let product_id = $("#product_id").text();
            let start_date = $("#start_date").val();
            let end_date = $("#end_date").val();
            let uom_id = $("#uom_id").val();
            let status_id = 2;
            let qty = $("#item_qty").text();
            let total_cost = $("#net_total").text();
            let production = cart.getCart();

            //console.log(production);



            $.ajax({
                url: '<?php echo $base_url ?>/api/Production/process',
                type: 'POST',
                data: {
                    "start_date": start_date,
                    "end_date": end_date,
                    "status_id": status_id,
                    "uom_id": uom_id,
                    "qty": qty,
                    "total_cost": total_cost,
                    "production": production
                },
                success: function(res) {
                    console.log(res);
                    cart.clearCart();
                    $("#data_appned").html("");
                    $("#subtotal").text("0.00");
                    $("#vat").text("0.00");
                    $("#net_total").text("0.00");
                },

                error: function(err) {
                    console.log(err);

                }


            });



        });

    })
</script>