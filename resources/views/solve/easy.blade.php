<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Practice Questions</title>
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
            from {
                opacity: 1;
            }
            to {
                opacity: 0.25;
            }
        }

        .loader .bar1 { transform: rotate(0deg) translate(0, -130%); animation-delay: 0s; }
        .loader .bar2 { transform: rotate(30deg) translate(0, -130%); animation-delay: -1.1s; }
        .loader .bar3 { transform: rotate(60deg) translate(0, -130%); animation-delay: -1s; }
        .loader .bar4 { transform: rotate(90deg) translate(0, -130%); animation-delay: -0.9s; }
        .loader .bar5 { transform: rotate(120deg) translate(0, -130%); animation-delay: -0.8s; }
        .loader .bar6 { transform: rotate(150deg) translate(0, -130%); animation-delay: -0.7s; }
        .loader .bar7 { transform: rotate(180deg) translate(0, -130%); animation-delay: -0.6s; }
        .loader .bar8 { transform: rotate(210deg) translate(0, -130%); animation-delay: -0.5s; }
        .loader .bar9 { transform: rotate(240deg) translate(0, -130%); animation-delay: -0.4s; }
        .loader .bar10 { transform: rotate(270deg) translate(0, -130%); animation-delay: -0.3s; }
        .loader .bar11 { transform: rotate(300deg) translate(0, -130%); animation-delay: -0.2s; }
        .loader .bar12 { transform: rotate(330deg) translate(0, -130%); animation-delay: -0.1s; }

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
            <h2 class="text-xl font-bold">SQL Practice Questions:</h2>

            <!-- Question 1: Create Table -->
            <h3 class="text-lg mt-4 font-semibold">1. Create a Table</h3>
            <p>Create a table named <strong>Students</strong> with the following columns:</p>
            <ul class="list-disc ml-6">
                <li><strong>id</strong> (INTEGER, Primary Key)</li>
                <li><strong>first_name</strong> (VARCHAR)</li>
                <li><strong>last_name</strong> (VARCHAR)</li>
                <li><strong>age</strong> (INTEGER)</li>
                <li><strong>grade</strong> (VARCHAR)</li>
            </ul>

            <!-- Question 2: Insert Data -->
            <h3 class="text-lg mt-4 font-semibold">2. Insert Data</h3>
            <p>Insert the following records into the <strong>Students</strong> table:</p>
            <ul class="list-disc ml-6">
                <li><strong>id = 1</strong>, first_name = 'John', last_name = 'Doe', age = 20, grade = 'A'</li>
                <li><strong>id = 2</strong>, first_name = 'Jane', last_name = 'Smith', age = 22, grade = 'B'</li>
                <li><strong>id = 3</strong>, first_name = 'Sam', last_name = 'Brown', age = 19, grade = 'C'</li>
            </ul>

            <!-- Question 3: Update Data -->
            <h3 class="text-lg mt-4 font-semibold">3. Update Data</h3>
            <p>Update the grade of the student with <strong>id = 2</strong> to <strong>'A'</strong>.</p>

            <!-- Question 4: Delete Data -->
            <h3 class="text-lg mt-4 font-semibold">4. Delete Data</h3>
            <p>Delete the record of the student with <strong>id = 3</strong>.</p>

            <!-- Question 5: Select Data -->
            <h3 class="text-lg mt-4 font-semibold">5. Select Data</h3>
            <p>Write a query to select all students who are older than 20.</p>

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
        document.getElementById('show-database').addEventListener('click', function() {
            // Redirect to the /tables URL when the button is clicked
            window.location.href = '/tables';
        });

        // Function to auto-resize the textarea
        function autoResizeTextarea(element) {
            element.style.height = 'auto'; // Reset height
            element.style.height = (element.scrollHeight) + 'px'; // Set new height
        }

        $(document).ready(function() {
            // Initialize the textarea height
            autoResizeTextarea(document.getElementById('code'));

            // Add input event listener to textarea
            $('#code').on('input', function() {
                autoResizeTextarea(this);
            });

            // Show solution when button is clicked
            $('#show-solution').click(function() {
                const solution = `
1. Create Table:
\`\`\`sql
CREATE TABLE Students (
    id INT PRIMARY KEY,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    age INT,
    grade VARCHAR(2)
);
\`\`\`

2. Insert Data:
\`\`\`sql
INSERT INTO Students (id, first_name, last_name, age, grade)
VALUES
(1, 'John', 'Doe', 20, 'A'),
(2, 'Jane', 'Smith', 22, 'B'),
(3, 'Sam', 'Brown', 19, 'C');
\`\`\`

3. Update Data:
\`\`\`sql
UPDATE Students
SET grade = 'A'
WHERE id = 2;
\`\`\`

4. Delete Data:
\`\`\`sql
DELETE FROM Students
WHERE id = 3;
\`\`\`

5. Select Data:
\`\`\`sql
SELECT * FROM Students
WHERE age > 20;
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
        });
    </script>
</body>
</html>
