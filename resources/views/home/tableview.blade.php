{{-- resources/views/your-view.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Tables</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            display: flex;
            flex-direction: column;
        }
        header {
            background-color: #333;
            padding: 10px 20px;
            color: white;
            text-align: center;
        }
        header a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            font-weight: 700;
        }
        header a:hover {
            text-decoration: underline;
        }
        .sidebar {
            width: 250px;
            background-color: #333;
            color: white;
            padding: 20px;
            height: 100vh;
            overflow-y: auto;
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            margin: 10px 0;
        }
        .sidebar ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            display: block;
            padding: 8px;
            background-color: #444;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .sidebar ul li a:hover {
            background-color: #555;
        }
        .content {
            flex: 1;
            padding: 20px;
            background-color: #fff;
            height: 100vh;
            overflow-y: auto;
        }
        .content h2 {
            margin-top: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #333;
            color: white;
        }
        td {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        footer {
            text-align: center;
            padding: 10px;
            background-color: #333;
            color: white;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>

    <!-- Header (Navigation Bar with Home Link) -->
    <header>
        <a href="/">Back to Home</a>
    </header>

    <div style="display: flex;">

        <!-- Sidebar -->
        <div class="sidebar">
            <h2>Database Tables</h2>
            <ul id="table-list">
                @foreach($tableNames as $tableName)
                    <li><a href="javascript:void(0);" onclick="showTableContent('{{ $tableName }}')">{{ $tableName }}</a></li>
                @endforeach
            </ul>
        </div>

        <!-- Main Content Area -->
        <div class="content">
            <h2>Table Contents</h2>
            <div id="table-content">
                <p>Select a table from the left to view its contents.</p>
            </div>
        </div>

    </div>

    <footer>
        <p>&copy; {{ date('Y') }} Your Company. All rights reserved.</p>
    </footer>

    <script>
      function showTableContent(tableName) {
        // Show loading message
        document.getElementById('table-content').innerHTML = '<p>Loading...</p>';

        // Use AJAX to fetch data for the selected table
        fetch(`/get-table-contents/${tableName}`)
            .then(response => response.json())
            .then(data => {
                // Check if the response has an error message or empty message
                if (data.error) {
                    document.getElementById('table-content').innerHTML = `<p>${data.error}</p>`;
                } else if (data.message) {
                    // If the table is empty, show the message but still display headers
                    document.getElementById('table-content').innerHTML = `<p>${data.message}</p>`;
                } else {
                    // Create the table structure with headers
                    let tableHTML = '<table><thead><tr>';

                    // Dynamically create table headers
                    if (data.length > 0) {
                        // Table has data, generate headers from the first row
                        Object.keys(data[0]).forEach(column => {
                            tableHTML += `<th>${column}</th>`;
                        });
                    } else {
                        // If no data, just create empty headers based on expected columns
                        // You may want to hardcode column names here or dynamically fetch schema if you have that information
                        tableHTML += '<th>Column 1</th><th>Column 2</th><th>Column 3</th>'; // Example columns
                    }

                    tableHTML += '</tr></thead><tbody>';

                    // Add rows of data (if any)
                    if (data.length > 0) {
                        data.forEach(row => {
                            tableHTML += '<tr>';
                            Object.values(row).forEach(value => {
                                tableHTML += `<td>${value}</td>`;
                            });
                            tableHTML += '</tr>';
                        });
                    } else {
                        // If no rows of data, just leave the table empty
                        tableHTML += '<tr><td colspan="3">Table is empty.</td></tr>'; // Adjust colspan as per your columns
                    }

                    tableHTML += '</tbody></table>';
                    document.getElementById('table-content').innerHTML = tableHTML;
                }
            })
            .catch(err => {
                document.getElementById('table-content').innerHTML = `<p>Error loading data: ${err}</p>`;
            });
      }
    </script>

</body>
</html>
