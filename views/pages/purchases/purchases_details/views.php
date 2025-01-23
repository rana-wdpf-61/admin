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

        /* #menu,body,
            .btn_print, .sidebar, .sidebar-header {
                visibility: hidden;
                display: none;
            } */
        /* #menu, .sidebar, .sidebar-header {
                /* visibility: hidden; */
        /* display: none; */
        /* } */
        */ #section-to-print {
            visibility: visible;
            display: block;
            position: absolute;
            left: 0;
            top: 0;
        }

        #section-to-print:parents {
            display: none;
            visibility: hidden;
        }

        ::not(#section-to-print) {
            display: none;
        }
    }
</style>


<?php  print_r($purchases);
$id = $_GET['id'];
?>

<main class="container">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">CREATE INVOICE</div>

        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add a new Sales Invoice</li>
                </ol>
            </nav>
        </div>

        <div class="ms-auto" style="display: flex;">
            <div style="margin-right:15px" class="d-grid gap-2 d-md-flex justify-content-md-end ">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end"><a href="javascript:;" class="btn btn-sm btn-danger me-2"><i class="bi bi-file-earmark-pdf-fill"></i> Export as PDF</a></div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end "><a href="#" onclick="window.print()" class="btn btn-sm btn-secondary btn_print"><i class="bi bi-printer-fill"></i> Print</a></div>
            </div>
            <div class="btn-group">
                <a class="btn btn-primary" href="<?php echo $base_url ?>/purchases/index"><i class="bi bi-arrow-left"></i> Go Back</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-xl-12 mx-auto">
            <div class="card">
                <div class="card-body" id="section-to-print">
                    <div class="invoice-header">
                        <div class="company-details">
                            <h2>Company Name</h2>
                            <p>123 Business Rd<br>City, State, ZIP<br>Email: info@company.com<br>Phone: (123) 456-7890</p>
                        </div>
                        <div class="invoice-details">
                            <p class="invoice-title">INVOICE</p>
                            <p><strong>Invoice #: </strong>INVC-ID-<?php echo 1000 + $purchases->id  ?><br><strong>Date :</strong> <?php echo  date("F d, Y", strtotime($purchases->created_at)) ?><br><strong>Delivery Date :</strong> <input type="text" id="deliveryDate" value=<?php echo date("d-m-Y"); ?>></p>
                        </div>
                    </div>

                    <div class="invoice-body">
                        <table class="billing-info">
                            <tr>
                                <td><strong style="font-size: 18px; text-decoration:underline">Supplier's Information:</strong> <br>
                                <strong> Name : </strong><?php echo Supplier::find($purchases->supplier_id)->name ?> <br>
                                <strong> Phone :</strong> <?php echo Supplier::find($purchases->supplier_id)->phone ?> <br>
                                <strong> Email : </strong> <?php echo Supplier::find($purchases->supplier_id)->email ?> <br>
                                <strong>Address :</strong> <?php echo Supplier::find($purchases->supplier_id)->address ?> <br>

                                <td><strong style="font-size: 18px; text-decoration:underline">Ship To :</strong> <br> 
                                <strong>Address :</strong> <?php echo Purchases::find($id)->shipping_address ?><br></td>
                            </tr>
                        </table>

                        <table class="items-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // echo $purchases->id;
                                $purchase_details = Purchases_details::find_all($purchases->id);
                                // print_r($purchase_details);
                                $subtotal = 0;
                                foreach ($purchase_details as $key => $value) {
                                    //print_r( $value);
                                    $product_name = Product::find($value['product_id'])->name;
                                    $total_price = $value['qty'] * $value['price'];
                                    $subtotal += $total_price;
                                    $discontedPrice = $subtotal - $value['discount'];
                                    $vat = $discontedPrice * 0.05;
                                    $ultimateTotal = $discontedPrice + $vat;
                                    $discount = $value['discount'];
                                    echo "
                                            <tr>
                                                <td>" . $key + 1 . "</td>
                                                <td>$product_name</td>
                                                <td>{$value['qty']}</td>
                                                <td>{$value['price']}</td>
                                                <td>$total_price</td>
                                            </tr>
                                            ";
                                }
                                ?>

                            </tbody>
                            <tfoot>
                                <tr class="totals">
                                    <td rowspan="5" colspan="2" style="visibility: collapse;"></td>
                                    <td colspan="2">Subtotal :</td>
                                    <td><?php echo $subtotal ?></td>
                                </tr>
                                <tr class="totals">

                                    <td colspan="">Discount :</td>
                                    <td colspan=""></td>
                                    <td><?php echo $discount ?></td>
                                </tr>
                                <tr class="totals">
                                    <td colspan="">VAT (05%) :</td>
                                    <td colspan=""></td>
                                    <td><?php echo $vat ?></td>
                                </tr>
                                <tr class="totals">
                                    <td colspan="2">Total Amount :</td>
                                    <td><?php echo $ultimateTotal ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="footer">
                        <p>Thank you for your business!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>