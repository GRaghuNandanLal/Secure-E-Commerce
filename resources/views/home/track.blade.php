<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no">
    <title>Mynetwork - Networking Questions</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="images/favicon.png">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100">

    <!-- Navigation Bar -->
    <nav class="bg-gray-800 p-4">
        <div class="container mx-auto flex justify-between">
            <a href="/" class="text-white hover:text-gray-400">Home</a>
            <a href="/problem" class="text-white hover:text-gray-400">Problems</a>
        </div>
    </nav>

    <div class="container mx-auto mt-8">
        <h2 class="text-2xl font-bold text-center">Visualization ({{$track}} of 4 problems done)</h2>

        <div class="flex flex-col md:flex-row justify-around mt-8">
            <div class="w-full md:w-1/2 mb-4 md:mb-0">
                <canvas id="barChart"></canvas>
            </div>
            <div class="w-full md:w-1/2">
                <canvas id="pieChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-purple-600 p-4 text-white text-center mt-8">
        <p>&copy; 2024 Mynetwork. All Rights Reserved.</p>
    </footer>

    <script>
        // Ensure this line is placed inside a <script> tag in a Blade view
        const track = @json($track); // Correctly pass the PHP variable to JavaScript

        const barCtx = document.getElementById('barChart').getContext('2d');
        const pieCtx = document.getElementById('pieChart').getContext('2d');
        let barChart, pieChart;

        // Automatically generate charts based on the track value
        generateCharts(track);

        function generateCharts(value) {
            const progress = value * 25; // Max is 100
            const remaining = 100 - progress;

            if (barChart) {
                barChart.destroy();
            }
            if (pieChart) {
                pieChart.destroy();
            }

            const barData = {
                labels: ['Progress', 'Remaining'],
                datasets: [{
                    label: 'Bar Chart',
                    data: [progress, remaining],
                    backgroundColor: ['#4CAF50', '#FFC107'],
                    borderWidth: 1
                }]
            };

            const pieData = {
                labels: ['Progress', 'Remaining'],
                datasets: [{
                    label: 'Pie Chart',
                    data: [progress, remaining],
                    backgroundColor: ['#2196F3', '#FF5722'],
                }]
            };

            const barConfig = {
                type: 'bar',
                data: barData,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Progress Bar Chart'
                        }
                    }
                }
            };

            const pieConfig = {
                type: 'pie',
                data: pieData,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Progress Pie Chart'
                        }
                    }
                }
            };

            barChart = new Chart(barCtx, barConfig);
            pieChart = new Chart(pieCtx, pieConfig);
        }
    </script>
</body>
</html>
