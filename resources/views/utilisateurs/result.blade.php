<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stress Result</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-[#FBF4FA] min-h-screen flex items-center justify-center">

<div class="bg-white rounded-lg shadow-md p-6 max-w-md w-full mx-auto">
    <h2 class="text-xl font-bold text-[#C447AF] mb-4 text-center">Your Stress Test Results</h2>

    <!-- Stress aigu -->
    <div class="mb-4">
        <p class="text-lg font-semibold text-[#C447AF]">Acute Stress</p>
        <div class="bg-[#FBF4FA] p-2 rounded">
            <div class="flex justify-between items-center">
                <span>{{ $result->acute }} / 10</span>
                <span class="text-[#C447AF] font-bold">{{ ($result->acute / 10) * 100 }}%</span>
            </div>
            <div class="w-full bg-[#E192D4] rounded-full h-2 mt-2">
                <div class="bg-[#C447AF] h-2 rounded-full" style="width: {{ ($result->acute / 10) * 100 }}%"></div>
            </div>
        </div>
    </div>

    <!-- Stress chronique -->
    <div class="mb-4">
        <p class="text-lg font-semibold text-[#C447AF]">Chronic Stress</p>
        <div class="bg-[#FBF4FA] p-2 rounded">
            <div class="flex justify-between items-center">
                <span>{{ $result->chronic }} / 10</span>
                <span class="text-[#C447AF] font-bold">{{ ($result->chronic / 10) * 100 }}%</span>
            </div>
            <div class="w-full bg-[#E192D4] rounded-full h-2 mt-2">
                <div class="bg-[#C447AF] h-2 rounded-full" style="width: {{ ($result->chronic / 10) * 100 }}%"></div>
            </div>
        </div>
    </div>

    <!-- Stress émotionnel -->
    <div class="mb-4">
        <p class="text-lg font-semibold text-[#C447AF]">Emotional Stress</p>
        <div class="bg-[#FBF4FA] p-2 rounded">
            <div class="flex justify-between items-center">
                <span>{{ $result->emotional }} / 10</span>
                <span class="text-[#C447AF] font-bold">{{ ($result->emotional / 10) * 100 }}%</span>
            </div>
            <div class="w-full bg-[#E192D4] rounded-full h-2 mt-2">
                <div class="bg-[#C447AF] h-2 rounded-full" style="width: {{ ($result->emotional / 10) * 100 }}%"></div>
            </div>
        </div>
    </div>

    <!-- Stress physique -->
    <div class="mb-6">
        <p class="text-lg font-semibold text-[#C447AF]">Physical Stress</p>
        <div class="bg-[#FBF4FA] p-2 rounded">
            <div class="flex justify-between items-center">
                <span>{{ $result->physical }} / 10</span>
                <span class="text-[#C447AF] font-bold">{{ ($result->physical / 10) * 100 }}%</span>
            </div>
            <div class="w-full bg-[#E192D4] rounded-full h-2 mt-2">
                <div class="bg-[#C447AF] h-2 rounded-full" style="width: {{ ($result->physical / 10) * 100 }}%"></div>
            </div>
        </div>
    </div>

    <!-- Main Type -->
    <div class="mt-6 p-4 bg-[#FBF4FA] rounded border border-[#E192D4]">
        <p class="text-center text-lg">Your main type of stress is:</p>
        <p class="text-center text-xl font-bold text-[#C447AF] mt-2">{{ ucfirst($result->main_type) }}</p>
    </div>
</div>



</body>
</html>
