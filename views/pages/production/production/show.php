<?php
// echo Page::title(["title"=>"Show Production"]);
// echo Page::body_open();
// echo Html::link(["class"=>"btn btn-success", "route"=>"production", "text"=>"Manage Production"]);
// echo Page::context_open();
// echo Production::html_row_details($id);
// echo Page::context_close();
// echo Page::body_close();
?>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    .invoice-container {
        max-width: 800px;
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
        /* margin-left: 300px; */
    }

    .invoice-title {
        font-size: 24px;
        font-weight: bold;
        color: #007BFF;
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

    .items-table th {
        background-color: #007BFF;
        color: #fff;
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

    #deliveryDate {
        max-width: 90px;
    }

    @media print {
        body * {
            visibility: hidden;
        }

        #section-to-print,
        #section-to-print * {
            visibility: visible;
        }

        #section-to-print {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
        }

        /* Optional: Customize for A4 size */
        @page {
            size: A4;
            margin: 20mm;
        }

        /* Hide navigation, buttons, and breadcrumbs */
        .btn,
        .breadcrumb,
        .page-breadcrumb {
            display: none !important;
        }
    }
</style>


<?php // print_r($production);
$id = $_GET['id'];
?>

<main class="container">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">CREATE PRODUCTION</div>

        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add a new Product Build</li>
                </ol>
            </nav>
        </div>

        <div class="ms-auto" style="display: flex;">
            <!-- <div style="margin-right:15px" class="d-grid gap-2 d-md-flex justify-content-md-end ">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end"><a href="javascript:;" class="btn btn-sm btn-danger me-2"><i class="bi bi-file-earmark-pdf-fill"></i> Export as PDF</a></div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end "><a href="#" onclick="window.print()" class="btn btn-sm btn-secondary btn_print"><i class="bi bi-printer-fill"></i> Print</a></div>
            </div> -->
            <div class="btn-group">
                <a class="btn btn-primary" href="<?php echo $base_url ?>/production/index"><i class="bi bi-arrow-left"></i> Go Back</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-xl-12 mx-auto">
            <div class="card" id="section-to-print">
                <div class="card-body" id="section-to-print">
                    <div class="invoice-header">
                       <h3>Create A Build Product </h3>
                        <!-- <div class="company-details">
                            <h2>Company Name</h2>
                            <p>123 Business Rd<br>City, State, ZIP<br>Email: info@company.com<br>Phone: (123) 456-7890</p>
                        </div> -->
                        <!-- <div class="invoice-details">
                            <p class="invoice-title">INVOICE</p>
                            <p><strong>Invoice #: </strong>INVC-ID-<?php // echo 1000 + $production->id  ?><br><strong>Start Date :</strong> <?php // echo Production::find($production->id)->production_date ?><br><strong>End Date :</strong> <input type="text" id="deliveryDate" value=<?php // echo date("Y-m-d", strtotime("+3 days")); ?>></p>
                        </div> -->
                    </div>

                    <div class="invoice-body">
                        <table class="billing-info">
                            <tr>
                                <td><strong style="font-size: 18px;">Production of Product : </strong><br>
                                <strong>Product Number : </strong> <?php echo Production::find($production->id)->qty ?> Pieces  <br> <strong>Product Name : </strong> <?php echo Product::find($production->product_id)->name ?> </td>
                                <td><strong style="font-size: 15px;">Quantity: </strong> <input type="number" id="build_qty" name="build_qty"></td>
                                <td><strong style="font-size: 15px;">Start Date: </strong> <input type="date" id="start_date" name="start_date"></td>
                                <td><strong style="font-size: 15px;">End Date: </strong> <input type="date" id="end_date" name="end_date"></td>
                               
                            </tr>
                        </table>
                         <input type="hidden" value="<?php echo $production->product_id?>" id="build_main_product_id">
                         <input type="hidden" value="<?php echo $production->uom_id?>" id="build_uom_id">
                        
                        <table class="items-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Raw Material</th>
                                    <th>Quantity</th>
                                    <th>Requered Qty</th>
                                    <th>UOM</th>
                                    <th>Unit Cost</th>
                                    <th>Total Cost</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // echo $purchases->id;
                                $production_details = Productiondetail::find_all($production->id);
                                // print_r($purchase_details);
                                $subtotal = 0;
                                foreach ($production_details as $key => $value) {
                                    //print_r( $value);
                                    $product_name = Product::find($value['product_id'])->name;
                                    $product_id=$value['product_id'];
                                    $uom_name = Uom::find($value['uom_id'])->name;
                                    $total_price = $value['qty'] * $value['unit_cost'];
                                    $subtotal += $total_price;
                                    $vat = $subtotal * 0.05;
                                    $ultimateTotal = $subtotal + $vat;
                                    $key++;
                                    echo "
                                            <tr>
                                                <td>$key</td>
                                                <td>$product_name</td>
                                                <td class='actual_qty' >{$value['qty']}</td>
                                                <td data-id=' $product_id' class='requered_qty'>0.00</td>
                                                <td>$uom_name</td>
                                                <td class='unit_price'>{$value['unit_cost']}</td>
                                                <td class='total_cost'>$total_price</td>
                                            </tr>
                                            ";
                                }
                                ?>

                            </tbody>
                            <tfoot>
                                <tr class="totals">
                                    <td rowspan="5" colspan="2" style="visibility: collapse;"></td>
                                    <td rowspan="5" colspan=""></td>
                                    <td rowspan="5" colspan=""></td>
                                    <td colspan="2">Subtotal :</td>
                                    <td id="suball"><?php echo $subtotal ?></td>
                                </tr>
                                <tr class="totals">
                                    <td colspan="2">VAT (05%) :</td>
                                    <td id="tax"><?php echo $vat ?></td>
                                </tr>
                                <tr class="totals">
                                    <td colspan="2">Total Amount :</td>
                                    <td id="total_amount"><?php echo $ultimateTotal ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end "><button class='build btn btn-success'>Send Product</button></div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    $(document).ready(function(){
        $("#build_qty").on("keyup", function () {
    let qty = parseFloat($(this).val()) || 0;

    $("td.actual_qty").each(function (index, element) {
        let actualQty = parseFloat($(this).text()) || 0;
        let total = actualQty * qty;
        $(".requered_qty").eq(index).html(total.toFixed(2));
    });

    // Update Total Amount
    let subtotal = 0;
    $("tbody tr").each(function () {
        let unitCost = parseFloat($(this).find(".unit_price").text()) || 0;
        let requiredQty = parseFloat($(this).find(".requered_qty").text()) || 0;
        let total_costs = unitCost * requiredQty;
        //subtotal += unitCost * requiredQty;
        subtotal += total_costs ;
        $("#suball").html(subtotal.toFixed(2));
       // $(".total_cost").html(total_costs);
       $(this).find(".total_cost").text(total_costs.toFixed(2))

       // console.log(requiredQty,unitCost,total_costs);
        
    });

    let vat = subtotal * 0.05;
    let ultimateTotal = subtotal + vat;
    $("#total_amount").text(ultimateTotal.toFixed(2));
    $("#total_amount").html(ultimateTotal.toFixed(2));
    $("#tax").html(vat.toFixed(2));
});

