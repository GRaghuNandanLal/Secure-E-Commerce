<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mynetwork - Networking Questions</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="images/favicon.png">
    @include("home.css")
</head>
<body class="bg-gray-100">

    @include("home.preloader")
    @include("home.nav")
    <div style="height:80px;background-color:#5f4dee"></div>

    <div class="container mx-auto p-6">
        <h1 class="text-4xl font-bold text-center text-indigo-600 mb-8">User Rankings</h1>

        <!-- Ranking Table -->
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead>
                <tr class="text-left text-gray-700 bg-indigo-100">
                    <th class="px-6 py-3 border-b">Rank</th>
                    <th class="px-6 py-3 border-b">Username</th>
                    <th class="px-6 py-3 border-b">Visualization</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                    <tr class="text-gray-700">
                        <td class="px-6 py-3 border-b">{{ $index + 1 }}</td> <!-- Rank is the index + 1 -->
                        <td class="px-6 py-3 border-b">{{ $user->name }}</td>
                        <td class="px-6 py-3 border-b">
                            <!-- Dynamic Pie Chart or Progress Bar Based on Rank -->
                            <canvas id="pieChart-{{ $index }}" class="pie-chart w-24 h-24 mx-auto"></canvas>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include("home.footer")
    @include("home.copyright")
    @include("home.script")

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Generate Pie Charts Based on Rank
        @foreach ($users as $index => $user)
            // Generate a chart for each user based on their rank
            const pieChartData_{{ $index }} = {
                labels: ['Rank', 'Remaining'],
                datasets: [{
                    data: [{{ 100 - $index * 10 }}, {{ $index * 10 }}], // Rank 1 = 100%, Rank 2 = 90%, etc.
                    backgroundColor: ['#36A2EB', '#FF6384'],
                }]
            };

            const ctx_{{ $index }} = document.getElementById('pieChart-{{ $index }}').getContext('2d');
            const pieChart_{{ $index }} = new Chart(ctx_{{ $index }}, {
                type: 'pie',
                data: pieChartData_{{ $index }},
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return tooltipItem.label + ': ' + tooltipItem.raw.toFixed(0) + '%';
                                }
                            }
                        }
                    }
                });
        @endforeach
    </script>

</body>
</html>
