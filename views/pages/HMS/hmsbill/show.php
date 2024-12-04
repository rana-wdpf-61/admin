

<style>

@media print {
  body,.btn_print {
    visibility: hidden;
  }
  #section-to-print {
    visibility: visible;
    position: absolute;
    left: 0;
    top: 0;
  }
}
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f6f8;
        color: #333;
    }

    .container {
        width: 850px;
        margin: 20px auto;
        padding: 20px;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        border: 1px solid #e1e4e8;
    }

    .header {
        text-align: center;
        border-bottom: 2px solid #007bff;
        padding-bottom: 20px;
        margin-bottom: 30px;
    }

    .header h1 {
        font-size: 28px;
        margin: 0;
        color: #007bff;
        text-transform: uppercase;
    }

    .header p {
        font-size: 16px;
        margin: 5px 0;
        color: #555;
    }

    .section {
        margin-bottom: 30px;
        padding: 20px;
        border: 1px solid #e1e4e8;
        border-radius: 8px;
        background-color: #f9fbfc;
    }

    .section-title {
        font-size: 20px;
        font-weight: bold;
        color: #007bff;
        margin-bottom: 15px;
        border-bottom: 1px solid #007bff;
        padding-bottom: 5px;
    }

    .details p {
        margin: 5px 0;
        font-size: 15px;
        line-height: 1.5;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    table th,
    table td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: left;
        font-size: 15px;
    }

    table th {
        background-color: #007bff;
        color: #ffffff;
    }

    table tbody tr:nth-child(odd) {
        background-color: #f1f7ff;
    }

    .footer {
        text-align: center;
        margin-top: 20px;
    }

    .payment-methods {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        margin-top: 20px;
    }

    .payment-methods img {
        width: 120px;
        margin: 10px;
    }

    .totals {
        text-align: right;
        font-size: 16px;
        font-weight: bold;
    }

    .totals div {
        margin: 5px 0;
    }

    .grand-total {
        color: #007bff;
        font-size: 18px;
        font-weight: bold;
    }
</style>

<?php
// echo Page::title(["title"=>"Show HmsBill"]);
// echo Page::body_open();
// echo Html::link(["class"=>"btn btn-success", "route"=>"hmsbill", "text"=>"Manage HmsBill"]);
// echo Page::context_open();
//echo HmsBill::html_row_details($id);
// echo Page::context_close();
// echo Page::body_close();
?>



<div class="container" id="section-to-print">
    <!-- Header -->
    <div class="header">
        <h1>Medjestic Telemedicine Virtual Healthcare</h1>
        <p>Dhanmondi, Dhaka, Bangladesh</p>
        <p>Mobile: 01675600847</p>
    </div>

    <!-- Invoice Details -->
    <div class="section">
        <div class="section-title">Invoice Details</div>
        <div class="details">
            <p><strong>Invoice Number:</strong> <?php  echo $hmsbill->id  ?></p>
            <p><strong>Date:</strong>  <?php  echo  date("F d, Y", strtotime($hmsbill->created_at))   ?></p>
            <p><strong>Patient Name:</strong> <?php echo HmsPatient::find($hmsbill->patient_id)->name ?></p>
            <p><strong>Contact:</strong> <?php echo HmsPatient::find($hmsbill->patient_id)->mobile ?></p>
        </div>
    </div>


    
    <!-- Payment Breakdown -->
    <div class="section">
        <div class="section-title">Payment Breakdown</div>
        <table>
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Unit Price (BDT)</th>
                    <th>Total (BDT)</th>
                </tr>
            </thead>
            <tbody>

               <?php 
                 $bill_details=  HmsBillDetail::bill_detials( $hmsbill->id );
                // print_r($bill_details);
                foreach ($bill_details as $key => $value) {
                   $total_price= $value['qty'] * $value['price'];
                   $service_name= HmsService::find($value['service_id'])->name;
                    echo "
                    
                    <tr>
                    <td>$service_name</td>
                    <td> {$value['qty']}</td>
                    <td> {$value['price']}</td>
                    <td>  $total_price</td>
                        </tr>
                
                    ";

                }
               
               
               ?>
                
              
            </tbody>
        </table>

        <div class="totals">
            <div>Subtotal: <strong>2,100 BDT</strong></div>
            <div>Discount (10%): <strong>-210 BDT</strong></div>
            <div>Tax (15%): <strong>283.50 BDT</strong></div>
            <div class="grand-total">Grand Total: <strong>2,173.50 BDT</strong></div>
        </div>
    </div>

    <!-- Payment Methods -->
    <div class="section">
        <div class="section-title">Payment Methods</div>
        <p>You can pay using the following methods:</p>
        <div class="payment-methods">
            <img src="https://via.placeholder.com/120x50?text=bKash" alt="bKash">
            <img src="https://via.placeholder.com/120x50?text=Nagad" alt="Nagad">
            <img src="https://via.placeholder.com/120x50?text=Rocket" alt="Rocket">
            <img src="https://via.placeholder.com/120x50?text=Upay" alt="Upay">
            <img src="https://via.placeholder.com/120x50?text=Visa" alt="Visa">
            <img src="https://via.placeholder.com/120x50?text=Mastercard" alt="Mastercard">
            <img src="https://via.placeholder.com/120x50?text=DBBL" alt="DBBL">
            <img src="https://via.placeholder.com/120x50?text=PayPal" alt="PayPal">
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>Thank you for choosing Medjestic Telemedicine Virtual Healthcare!</p>
        <button class="btn btn-primary btn_print" onclick="print()"> Print</button>
    </div>
</div>
