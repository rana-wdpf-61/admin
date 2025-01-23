<?php
// Database configuration
$host = "localhost"; // Replace with your database host
$username = "root";  // Replace with your database username
$password = "";      // Replace with your database password
$dbname = "production_management"; // Replace with your database name

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the current month's start and end dates
$start_date = date("Y-m-01");
$end_date = date("Y-m-t");

// Query to fetch stock data
$sql = "
    SELECT 
        item_id, 
        SUM(quantity) AS total_quantity, 
        MAX(price) AS max_price, 
        MIN(price) AS min_price, 
        AVG(price) AS avg_price
    FROM core_stock
    WHERE created_at BETWEEN ? AND ?
    GROUP BY item_id
";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $start_date, $end_date);
$stmt->execute();
$result = $stmt->get_result();

// HTML structure
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Stock Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f4f4f9;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>

<h1>Monthly Stock Report</h1>

<?php if ($result->num_rows > 0): ?>
    <table>
        <thead>
            <tr>
                <th>Item ID</th>
                <th>Total Quantity</th>
                <th>Max Price</th>
                <th>Min Price</th>
                <th>Average Price</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['item_id']); ?></td>
                    <td><?php echo htmlspecialchars($row['total_quantity']); ?></td>
                    <td><?php echo number_format($row['max_price'], 2); ?></td>
                    <td><?php echo number_format($row['min_price'], 2); ?></td>
                    <td><?php echo number_format($row['avg_price'], 2); ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <p style="text-align: center;">No data found for the current month.</p>
<?php endif; ?>

<?php
// Close connection
$stmt->close();
$conn->close();
?>

</body>
</html>



