<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Practice Questions - Library Management System</title>
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
            <h2 class="text-xl font-bold">SQL Practice Questions - Library Management System:</h2>

            <!-- Question 1: Create Tables -->
            <h3 class="text-lg mt-4 font-semibold">1. Create Tables</h3>
            <p>Create the following tables for a Library Management System:</p>
            <ul class="list-disc ml-6">
                <li><strong>Books</strong> (book_id, title, genre_id, author_id)</li>
                <li><strong>Authors</strong> (author_id, first_name, last_name)</li>
                <li><strong>Members</strong> (member_id, first_name, last_name, membership_date)</li>
                <li><strong>Transactions</strong> (transaction_id, book_id, member_id, checkout_date, return_date)</li>
                <li><strong>Genres</strong> (genre_id, genre_name)</li>
            </ul>

            <!-- Question 2: Insert Data -->
            <h3 class="text-lg mt-4 font-semibold">2. Insert Data</h3>
            <p>Insert sample data for the tables above, ensuring at least 5 authors, 10 books, 5 genres, and 5 members.</p>

            <!-- Question 3: Retrieve Books by Genre -->
            <h3 class="text-lg mt-4 font-semibold">3. Retrieve Books by Genre</h3>
            <p>Write a query to find all books from the genre <strong>'Fantasy'</strong>.</p>

            <!-- Question 4: Member's Book History -->
            <h3 class="text-lg mt-4 font-semibold">4. Member's Book Checkout History</h3>
            <p>Write a query to find the titles of books checked out by the member with <strong>member_id = 3</strong>.</p>

            <!-- Question 5: Count of Books by Author -->
            <h3 class="text-lg mt-4 font-semibold">5. Count of Books by Author</h3>
            <p>Write a query to count the number of books written by each author.</p>

            <!-- Question 6: Transactions Summary -->
            <h3 class="text-lg mt-4 font-semibold">6. Transactions Summary</h3>
            <p>Write a query to calculate the number of books checked out per month in 2024.</p>

            <!-- Question 7: Join - Books and Authors -->
            <h3 class="text-lg mt-4 font-semibold">7. Join - Books and Authors</h3>
            <p>Write a query to display the book titles along with the author's name (First Name, Last Name).</p>

            <!-- Question 8: Update Transaction Records -->
            <h3 class="text-lg mt-4 font-semibold">8. Update Transaction Records</h3>
            <p>Write a query to mark a transaction as returned for a book with <strong>transaction_id = 2</strong>.</p>

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
        <p>&copy; 2024 Library System. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
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

        $(document).ready(function() {
            $('#show-solution').click(function() {
                const solution = `
1. Create Tables:
\`\`\`sql
CREATE TABLE Authors (
    author_id INT PRIMARY KEY,
    first_name VARCHAR(100),
    last_name VARCHAR(100)
);

CREATE TABLE Genres (
    genre_id INT PRIMARY KEY,
    genre_name VARCHAR(50)
);

CREATE TABLE Books (
    book_id INT PRIMARY KEY,
    title VARCHAR(100),
    genre_id INT,
    author_id INT,
    FOREIGN KEY (genre_id) REFERENCES Genres(genre_id),
    FOREIGN KEY (author_id) REFERENCES Authors(author_id)
);

CREATE TABLE Members (
    member_id INT PRIMARY KEY,
    first_name VARCHAR(100),
    last_name VARCHAR(100),
    membership_date DATE
);

CREATE TABLE Transactions (
    transaction_id INT PRIMARY KEY,
    book_id INT,
    member_id INT,
    checkout_date DATE,
    return_date DATE,
    FOREIGN KEY (book_id) REFERENCES Books(book_id),
    FOREIGN KEY (member_id) REFERENCES Members(member_id)
);
\`\`\`

2. Insert Data:
\`\`\`sql
-- Insert sample authors, genres, books, members, and transactions
INSERT INTO Authors (author_id, first_name, last_name) VALUES
(1, 'J.K.', 'Rowling'),
(2, 'George', 'Martin'),
(3, 'J.R.R.', 'Tolkien');

INSERT INTO Genres (genre_id, genre_name) VALUES
(1, 'Fantasy'),
(2, 'Science Fiction'),
(3, 'Mystery');

INSERT INTO Books (book_id, title, genre_id, author_id) VALUES
(1, 'Harry Potter and the Philosopher\'s Stone', 1, 1),
(2, 'A Game of Thrones', 1, 2),
(3, 'The Hobbit', 1, 3);

INSERT INTO Members (member_id, first_name, last_name, membership_date) VALUES
(1, 'Alice', 'Johnson', '2024-01-15'),
(2, 'Bob', 'Smith', '2024-02-10');

INSERT INTO Transactions (transaction_id, book_id, member_id, checkout_date, return_date) VALUES
(1, 1, 1, '2024-10-01', NULL),
(2, 2, 2, '2024-09-01', '2024-09-15');
\`\`\`

3. Retrieve Books by Genre:
\`\`\`sql
SELECT title FROM Books
JOIN Genres ON Books.genre_id = Genres.genre_id
WHERE genre_name = 'Fantasy';
\`\`\`

4. Member's Book Checkout History:
\`\`\`sql
SELECT title FROM Books
JOIN Transactions ON Books.book_id = Transactions.book_id
WHERE member_id = 3;
\`\`\`

5. Count of Books by Author:
\`\`\`sql
SELECT CONCAT(first_name, ' ', last_name) AS author_name, COUNT(*) AS book_count
FROM Authors
JOIN Books ON Authors.author_id = Books.author_id
GROUP BY author_name;
\`\`\`

6. Transactions Summary by Month:
\`\`\`sql
SELECT EXTRACT(MONTH FROM checkout_date) AS month, COUNT(*) AS books_checked_out
FROM Transactions
WHERE EXTRACT(YEAR FROM checkout_date) = 2024
GROUP BY month
ORDER BY month;
\`\`\`

7. Join Books and Authors:
\`\`\`sql
SELECT title, CONCAT(first_name, ' ', last_name) AS author_name
FROM Books
JOIN Authors ON Books.author_id = Authors.author_id;
\`\`\`

8. Update Transaction Records:
\`\`\`sql
UPDATE Transactions
SET return_date = '2024-10-05'
WHERE transaction_id = 2;
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
