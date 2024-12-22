<?php
// Handle the data retrieval
$data = [];
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "weight_converter";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, amount, from_weight, to_weight FROM weight_conversion WHERE test_case_type='Weak and Strong Normal'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strong Normal Cases</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom right, #d447b3, #2c556f);
            color: #f5f5f5;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: rgba(156, 79, 195, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: #fff;
            color: #333;
            border-radius: 4px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
            text-transform: uppercase;
        }
        .back-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<a href="http://localhost/weight_converter/convert.php" class="back-button">Back</a>
    <div class="container">
        <h1>Strong Normal Test Cases</h1>
        <table id="dataTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Amount</th>
                    <th>From Weight</th>
                    <th>To Weight</th>
                </tr>
            </thead>
            <tbody id="dataBody">
                <?php if (!empty($data)) {
                    foreach ($data as $row) {
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['amount']}</td>";
                        echo "<td>{$row['from_weight']}</td>";
                        echo "<td>{$row['to_weight']}</td>";
                        echo "</tr>";
                    }
                } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
