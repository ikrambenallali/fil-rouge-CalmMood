<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gestion des Catégories</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>
<body class="bg-[#FBF4FA] text-gray-800 min-h-screen">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-[#C447AF] text-white p-4 rounded-lg shadow-lg fixed h-screen">
            <h1 class="text-2xl font-bold mb-10 text-center">CalmMood</h1>
            <nav class="flex flex-col justify-between h-[calc(100%-8rem)]">
            <ul>
                    <li class="mb-4">
                        <a href="{{ route('allUsers') }}" class="flex items-center hover:bg-[#FBF4FA] hover:text-[#C447AF] p-2 rounded-xl">
                            <ion-icon name="home-outline" class="text-xl"></ion-icon>
                            <span class="ml-2">Dashboard</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('allUsers') }}" class="flex items-center hover:bg-[#FBF4FA] hover:text-[#C447AF] p-2 rounded-xl">
                            <ion-icon name="people-outline"></ion-icon>
                            <span class="ml-2">User management</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="#" class="flex items-center hover:bg-[#FBF4FA] hover:text-[#C447AF] p-2 rounded-xl">
                            <ion-icon name="podium-outline"></ion-icon>
                            <span class="ml-2">Statistics</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('categoryEx') }}" class="flex items-center hover:bg-[#FBF4FA] hover:text-[#C447AF] p-2 rounded-xl">
                            <ion-icon name="reader-outline"></ion-icon>
                            <span class="ml-2">Exercises</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('advice') }}" class="flex items-center hover:bg-[#FBF4FA] hover:text-[#C447AF] p-2 rounded-xl">
                            <ion-icon name="bulb-outline"></ion-icon>
                            <span class="ml-2">Anti-Stress Tips</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('categories.index') }}" class="flex items-center hover:bg-[#FBF4FA] hover:text-[#C447AF] p-2 rounded-xl">
                        <ion-icon name="list-outline" class="text-xl"></ion-icon>
                        <span class="ml-2">Categories</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('type_stress.index') }}" class="flex items-center hover:bg-[#FBF4FA] hover:text-[#C447AF] p-2 rounded-xl">
                            <ion-icon name="help-circle-outline"></ion-icon>
                            <span class="ml-2">Types of Stress</span>
                        </a>
                    </li>
                </ul>

                <div class="mt-auto pb-4">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full bg-[#FBF4FA] text-[#C447AF] font-semibold py-2 px-4 rounded-lg flex items-center justify-center transition-all duration-200">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </button>
                    </form>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="ml-64 flex-1 p-6">
            <div class="max-w-5xl mx-auto">
                <div class="flex justify-between items-center mb-8">
                    <h1 class="text-3xl font-bold text-[#C447AF]">Categories</h1>
                </div>

                <!-- Liste des catégories -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($categories as $category)
                    <a href="{{ route('exercices.parCategorie', $category->id) }}" class="block w-full transform transition-all duration-300 hover:scale-105">
                        <div class="bg-white shadow-md rounded-2xl p-6 flex justify-between items-center hover:shadow-xl border-l-4 border-[#C447AF] hover:bg-gradient-to-r hover:from-white hover:to-[#FBF4FA] group">
                            <div>
                                <h3 class="text-xl font-semibold text-[#C447AF]">{{ $category->name }}</h3>
                                <p class="text-gray-500 mt-1 group-hover:text-[#C447AF]">View exercises</p>
                            </div>
                            <div class="text-[#E192D4] group-hover:text-[#C447AF]">
                                <i class="fas fa-chevron-right text-xl"></i>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>

                <!-- Empty state -->
                @if(count($categories) == 0)
                <div class="bg-white rounded-2xl p-12 text-center shadow-md">
                    <div class="text-[#E192D4] text-5xl mb-4">
                        <i class="fas fa-folder-open"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-[#C447AF] mb-2">No Categories Found</h3>
                    <p class="text-gray-500 mb-6">Start by adding a new category for your exercises</p>
                    <a href="#" class="bg-[#C447AF] text-white px-6 py-3 rounded-xl hover:bg-[#a93792] transition-all duration-300 inline-flex items-center gap-2">
                        <i class="fas fa-plus"></i>
                        <span>Add Category</span>
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Scripts pour Font Awesome (si vous n'utilisez pas ion-icons) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
    
    <!-- Alternative: Si vous préférez utiliser ion-icons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>