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
    <div style = "height:80px;background-color:#5f4dee"></div>

    <div class="container mx-auto p-6">
    <h1 class="text-4xl font-bold text-center text-indigo-600 mb-8">Data Science Coding Questions</h1>

 

        @foreach($problems as $problem)
        <div class="bg-white shadow-md rounded-lg p-4 transition-transform transform hover:scale-105">
        <h2 class="text-lg font-semibold text-indigo-600">Question: {{ $problem->title }}</h2>
        <p>{{ $problem->description }}</p>
        <form action="{{ route('probsolve') }}" method="POST">
            @csrf <!-- Include CSRF token for security -->
            <input type="hidden" name="problem_id" value="{{ $problem->id }}">
            <input type="hidden" name="problem_solution" value="{{ $problem->solution }}">
            <button type="submit" class="mt-4 inline-block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Solve</button>
        </form>
    </div>
        @endforeach
    </div>
</div>

    @include("home.footer")
    @include("home.copyright")
    @include("home.script")
</body>
</html>
