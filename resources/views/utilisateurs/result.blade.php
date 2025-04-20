<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stress Result</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-6 rounded-xl shadow-md max-w-xl w-full text-center">
        <h1 class="text-2xl font-bold mb-4">🧠 Your Stress Result</h1>

        <p class="mb-2"><strong>Acute Stress:</strong> {{ $result->acute }}</p>
        <p class="mb-2"><strong>Chronic Stress:</strong> {{ $result->chronic }}</p>
        <p class="mb-2"><strong>Emotional Stress:</strong> {{ $result->emotional }}</p>
        <p class="mb-2"><strong>Physical Stress:</strong> {{ $result->physical }}</p>

        <div class="mt-4 text-lg">
            <p>Your main type of stress is: 
                <span class="font-bold text-blue-600">{{ ucfirst($result->main_type) }}</span>
            </p>
        </div>
    </div>
</body>
</html>
