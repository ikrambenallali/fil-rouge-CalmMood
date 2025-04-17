<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Ionicons Script -->
    <script src="https://unpkg.com/ionicons@5.5.0/dist/ionicons/ionicons.esm.js" type="module"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.0/dist/ionicons/ionicons.js"></script>

</head>

<body class="bg-[#FBF4FA] font-sans">

    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64   bg-[#C447AF] text-white p-2 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold mb-10 text-center ">CalmMood</h1>
            <nav>
                <ul>
                    <li class="mb-4">

                        <a href="#" class="flex items-center hover:bg-[#FBF4FA] hover:text-[#C447AF] p-2 rounded-xl">
                            <ion-icon name="home-outline" class="text-xl"></ion-icon>
                            <i class="fas fa-users mr-3"></i> Dashboard
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="#" class="flex items-center hover:bg-[#FBF4FA] hover:text-[#C447AF] p-2 rounded-xl">
                            <ion-icon name="people-outline"></ion-icon>
                            <i class="fas fa-users mr-3"></i> user management
                        </a>
                    </li>

                    <li class="mb-4">
                        <a href="#" class="flex items-center hover:bg-[#FBF4FA] hover:text-[#C447AF] p-2 rounded-xl">
                            <ion-icon name="podium-outline"></ion-icon>
                            <i class="fas fa-chart-line mr-3"></i> statistics
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="#" class="flex items-center hover:bg-[#FBF4FA] hover:text-[#C447AF] p-2 rounded-xl">
                            <ion-icon name="reader-outline"></ion-icon>
                            <i class="fas fa-meditation mr-3"></i> Exercises
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center hover:bg-[#FBF4FA] hover:text-[#C447AF] p-2 rounded-xl">

                            <ion-icon name="bulb-outline"></ion-icon>
                            <i class="fas fa-comment-medical mr-3"></i> Anti-Stress Tips
                        </a>
                    </li>
                </ul>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="+mt-10 w-full bg-[#FBF4FA] text-[#C447AF] font-semibold py-2 px-4 rounded-lg">
                        <ion-icon name="log-out-outline" class="mr-2"></ion-icon> Logout
                    </button>
                </form>

            </nav>
        </div>

        <!-- Main Content -->
        <!-- logo -->

        <div class="flex-1 p-10 overflow-y-auto">
            <div class="-ml-6">
                <img class="w-[15%] -my-12" src="{{ asset('storage/images/logo.png') }}" alt="logo">
            </div>
            <h2 class="text-3xl font-semibold mb-8 mt-12 text-[#C447AF] ">Dashboard</h2>

            <!-- Utilisateurs Section -->
            <div class="bg-white shadow-lg rounded-lg p-6 mb-8">
                <h3 class="text-xl font-bold mb-4 text-gray-700">user management</h3>
                <table class="w-full text-sm text-left bg-white ">
                    <thead class="bg-[#E192D4]">
                        <tr>
                            <th class="p-3 text-[#FBF4FA]">Name</th>
                            <th class="p-3 text-[#FBF4FA]">Email</th>
                            <th class="p-3 text-[#FBF4FA]">Progress</th>
                            <th class="p-3 text-[#FBF4FA]">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr class="border-b">
                            <td class="p-3">{{ $user->name }}</td>
                            <td class="p-3">{{ $user->email }}</td>
                            <td class="p-3">
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-[#C447AF] h-2.5 rounded-full" style="width: 75%"></div>
                                </div>
                            </td>
                            <td class="p-3 flex space-x-2">
                                <button class="text-black ">
                                    <ion-icon name="person-remove-outline"></ion-icon>
                                </button>
                                <form method="POST" action="{{ route('activerUser', $user->id) }}" class="inline">
                                    @csrf
                                    <button class="text-black ">
                                        <ion-icon name="person-add-outline"></ion-icon>
                                    </button>
                                </form>

                                <form method="POST" action="{{ route('deleteUser', $user->id) }}" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-black ">
                                        <ion-icon name="trash-outline"></ion-icon>
                                    </button>
                                </form>
                                <!-- edit users  -->
                                <button class="text-black ">
                                    <ion-icon name="create-outline"></ion-icon>
                                </button>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

            <!-- Statistiques Section -->
            <div class="grid grid-cols-3 gap-6">
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h3 class="text-xl font-bold mb-4 text-gray-700">Activités Récentes</h3>
                    <ul>
                        <li class="border-b py-2">Sophie a complété un exercice de méditation</li>
                        <li class="border-b py-2">Lucas a consulté des conseils anti-stress</li>
                        <li class="py-2">Nouvelle inscription ce matin</li>
                    </ul>
                </div>

                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h3 class="text-xl font-bold mb-4 text-gray-700">Progression Globale</h3>
                    <div class="w-full bg-gray-200 rounded-full h-4 mb-4">
                        <div class="bg-[#C447AF] h-4 rounded-full" style="width: 65%"></div>
                    </div>
                    <p class="text-center text-gray-600">65% des utilisateurs progressent</p>
                </div>

                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h3 class="text-xl font-bold mb-4 text-gray-700">Statistiques</h3>
                    <div class="space-y-3">
                        <div>
                            <span class="text-black">• </span>Total Utilisateurs: 50
                        </div>
                        <div>
                            <span class="text-black">• </span>Utilisateurs Actifs: 35
                        </div>
                        <div>
                            <span class="text-black">• </span>Nouveaux cette semaine: 12
                        </div>
                    </div>
                </div>
            </div>

            <!-- Exercices de Relaxation -->
            <div class="bg-white shadow-lg rounded-lg p-6 mt-8">
                <h3 class="text-xl font-bold mb-4 text-gray-700">Exercices de Relaxation</h3>
                <div class="grid grid-cols-3 gap-4">
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <h4 class="font-semibold mb-2">Méditation Guidée</h4>
                        <p class="text-sm text-gray-600">Durée: 15 min</p>
                        <button
                            class="mt-2 bg-[#C447AF] text-white px-3 py-1 rounded ">Modifier</button>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <h4 class="font-semibold mb-2">Respiration Profonde</h4>
                        <p class="text-sm text-gray-600">Durée: 10 min</p>
                        <button
                            class="mt-2 bg-[#C447AF] text-white px-3 py-1 rounded ">Modifier</button>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <h4 class="font-semibold mb-2">Yoga de Relaxation</h4>
                        <p class="text-sm text-gray-600">Durée: 20 min</p>
                        <button
                            class="mt-2  bg-[#C447AF] text-white px-3 py-1 rounded ">Modifier</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>