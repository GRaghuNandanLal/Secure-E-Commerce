<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <!-- Navbar -->
    <nav class="bg-gray-800 text-white p-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="text-xl font-semibold"><a href = "/">MysqlProject</a></div>
            <div class="space-x-6">
                <a href="{{ route('welcome') }}" class="hover:text-gray-400">Home</a>
                <a href="{{ route('profile.show') }}" class="hover:text-gray-400">Profile</a>
                <!-- Logout link with a POST method -->
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="hover:text-gray-400">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="max-w-4xl mx-auto p-6">
        <!-- Header Section -->
        <div class="bg-green-500 text-white text-center p-4 rounded-md shadow-md">
            <h2 class="text-xl">User Profile</h2>
        </div>

        <div class="bg-white p-6 mt-6 rounded-lg shadow-md">
            <!-- Success Message -->
            @if (session('status'))
                <div class="bg-green-100 text-green-700 p-4 rounded-md mb-4 text-center">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Error Message -->
            @if (session('error'))
                <div class="bg-red-100 text-red-700 p-4 rounded-md mb-4 text-center">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Profile Info Section -->
            <div class="flex flex-col items-center mb-6 space-y-4">
                <img src="{{ Auth::user()->profile_photo_url }}" alt="Profile Picture" class="w-32 h-32 rounded-full border-4 border-gray-300">
                <p class="text-lg font-semibold">Name: {{ Auth::user()->name }}</p>
                <p class="text-lg font-semibold">Email: {{ Auth::user()->email }}</p>
                <p class="text-lg font-semibold">Joined: {{ Auth::user()->created_at->format('d M, Y') }}</p>
                <p class="text-lg font-semibold">Plan: {{$mesho }}</p>



            </div>

            <!-- Profile Update Form -->
            <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="name" class="block text-gray-700 font-semibold">Name</label>
                    <input type="text" id="name" name="name" value="{{ Auth::user()->name }}" required class="w-full px-4 py-2 mt-2 border rounded-md focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="email" class="block text-gray-700 font-semibold">Email</label>
                    <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" required class="w-full px-4 py-2 mt-2 border rounded-md focus:ring-2 focus:ring-blue-500">
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-md hover:bg-blue-700 focus:ring-2 focus:ring-blue-500">Update Profile</button>
            </form>

            <hr class="my-6">

            <!-- Password Update Form -->
            <form action="{{ route('password.update') }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="current_password" class="block text-gray-700 font-semibold">Current Password</label>
                    <input type="password" id="current_password" name="current_password" required class="w-full px-4 py-2 mt-2 border rounded-md focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="password" class="block text-gray-700 font-semibold">New Password</label>
                    <input type="password" id="password" name="password" required class="w-full px-4 py-2 mt-2 border rounded-md focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label for="password_confirmation" class="block text-gray-700 font-semibold">Confirm New Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required class="w-full px-4 py-2 mt-2 border rounded-md focus:ring-2 focus:ring-blue-500">
                </div>

                <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-md hover:bg-green-700 focus:ring-2 focus:ring-green-500">Change Password</button>
            </form>

            <hr class="my-6">

            <!-- Logout Form -->
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full bg-red-600 text-white py-3 rounded-md hover:bg-red-700 focus:ring-2 focus:ring-red-500">Logout</button>
            </form>
        </div>
    </div>

</body>
</html>
