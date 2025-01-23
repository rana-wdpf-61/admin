<?php

//print_r($supplier);

?>

<!-- 

<div class="col-md-12 col-lg-12 table-responsive view-table">
    <table class="table">
        <tbody>
            <tr>
                <td><strong>Purchased Code:</strong>
                    PP-21
                </td>
            </tr>
            <tr>
                <td><strong>Supplier:</strong>
                    SHAKIL
                </td>
            </tr>
            <tr>
                <td><strong>Purchase Products:</strong>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product</th>
                                    <th>Purchased Qty</th>
                                    <th>Used</th>
                                    <th>Return</th>
                                    <th>Damage</th>
                                    <th>Available</th>
                                    <th>Unit Price</th>
                                    <th>Discount</th>
                                    <th class="text-right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>crush</td>
                                    <td>10.00 Pieces
                                    </td>
                                    <td>2.00 Pieces
                                    </td>
                                    <td>0 Pieces</td>
                                    <td>0 Pieces</td>
                                    <td>8
                                        Pieces</td>
                                    <td>RS800.00
                                    </td>
                                    <td>RS0
                                        (0%)
                                    </td>
                                    <td class="text-right">

                                        RS8000.00
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
            </tr>
            <tr>
                <td><strong>Subtotal:</strong>
                    RS8000.00
                    (After reducing discount.)
                </td>
            </tr>
            <tr>
                <td><strong>Total Discount:</strong>
                    RS0
                </td>
            </tr>
            <tr>
                <td><strong>Trasnport Cost:</strong>
                    +RS0
                </td>
            </tr>
            <tr>
                <td><strong>Grand Total:</strong>
                    RS8000.00
                </td>
            </tr>
            <tr>
                <td><strong>Total Paid:</strong>
                    RS8000.00
                </td>
            </tr>
            <tr>
                <td><strong>Total Due:</strong>
                    RS0
                </td>
            </tr>
            <tr>
                <td><strong>Payment Method:</strong>
                    Bank Transfer
                </td>
            </tr>
            <tr>
                <td><strong>Note:</strong></td>
            </tr>
            <tr>
                <td><strong>Status:</strong> <span class="badge badge-success">Active</span></td>
            </tr>
        </tbody>
    </table>
</div>


<button  class="btn btn-secondary float-right print-btn" onclick="print()"><i class="bi bi-printer-fill"></i>  Print</button> -->

<?php
// Database connection
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'production_management';

$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch customer data
$sql = "SELECT *  FROM core_customars";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Table</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
            text-align: left;
        }
        .print-btn {
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
    <script>
        function printTable() {
            window.print();
        }
    </script>
</head>
<body>

    <h1>Customer List</h1>
    <button class="print-btn" onclick="printTable()">Print</button>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["phone"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No customers found</td></tr>";
        }
        $conn->close();
        ?>
    </table>

</body>
</html>
