<!-- resources/views/welcome.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | JRC Resort Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-blue-100 flex items-center justify-center h-screen">

    <div class="text-center bg-white p-10 rounded-2xl shadow-lg">
        <h1 class="text-3xl font-bold text-blue-700 mb-8">Welcome to JRC Resort Booking System</h1>

        <div class="flex justify-center space-x-6">
            <a href="{{ route('login') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-5 rounded-xl transition duration-300">
                Login
            </a>

            <a href="{{ route('register') }}"
                class="bg-gray-200 hover:bg-gray-300 text-blue-700 font-semibold py-2 px-5 rounded-xl transition duration-300">
                Register
            </a>
        </div>
    </div>

</body>

</html>