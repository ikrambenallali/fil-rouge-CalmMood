<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gestion des Conseils</title>
    <script src="https://unpkg.com/ionicons@5.5.0/dist/ionicons/ionicons.esm.js" type="module"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#FBF4FA] text-gray-800">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 min-h-screen fixed bg-[#C447AF] text-white p-2 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold mb-10 text-center">CalmMood</h1>
            <nav>
                <ul>
                    <li class="mb-4">
                        <a href="{{ route('dashboardUser') }}" class="flex items-center hover:bg-[#FBF4FA] hover:text-[#C447AF] p-2 rounded-xl">
                            <ion-icon name="home-outline" class="text-xl"></ion-icon>
                            <span class="ml-3">Dashboard</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('categoryExUser') }}" class="flex items-center hover:bg-[#FBF4FA] hover:text-[#C447AF] p-2 rounded-xl">
                            <ion-icon name="reader-outline" class="text-xl"></ion-icon>
                            <span class="ml-3">Exercises</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('allAdvice') }}" class="flex items-center hover:bg-[#FBF4FA] hover:text-[#C447AF] p-2 rounded-xl">
                            <ion-icon name="bulb-outline" class="text-xl"></ion-icon>
                            <span class="ml-3">Anti-Stress Tips</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('type') }}" class="flex items-center hover:bg-[#FBF4FA] hover:text-[#C447AF] p-2 rounded-xl">
                            <ion-icon name="help-circle-outline" class="text-xl"></ion-icon>
                            <span class="ml-3">Types of Stress</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="#" class="flex items-center hover:bg-[#FBF4FA] hover:text-[#C447AF] p-2 rounded-xl">
                            <ion-icon name="person-outline" class="text-xl"></ion-icon>
                            <span class="ml-3">Profile</span>
                        </a>
                    </li>
                </ul>

                <div class="absolute bottom-4 left-0 w-full px-2">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full bg-[#FBF4FA] text-[#C447AF] font-semibold py-2 px-4 rounded-lg flex items-center justify-center">
                            <ion-icon name="log-out-outline" class="mr-2"></ion-icon> Logout
                        </button>
                    </form>
                </div>
            </nav>
        </div>

        <!-- Contenu principal -->
        <div class="ml-72 flex-1 p-6">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-3xl font-bold text-[#C447AF] mb-6">Anti-Stress Tips</h1>

               

                <!-- Tableau des conseils -->

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                    @foreach ($advices as $advice)
                    <a href="{{ route('tipDetails', $advice->id) }}" class="block w-auto">

                    <div class="bg-white rounded-2xl shadow-md p-4 flex flex-col justify-between hover:shadow-lg transition">
                        <img src="{{ asset('storage/' . $advice->image) }}" alt="Image" class="h-40 w-full object-cover rounded-xl mb-4">
                        <h3 class="text-xl font-semibold text-[#C447AF] mb-2">{{ $advice->title }}</h3>
                        <p class="text-gray-700 mb-4">{{ $advice->content }}</p>

                    </div>


                    @endforeach
                </div>
            </div>
        </div>
    </div>




</body>

</html>