<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi-Weight Converter</title>
    <style>
        body {
            background: url('2.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh; /* Ensure full viewport height for visibility */
            margin: 0; /* Remove default body margin */
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
            color: white; /* Ensure text contrast */
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            box-shadow: 0 8px 10px rgba(0, 0, 0, 0.5);
        }
        h1 {
            margin-bottom: 20px;
            color: #000;
            font-size: 2rem;
            text-transform: uppercase;
        
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        input[type="text"], select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="text"]:focus, select:focus {
            border-color: #5e72e4;
        }
        .button-group {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            width: 100%;
        }
        .convert-btn, .clear-btn {
            flex: 1;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            text-transform: uppercase;
            outline: none;
            transition: background-color 0.3s, transform 0.2s;
        }
        .convert-btn {
            background-color: #28a745;
            color: #fff;
            padding: 12px 12px; /* Adjust padding to increase or decrease button size */
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-right: 10px;
            margin-left: 30px
        }
        .convert-btn:hover {
            background-color: #218838;
            transform: scale(1.05);
        }
        .clear-btn {
            background-color: #dc3545;
            color: #fff;
            padding: 12px 12px; /* Adjust padding to increase or decrease button size */
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-right: 30px;
            margin-left: 10px
        }
        .clear-btn:hover {
            background-color: #c82333;
            transform: scale(1.05);
        }
        .output {
            margin-top: 20px;
            padding: 15px;
            background: #fff;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            color: #333;
        }
        #dataDisplay {
            margin-top: 20px;
            padding: 10px;
            background: #2e2c2c;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .test-group {
            margin-top: 20px;
            display: flex;
            flex-direction: column; /* Align buttons vertically */
            align-items: flex-start; /* Align buttons to the left */
        }
        .test-group button {
            width: 100%; /* Full width of the container */
            margin-bottom: 10px; /* Space between buttons */
            padding: 12px 10px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 18px;
            text-transform: uppercase;
            outline: none;
            transition: background-color 0.3s, transform 0.2s;
            background-color: #fff; /* Match the theme */
            color: #000; /* Text color */
            margin-right: 80px;
        }
        .test-group button:hover {
            background-color: #364fc7; /* Darker shade on hover */
            transform: scale(1.05); /* Slight scale effect on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><b>Weight Converter</h1>
        <form id="converterForm" action="" method="POST">
            <div class="form-group">
                <label for="amount">Weight</label>
                <input type="text" id="amount" name="amount" placeholder="Enter weight">
            </div>
            <div class="form-group">
                <label for="fromWeight">From Weight Unit</label>
                <select id="fromWeight" name="fromWeight" onchange="updateInputWeight()">
                    <option value="gram">Gram</option>
                    <option value="kilogram">Kilogram</option>
                    <option value="pound">Pound</option>
                    <option value="ounce">Ounce</option>
                    <option value="other">Other</option>
                </select>
                <input type="text" id="customFromWeight" name="customFromWeight" placeholder="Type here" style="display: none;">
            </div>
            <div class="form-group">
                <label for="toWeight">To Weight Unit</label>
                <select id="toWeight" name="toWeight" onchange="updateConversionType()">
                    <option value="gram">Gram</option>
                    <option value="kilogram">Kilogram</option>
                    <option value="pound">Pound</option>
                    <option value="ounce">Ounce</option>
                    <option value="other">Other</option>
                </select>
                <input type="text" id="customToWeight" name="customToWeight" placeholder="Type here" style="display: none;">
            </div>
            <div class="button-group">
                <button type="button" class="convert-btn" onclick="convert()">Convert</button>
                <button type="button" class="clear-btn" onclick="clearForm()">Clear</button>
            </div>
        </form>
        <div class="output" id="output"></div>
    </div>
    <div class="test-group">
        <button onclick="location.href='http://localhost/weight_converter/weak_normal.php';" class="button btn-info">Weak Normal</button>
        <button onclick="location.href='http://localhost/weight_converter/strong_normal.php';" class="button btn-info">Strong Normal</button>
        <button onclick="location.href='http://localhost/weight_converter/weak_robust.php';" class="button btn-info">Weak robust</button>
        <button onclick="location.href='http://localhost/weight_converter/strong_robust.php';" class="button btn-info">Strong robust</button>
    </div>
    <script>
        function convert() {
            const amountInput = document.getElementById('amount').value.trim();
            const fromWeight = getWeightValue('fromWeight', 'customFromWeight');
            const toWeight = getWeightValue('toWeight', 'customToWeight');
            const output = document.getElementById('output');
            
            // Conversion Rates (relative to gram)
            const rates = {
                gram: 1,
                kilogram: 1000,
                pound: 453.592,
                ounce: 28.3495
            };

            // Validate input and determine test case type
            let testCaseType;
            let comment;
            let convertedAmounts = {};

            // Check if amount input is empty or non-numeric
            const isAmountInvalid = amountInput === "" || isNaN(amountInput) || parseFloat(amountInput) < 0;
            const isFromWeightInvalid = !rates.hasOwnProperty(fromWeight);
            const isToWeightInvalid = !rates.hasOwnProperty(toWeight);

            // Determine test case type based on invalid inputs
            if (isAmountInvalid || isFromWeightInvalid || isToWeightInvalid) {
                // Check for Strong Robust (two or more invalid inputs)
                if ((isAmountInvalid ? 1 : 0) + (isFromWeightInvalid ? 1 : 0) + (isToWeightInvalid ? 1 : 0) >= 2) {
                    testCaseType = "Strong Robust";
                    comment = "Two or more inputs are invalid";
                } else {
                    // Check for Weak Robust (exactly one invalid input)
                    testCaseType = "Weak and Strong Robust";
                    comment = isAmountInvalid ? "Invalid weight input" :
                              isFromWeightInvalid ? "Invalid from weight input" :
                              "Invalid to weight input";
                }
            } else {
                // Valid input case
                const amount = parseFloat(amountInput);
                testCaseType = "Weak and Strong Normal";
                comment = "Valid input";

                // Calculate converted amount based on selected weights
                const convertedAmount = amount * (rates[fromWeight] / rates[toWeight]);
                convertedAmounts[toWeight] = convertedAmount;
            }

            // Display output
            if (testCaseType.includes("Normal")) {
                output.innerHTML = `
                    <p>Converted Amount:</p>
                    <ul>
                        <li>${toWeight}: ${convertedAmounts[toWeight] ? convertedAmounts[toWeight].toFixed(2) : ''}</li>
                    </ul>
                    <p>Test Case Type: ${testCaseType}</p>
                    <p>Comment: ${comment}</p>
                `;
            } else {
                output.innerHTML = `
                    <p>Test Case Type: ${testCaseType}</p>
                    <p>Comment: ${comment}</p>
                `;
            }

            // Prepare data to send via AJAX
            const formData = new FormData();
            formData.append('amount', amountInput);
            formData.append('fromWeight', fromWeight);
            formData.append('toWeight', toWeight);
            formData.append('convertedAmount', JSON.stringify(convertedAmounts));
            formData.append('testCaseType', testCaseType);
            formData.append('comment', comment);

            // Send data via AJAX
            fetch('', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                console.log(data.message);
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        function getWeightValue(selectId, inputId) {
            const select = document.getElementById(selectId);
            const input = document.getElementById(inputId);
            return select.value === 'other' ? input.value.trim().toLowerCase() : select.value;
        }

        function updateInputWeight() {
            const select = document.getElementById('fromWeight');
            const input = document.getElementById('customFromWeight');
            if (select.value === 'other') {
                input.style.display = 'inline-block';
            } else {
                input.style.display = 'none';
            }
        }

        function updateConversionType() {
            const select = document.getElementById('toWeight');
            const input = document.getElementById('customToWeight');
            if (select.value === 'other') {
                input.style.display = 'inline-block';
            } else {
                input.style.display = 'none';
            }
        }

        function clearForm() {
            document.getElementById('converterForm').reset();
            document.getElementById('output').innerHTML = '';
            document.getElementById('customFromWeight').style.display = 'none';
            document.getElementById('customToWeight').style.display = 'none';
        }
    </script>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

        $amount = $_POST['amount'];
        $from_weight = $_POST['fromWeight'];
        $to_weight = $_POST['toWeight'];
        $converted_amount_json = $_POST['convertedAmount'];
        $test_case_type = $_POST['testCaseType'];
        $comment = $_POST['comment'];

        // Escape user inputs for security
        $amount = $conn->real_escape_string($amount);
        $from_weight = $conn->real_escape_string($from_weight);
        $to_weight = $conn->real_escape_string($to_weight);
        $test_case_type = $conn->real_escape_string($test_case_type);
        $comment = $conn->real_escape_string($comment);

        // Decode JSON string to get the converted amount array
        $converted_amounts = json_decode($converted_amount_json, true);

        // Extract converted amount for the target weight
        $converted_amount = isset($converted_amounts[$to_weight]) ? $converted_amounts[$to_weight] : null;

        // Insert into database
        $sql = "INSERT INTO weight_conversion (amount, from_weight, to_weight, converted_amount, test_case_type, comment)
                VALUES ('$amount', '$from_weight', '$to_weight', '$converted_amount', '$test_case_type', '$comment')";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(["message" => "Record inserted successfully"]);
        } else {
            echo json_encode(["message" => "Error: " . $sql . "<br>" . $conn->error]);
        }

        $conn->close();
    }
    ?>
</body>
</html>
