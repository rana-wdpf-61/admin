<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Module Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
            line-height: 1.6;
        }

        header {
            text-align: center;
            background-color: #007BFF;
            color: white;
            padding: 20px 0;
            border-radius: 5px;
        }

        h1, h2, h3 {
            color: #333;
        }

        section {
            background-color: white;
            padding: 20px;
            margin: 20px 0;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        code {
            background-color: #eee;
            padding: 2px 4px;
            border-radius: 4px;
            font-family: Consolas, monospace;
        }

        footer {
            text-align: center;
            margin-top: 20px;
            padding: 10px 0;
            background-color: #333;
            color: white;
        }
    </style>
</head>

<body>

    <header>
        <h1>Order Module Documentation</h1>
        <p>Date: <strong>November 30, 2024</strong></p>
    </header>

    <section>
        <h2>1. Overview</h2>
        <p>This document outlines the structure and functionality of the order module, focusing on the database schema and key order-related processes.</p>
    </section>

    <section>
        <h2>2. Database Schema</h2>

        <h3>2.1. Table: <code>core_orders</code></h3>
        <table>
            <tr>
                <th>Column Name</th>
                <th>Data Type</th>
                <th>Description</th>
            </tr>
            <tr>
                <td>id</td>
                <td>int (Primary Key, Auto Increment)</td>
                <td>Unique identifier for each order.</td>
            </tr>
            <tr>
                <td>customers_id</td>
                <td>int</td>
                <td>References the customer placing the order.</td>
            </tr>
            <tr>
                <td>order_total</td>
                <td>double</td>
                <td>Total order amount before discounts and VAT.</td>
            </tr>
            <tr>
                <td>discount</td>
                <td>double</td>
                <td>Discount applied to the order.</td>
            </tr>
            <tr>
                <td>shipping_address</td>
                <td>varchar (200)</td>
                <td>Shipping address for the order.</td>
            </tr>
            <tr>
                <td>paid_amount</td>
                <td>double</td>
                <td>Amount paid by the customer.</td>
            </tr>
            <tr>
                <td>status_id</td>
                <td>int</td>
                <td>Order status (e.g., pending, shipped).</td>
            </tr>
            <tr>
                <td>order_date</td>
                <td>date</td>
                <td>Date the order was placed.</td>
            </tr>
            <tr>
                <td>delivery_date</td>
                <td>date</td>
                <td>Expected delivery date.</td>
            </tr>
            <tr>
                <td>vat</td>
                <td>double</td>
                <td>Value-added tax applied to the order.</td>
            </tr>
            <tr>
                <td>uom_id</td>
                <td>int</td>
                <td>Unit of measurement for the order.</td>
            </tr>
            <tr>
                <td>created_at</td>
                <td>datetime</td>
                <td>Timestamp when the order was created.</td>
            </tr>
            <tr>
                <td>updated_at</td>
                <td>datetime</td>
                <td>Timestamp when the order was last updated.</td>
            </tr>
        </table>

        <h3>2.2. Table: <code>core_order_details</code></h3>
        <table>
            <tr>
                <th>Column Name</th>
                <th>Data Type</th>
                <th>Description</th>
            </tr>
            <tr>
                <td>id</td>
                <td>int (Primary Key, Auto Increment)</td>
                <td>Unique identifier for each order detail.</td>
            </tr>
            <tr>
                <td>order_id</td>
                <td>int</td>
                <td>References the related order.</td>
            </tr>
            <tr>
                <td>products_id</td>
                <td>int</td>
                <td>References the product being ordered.</td>
            </tr>
            <tr>
                <td>qty</td>
                <td>double</td>
                <td>Quantity of the product ordered.</td>
            </tr>
            <tr>
                <td>price</td>
                <td>double</td>
                <td>Price per unit of the product.</td>
            </tr>
            <tr>
                <td>vat</td>
                <td>double</td>
                <td>VAT applied to the product.</td>
            </tr>
            <tr>
                <td>uom_id</td>
                <td>int</td>
                <td>Unit of measurement for the product.</td>
            </tr>
            <tr>
                <td>created_at</td>
                <td>datetime</td>
                <td>Timestamp when the order detail was created.</td>
            </tr>
            <tr>
                <td>updated_at</td>
                <td>datetime</td>
                <td>Timestamp when the order detail was last updated.</td>
            </tr>
        </table>
    </section>

    <section>
        <h2>3. Key Metrics</h2>
        <ul>
            <li>Total Orders: <strong>50</strong></li>
            <li>Pending Orders: <strong>5</strong></li>
            <li>Average Order Value: <strong>$200</strong></li>
            <li>VAT Collected: <strong>$500</strong></li>
        </ul>
    </section>

    <section>
        <h2>4. Conclusion</h2>
        <p>The order module is designed to efficiently handle order processing and management, with clear links between orders and their associated details. The system ensures accurate tracking of key order metrics and provides flexibility for future enhancements.</p>
    </section>

    <footer>
        <p>Order Module Documentation | Generated by the Order Management System</p>
    </footer>

</body>

</html> -->




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Production Management Project Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
            line-height: 1.6;
        }

        header {
            text-align: center;
            padding: 20px 0;
            background-color: #007BFF;
            color: white;
            border-radius: 5px;
        }

        h1, h2, h3 {
            color: #333;
        }

        section {
            background-color: white;
            padding: 20px;
            margin: 20px 0;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        ul {
            margin: 10px 0;
            padding: 0 20px;
        }

        footer {
            text-align: center;
            margin-top: 20px;
            padding: 10px 0;
            background-color: #333;
            color: white;
        }
    </style>
</head>

<body>

    <header>
        <h1>Production Management Project Report</h1>
        <p>Date: <strong>November 30, 2024</strong></p>
    </header>

    <section>
        <h2>1. Project Overview</h2>
        <p>This project aims to design and develop a comprehensive production management system that streamlines production processes, optimizes resource utilization, and ensures timely delivery of products. The system integrates various components of production planning, inventory management, and quality control.</p>
    </section>

    <section>
        <h2>2. Objectives</h2>
        <ul>
            <li>Automate and streamline production workflows.</li>
            <li>Optimize resource allocation and minimize waste.</li>
            <li>Enhance real-time tracking of production progress.</li>
            <li>Improve quality control and compliance monitoring.</li>
            <li>Generate detailed reports and analytics for decision-making.</li>
        </ul>
    </section>

    <section>
        <h2>3. System Architecture</h2>
        <p>The system follows a modular architecture, comprising key components that interact seamlessly. The architecture includes:</p>
        <ul>
            <li><strong>User Interface (UI):</strong> A web-based dashboard for users to monitor and control production activities.</li>
            <li><strong>Database:</strong> Centralized storage for production data, inventory records, and reports.</li>
            <li><strong>API Layer:</strong> Facilitates communication between the UI and database, ensuring data integrity and security.</li>
        </ul>
    </section>

    <section>
        <h2>4. Key Modules</h2>
        <h3>4.1. Production Planning</h3>
        <p>Includes scheduling and resource allocation for various production tasks.</p>

        <h3>4.2. Inventory Management</h3>
        <p>Tracks raw materials, finished goods, and reorder levels to ensure smooth production.</p>

        <h3>4.3. Quality Control</h3>
        <p>Monitors product quality at each stage of production to maintain standards.</p>

        <h3>4.4. Reporting and Analytics</h3>
        <p>Generates reports on production performance, efficiency, and resource utilization.</p>
    </section>

    <section>
        <h2>5. Implementation and Testing</h2>
        <p>The implementation process involved setting up the infrastructure, coding the modules, and integrating them into a cohesive system. Comprehensive testing was conducted to ensure the system meets functional and performance requirements.</p>
    </section>

    <section>
        <h2>6. Results and Outcomes</h2>
        <ul>
            <li>Improved production efficiency by 20% through optimized scheduling.</li>
            <li>Reduced material waste by 15% with real-time inventory tracking.</li>
            <li>Enhanced quality control with automated checks and reports.</li>
            <li>Better decision-making through detailed analytics and insights.</li>
        </ul>
    </section>

    <section>
        <h2>7. Challenges and Solutions</h2>
        <p>Some challenges encountered during the project included:</p>
        <ul>
            <li><strong>Data Integration:</strong> Solution: Implemented APIs to ensure seamless data flow between modules.</li>
            <li><strong>User Adoption:</strong> Solution: Conducted training sessions for end-users to familiarize them with the system.</li>
            <li><strong>System Scalability:</strong> Solution: Designed a scalable architecture to accommodate future growth.</li>
        </ul>
    </section>

    <section>
        <h2>8. Conclusion and Recommendations</h2>
        <p>The production management system has significantly improved operational efficiency and resource utilization. Future recommendations include incorporating machine learning algorithms for predictive maintenance and further automating quality checks.</p>
    </section>

    <footer>
        <p>Production Management Project Report | Prepared by [Your Name/Team]</p>
    </footer>

</body>

</html>

