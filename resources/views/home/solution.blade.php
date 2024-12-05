<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Execution Results</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <!-- Navbar (optional) -->
    <nav class="bg-blue-600 p-4 shadow-md">
        <div class="container mx-auto text-white">
            <a href="/" class="text-2xl font-bold">MySQL Project</a>
        </div>
    </nav>

    <!-- Main content -->
    <div class="container mx-auto px-6 py-8">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">SQL Execution Results</h1>

        @if ($results->isEmpty())
            <p class="text-center text-gray-500">No execution results found.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($results as $result)
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Execution ID: {{ $result->id }}</h3>
                        
                        <div class="mb-4">
                            <span class="text-gray-600 font-semibold">Student ID:</span>
                            <span class="text-blue-600">{{ $result->student_id }}</span>
                        </div>
                        
                        <div class="mb-4">
                            <span class="text-gray-600 font-semibold">SQL Code:</span>
                            <pre class="text-gray-700 bg-gray-100 p-4 rounded">{{ $result->code }}</pre>
                        </div>

                        <div class="mb-4">
                            <span class="text-gray-600 font-semibold">Output:</span>
                            <p class="text-green-600">{{ $result->output }}</p>
                        </div>

                        <div class="mb-4">
                            <span class="text-gray-600 font-semibold">Created At:</span>
                            <p class="text-gray-500">{{ $result->created_at->format('d M, Y H:i') }}</p>
                        </div>

                        <div class="mb-4">
                            <span class="text-gray-600 font-semibold">Updated At:</span>
                            <p class="text-gray-500">{{ $result->updated_at->format('d M, Y H:i') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- Footer (optional) -->
    <footer class="bg-blue-600 p-4 mt-12">
        <div class="container mx-auto text-center text-white">
            <p>&copy; 2024 MySQL Project</p>
        </div>
    </footer>

</body>

</html>