$(".build").on("click", function () {
    let build_main_product_id = $("#build_main_product_id").val();
    let build_uom_id = $("#build_uom_id").val();
    let build_qty = parseFloat($("#build_qty").val()) || 0;
    let start_date =$("#start_date").val();
    let end_date = $("#end_date").val();
    let total_cost = parseFloat($("#total_amount").text()) || 0;
    let products = [];

   // console.log(build_main_product_id,build_uom_id,build_qty,start_date,end_date,total_cost);
    

    $("td.requered_qty").each(function (index, element) {
        let qty = parseFloat($(this).text()) || 0;
        let id = $(this).data("id");
        products.push({ id: id, qty: qty });
    });

    $.ajax({
        url: '<?php echo $base_url ?>/api/Production/build',
        type: 'POST',
        data: {
            build_main_product_id: build_main_product_id,
            build_uom_id: build_uom_id,
            build_qty: build_qty,
            start_date: start_date,
            end_date: end_date,
            total_cost: total_cost,
            products: products,
        },
        success: function (res) {
            console.log(res);
            alert("Production build successful!");
        },
        error: function (err) {
            console.error("Error:", err);
            alert("An error occurred. Check the console for details.");
        },
    });
});


    })



    // $(function() {

    //     $("#build_qty").on("keyup", function() {
    //         let qty = $(this).val()
    //        // let actual_qty = $(".actual_qty").text();

    //         $("td.actual_qty").each(function(index,element) {
    //             let actualqty= parseFloat($(this).text()) || 0; 
    //             let total=   actualqty * qty;
    //             $(".requered_qty").eq(index).html(total);
    //             let total_amount = $("#total_amount").text();
    //              let core_total= total_amount*qty;

    //             $("#total_amount").text(core_total);
               
    //         });

    

    //     })


    //     $(".build").on("click", function() {
    //         alert()
    //         let build_main_product_id= $("#build_main_product_id").val()
    //         let build_qty= $("#build_qty").val()
    //         let products =[];

    //         $("td.requered_qty").each(function(index,element) {
    //             let qty= $(this).text();
    //             let id= $(this).data("id");
    //             let item= {id:id, qty:qty}
    //             console.log({id:id, qty:qty});

    //             products.push(item);
                
             
    //         })
    //         console.log(products);
             

    //         $.ajax({
    //             url: '<?php echo $base_url ?>/api/Production/build',
    //             type: 'POST',
    //             data: {
    //                 "build_main_product_id": build_main_product_id,
    //                 "build_qty": build_qty,
    //                 "products": products,
    //             },
    //             success: function(res) {
    //                 console.log(res);
    //             },

    //             error: function(err) {
    //                 console.log(err);

    //             }


    //         });
            

           

    //     })



    //     let productqty = $("#build_qty").val();
    //     let actual_qty = $(".actual_qty").text();
    //     //let requered_qty=   ;
    //     let total_amount = $("#total_amount").val();
    // })
</script>