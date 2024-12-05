<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Practice - Banking System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom spinner styling */
        .spinner {
            transform: translate(-50%, -50%);
        }
        /* Ensure the textarea grows */
        textarea {
            overflow: hidden;
        }
        /* Loader styles */
        .loader {
            position: relative;
            width: 54px;
            height: 54px;
            border-radius: 10px;
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
        }

        .loader div {
            width: 8%;
            height: 24%;
            background: rgb(0, 123, 255); /* Blue color */
            position: absolute;
            left: 50%;
            top: 30%;
            opacity: 0;
            border-radius: 50px;
            box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
            animation: fade458 1s linear infinite;
        }

        @keyframes fade458 {
            from { opacity: 1; }
            to { opacity: 0.25; }
        }

        /* Textarea and output area styles */
        textarea {
            border: 2px solid rgb(0, 123, 255); /* Blue border */
            background-color: rgb(240, 248, 255); /* Light blue background */
        }
        
        pre {
            background-color: rgb(230, 230, 250); /* Lavender background */
            border: 1px solid rgb(200, 200, 200); /* Light gray border */
        }
    </style>
</head>
<body class="flex flex-col min-h-screen bg-gray-200">

    <nav class="bg-blue-500">
        <div class="container mx-auto flex justify-around p-4">
            <a href="/" class="text-white px-4 py-2 hover:bg-blue-600">Home</a>
            <a href="/about" class="text-white px-4 py-2 hover:bg-blue-600">About</a>
            <a href="/contact" class="text-white px-4 py-2 hover:bg-blue-600">Contact</a>
        </div>
    </nav>

    <div class="container mx-auto flex flex-col md:flex-row mt-4 overflow-hidden">
        <div class="input-area flex-1 bg-blue-100 p-4 border-b md:border-b-0 md:border-r border-gray-300">
            <h2 class="text-xl font-bold">SQL Practice - Banking System:</h2>

            <!-- Question 1: Create Tables -->
            <h3 class="text-lg mt-4 font-semibold">1. Create Tables</h3>
            <p>Create the following tables for the banking system:</p>
            <ul class="list-disc ml-6">
                <li><strong>Banks</strong>: bank_id (INTEGER, Primary Key), name (VARCHAR), location (VARCHAR)</li>
                <li><strong>Accounts</strong>: account_id (INTEGER, Primary Key), bank_id (INTEGER, Foreign Key), account_type (VARCHAR), balance (DECIMAL)</li>
                <li><strong>Transactions</strong>: transaction_id (INTEGER, Primary Key), account_id (INTEGER, Foreign Key), transaction_type (VARCHAR), amount (DECIMAL), transaction_date (DATE)</li>
            </ul>

            <!-- Question 2: Insert Data -->
            <h3 class="text-lg mt-4 font-semibold">2. Insert Data</h3>
            <p>Insert the following records into the tables:</p>
            <ul class="list-disc ml-6">
                <li><strong>Banks</strong>: 
                    <ul>
                        <li>bank_id = 1, name = 'First National Bank', location = 'New York'</li>
                        <li>bank_id = 2, name = 'Global Bank', location = 'London'</li>
                    </ul>
                </li>
                <li><strong>Accounts</strong>: 
                    <ul>
                        <li>account_id = 1, bank_id = 1, account_type = 'Checking', balance = 5000.00</li>
                        <li>account_id = 2, bank_id = 1, account_type = 'Saving', balance = 10000.00</li>
                        <li>account_id = 3, bank_id = 2, account_type = 'Checking', balance = 2000.00</li>
                    </ul>
                </li>
                <li><strong>Transactions</strong>: 
                    <ul>
                        <li>transaction_id = 1, account_id = 1, transaction_type = 'Deposit', amount = 1500.00, transaction_date = '2024-01-15'</li>
                        <li>transaction_id = 2, account_id = 1, transaction_type = 'Withdrawal', amount = 200.00, transaction_date = '2024-01-16'</li>
                        <li>transaction_id = 3, account_id = 2, transaction_type = 'Deposit', amount = 3000.00, transaction_date = '2024-02-01'</li>
                        <li>transaction_id = 4, account_id = 3, transaction_type = 'Withdrawal', amount = 500.00, transaction_date = '2024-02-03'</li>
                    </ul>
                </li>
            </ul>

            <!-- Question 3: Update Data -->
            <h3 class="text-lg mt-4 font-semibold">3. Update Data</h3>
            <p>Update the balance of the checking account at 'First National Bank' to reflect the transaction on '2024-01-15'.</p>

            <!-- Question 4: Delete Data -->
            <h3 class="text-lg mt-4 font-semibold">4. Delete Data</h3>
            <p>Delete all transactions that have been marked as 'Withdrawals' for the 'Global Bank'.</p>

            <!-- Question 5: Select Data -->
            <h3 class="text-lg mt-4 font-semibold">5. Select Data</h3>
            <p>Write a query to find the total balance of accounts at 'First National Bank'.</p>
            <p>Write a query to show all transactions made in January 2024.</p>

            <textarea id="code" name="code" class="w-full p-2 rounded resize-none h-auto mt-4" placeholder="Write your SQL code here..." required></textarea>

            <button id="run-code" class="mt-4 bg-blue-600 text-white py-2 rounded hover:bg-blue-700 w-full">Run SQL Code</button>
            <button id="show-database" class="mt-4 bg-green-600 text-white py-2 rounded hover:bg-green-700 w-full">
                View Database
            </button>
            <button id="show-solution" class="mt-4 bg-green-600 text-white py-2 rounded hover:bg-green-700 w-full">Show Solution</button>
        </div>

        <div class="output-area flex-1 bg-white p-4 relative overflow-y-auto mt-4 md:mt-0">
            <div class="loader" id="spinner">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
                <div class="bar4"></div>
                <div class="bar5"></div>
                <div class="bar6"></div>
                <div class="bar7"></div>
                <div class="bar8"></div>
                <div class="bar9"></div>
                <div class="bar10"></div>
                <div class="bar11"></div>
                <div class="bar12"></div>
            </div>
            <h2 class="text-lg font-bold">Output:</h2>
            <pre id="output" class="mt-2 p-2 rounded border overflow-y-auto"></pre>
        </div>
    </div>

    <footer class="bg-blue-600 text-white text-center py-4 mt-auto">
        <p>&copy; 2024 mynetwork Compiler. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Show solution when button is clicked
        $('#show-solution').click(function() {
            const solution = `
1. Create Tables:
\`\`\`sql
CREATE TABLE Banks (
    bank_id INT PRIMARY KEY,
    name VARCHAR(100),
    location VARCHAR(100)
);

CREATE TABLE Accounts (
    account_id INT PRIMARY KEY,
    bank_id INT,
    account_type VARCHAR(50),
    balance DECIMAL,
    FOREIGN KEY (bank_id) REFERENCES Banks(bank_id)
);

CREATE TABLE Transactions (
    transaction_id INT PRIMARY KEY,
    account_id INT,
    transaction_type VARCHAR(50),
    amount DECIMAL,
    transaction_date DATE,
    FOREIGN KEY (account_id) REFERENCES Accounts(account_id)
);
\`\`\`

2. Insert Data:
\`\`\`sql
INSERT INTO Banks (bank_id, name, location) VALUES
(1, 'First National Bank', 'New York'),
(2, 'Global Bank', 'London');

INSERT INTO Accounts (account_id, bank_id, account_type, balance) VALUES
(1, 1, 'Checking', 5000.00),
(2, 1, 'Saving', 10000.00),
(3, 2, 'Checking', 2000.00);

INSERT INTO Transactions (transaction_id, account_id, transaction_type, amount, transaction_date) VALUES
(1, 1, 'Deposit', 1500.00, '2024-01-15'),
(2, 1, 'Withdrawal', 200.00, '2024-01-16'),
(3, 2, 'Deposit', 3000.00, '2024-02-01'),
(4, 3, 'Withdrawal', 500.00, '2024-02-03');
\`\`\`

3. Update Data:
\`\`\`sql
UPDATE Accounts
SET balance = balance + 1500.00
WHERE account_id = 1;
\`\`\`

4. Delete Data:
\`\`\`sql
DELETE FROM Transactions
WHERE transaction_type = 'Withdrawal' AND account_id IN (SELECT account_id FROM Accounts WHERE bank_id = 2);
\`\`\`

5. Select Data:
\`\`\`sql
-- Total balance for First National Bank:
SELECT SUM(balance) FROM Accounts WHERE bank_id = 1;

-- Transactions in January 2024:
SELECT * FROM Transactions WHERE transaction_date BETWEEN '2024-01-01' AND '2024-01-31';
\`\`\`
`;

            $('#output').text(solution);
        });

        $('#run-code').click(function(event) {
            event.preventDefault(); // Prevent default form submission

            // Show spinner
            $('#spinner').show();
            $('#output').text('');

            const code = $('#code').val();

            $.ajax({
                url: '/compile', // Adjust this to your SQL compilation endpoint
                type: 'POST',
                data: {
                    code: code,
                    _token: '{{ csrf_token() }}' // Include CSRF token
                },
                success: function(response) {
                    // Hide spinner
                    $('#spinner').hide();
                    $('#output').text(response.output);
                },
                error: function(xhr) {
                    // Hide spinner and show error
                    $('#spinner').hide();
                    $('#output').text('Error: ' + xhr.responseText);
                }
            });
        });
        document.getElementById('show-database').addEventListener('click', function() {
        // Redirect to the /tables URL when the button is clicked
        window.location.href = '/tables';
    });
     // Function to auto-resize the textarea
function autoResizeTextarea(element) {
    element.style.height = 'auto'; // Reset height
    element.style.height = (element.scrollHeight) + 'px'; // Set new height
}

// Add event listener for textarea input
$(document).ready(function() {
    // Get the textarea element
    const textarea = document.getElementById('code');
    
    // Trigger auto-resize whenever the user types
    textarea.addEventListener('input', function() {
        autoResizeTextarea(textarea);
    });
    
    // Initial call to set the height correctly if the textarea already has content
    autoResizeTextarea(textarea);
});

    </script>
</body>
</html>
