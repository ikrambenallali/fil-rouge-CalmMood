<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Utilisateur</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Ionicons -->
    <script src="https://unpkg.com/ionicons@5.5.0/dist/ionicons/ionicons.esm.js" type="module"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.0/dist/ionicons/ionicons.js"></script>
</head>

<body class="bg-[#FBF4FA] font-sans">

    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-[#C447AF] text-white p-2 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold mb-10 text-center">CalmMood</h1>
            <nav>
                <ul>
                    <li class="mb-4">
                        <a href="#" class="flex items-center hover:bg-[#FBF4FA] hover:text-[#C447AF] p-2 rounded-xl">
                            <ion-icon name="home-outline" class="text-xl"></ion-icon>
                            <span class="ml-3">Dashboard</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('categoryEx') }}" class="flex items-center  hover:bg-[#FBF4FA] hover:text-[#C447AF] p-2 rounded-xl">
                            <ion-icon name="reader-outline"></ion-icon>
                            <i class="fas fa-meditation mr-3"></i> Exercises
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('advice') }}" class="flex items-center hover:bg-[#FBF4FA] hover:text-[#C447AF] p-2 rounded-xl">

                            <ion-icon name="bulb-outline"></ion-icon>
                            <i class="fas fa-comment-medical mr-3"></i> Anti-Stress Tips
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="#" class="flex items-center hover:bg-[#FBF4FA] hover:text-[#C447AF] p-2 rounded-xl">
                            <ion-icon name="help-circle-outline"></ion-icon>
                            <span class="ml-3">Types of Stress</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="#" class="flex items-center hover:bg-[#FBF4FA] hover:text-[#C447AF] p-2 rounded-xl">
                            <ion-icon name="person-outline"></ion-icon>
                            <span class="ml-3">Profile</span>
                        </a>
                    </li>
                </ul>

                <div class="mt-auto pb-4">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full bg-[#FBF4FA] text-[#C447AF] font-semibold py-2 px-4 rounded-lg flex items-center justify-center transition-all duration-200">
                            <ion-icon name="log-out-outline" class="mr-2"></ion-icon> Logout
                        </button>
                    </form>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-10 overflow-y-auto">
            <div class="-ml-6">
                <img class="w-[15%] -my-12" src="{{ asset('storage/images/logo.png') }}" alt="logo">
            </div>
            <h2 class="text-3xl font-semibold mb-8 mt-12 text-[#C447AF]">User Dashboard</h2>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col items-center">
                    <ion-icon name="barbell-outline" class="text-4xl text-[#C447AF] mb-4"></ion-icon>
                    <h3 class="text-lg font-bold text-gray-700">Exercises</h3>
                </div>

                <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col items-center">
                    <ion-icon name="bulb-outline" class="text-4xl text-[#C447AF] mb-4"></ion-icon>
                    <h3 class="text-lg font-bold text-gray-700">Tips</h3>
                </div>

                <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col items-center">
                    <ion-icon name="help-circle-outline" class="text-4xl text-[#C447AF] mb-4"></ion-icon>
                    <h3 class="text-lg font-bold text-gray-700">Types of Stress</h3>
                </div>

                <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col items-center">
                    <ion-icon name="person-outline" class="text-4xl text-[#C447AF] mb-4"></ion-icon>
                    <h3 class="text-lg font-bold text-gray-700">Profile</h3>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
