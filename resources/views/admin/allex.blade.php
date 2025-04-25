<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercices de la catégorie</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script src="https://unpkg.com/ionicons@5.5.0/dist/ionicons/ionicons.esm.js" type="module"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.0/dist/ionicons/ionicons.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap');

        body {
            font-family: 'Nunito', sans-serif;
        }

        .card {
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 8px;
            height: 100%;
            background: linear-gradient(to bottom, #C447AF, #E192D4);
            border-radius: 5px 0 0 5px;
        }

        .btn-creative {
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .btn-creative::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
            z-index: -1;
        }

        .btn-creative:hover::before {
            left: 100%;
        }
    </style>
</head>

<body class="bg-[#FBF4FA]">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 min-h-screen fixed bg-[#C447AF] text-white p-2 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold mb-10 text-center">CalmMood</h1>
            <nav>
                <ul>
                    <li class="mb-4">
                        <a href="#" class="flex items-center hover:bg-[#FBF4FA] hover:text-[#C447AF] p-2 rounded-xl">
                            <ion-icon name="home-outline" class="text-xl"></ion-icon>
                            <span class="ml-2">Dashboard</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="#" class="flex items-center hover:bg-[#FBF4FA] hover:text-[#C447AF] p-2 rounded-xl">
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
                            <ion-icon name="bulb-outline"></ion-icon>
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
            <!-- Titre avec décoration simple -->
            <div class="flex flex-col items-center mb-8">
                <h2 class="text-4xl font-bold text-[#C447AF] mb-2">{{ $category->name }}</h2>
                <div class="flex space-x-1">
                    <span class="inline-block w-2 h-2 bg-[#E192D4] rounded-full"></span>
                    <span class="inline-block w-2 h-2 bg-[#D76CBF] rounded-full"></span>
                    <span class="inline-block w-2 h-2 bg-[#C447AF] rounded-full"></span>
                    <span class="inline-block w-2 h-2 bg-[#D76CBF] rounded-full"></span>
                    <span class="inline-block w-2 h-2 bg-[#E192D4] rounded-full"></span>
                </div>
            </div>

            <!-- Button "Add Exercise" bien placé sous le titre -->
            <div class="mb-8 text-center">
                <a href="{{ route('exercices.create') }}" class="bg-[#C447AF] text-white px-6 py-3 rounded-xl hover:bg-[#a93792] shadow-xl hover:scale-105 w-auto inline-flex justify-center items-center gap-2">
                    <i class="fas fa-plus"></i>
                    <span>Add exercise</span>
                </a>
            </div>

            <!-- Container principal -->
            <div class="max-w-4xl mx-auto">
                <div class="mt-6">
                    @forelse ($exercices as $exercice)
                    <a href="{{ route('exercices.show', $exercice->id) }}" class="block w-auto">
                        <div class="mb-8 bg-white shadow-md rounded-2xl p-5 hover:shadow-lg transition-all duration-300 card relative transform hover:-translate-y-1">
                            <div class="pl-3">
                                <h3 class="text-xl font-semibold text-[#C447AF] mb-2">{{ $exercice->title }}</h3>
                                <p class="text-gray-600 mb-3">{{ $exercice->description }}</p>

                                @auth
                                @if (auth()->user()->role == 'admin')
                                <div class="flex gap-3 mt-4 pt-3 border-t border-[#F8E6F5]">
                                    <a href="{{ route('exercices.edit', $exercice->id) }}" class="inline-flex items-center px-3 py-1 bg-[#E192D4] text-white rounded-lg btn-creative">
                                        <i class="fas fa-edit mr-1 text-xs"></i>
                                        Edit
                                    </a>
                                    <form action="{{ route('exercices.destroy', $exercice->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center px-3 py-1 bg-[#C447AF] text-white rounded-lg btn-creative">
                                            <i class="fas fa-trash-alt mr-1 text-xs"></i>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                                @endif
                                @endauth
                            </div>
                        </div>
                    </a>
                    @empty
                    <div class="bg-white rounded-2xl shadow-md p-8 text-center">
                        <div class="inline-flex justify-center items-center w-16 h-16 rounded-full bg-[#F8E6F5] mb-4">
                            <i class="fas fa-exclamation text-[#C447AF] text-xl"></i>
                        </div>
                        <p class="text-gray-600 text-lg">No exercises found in this category.</p>
                    </div>
                    @endforelse
                </div>
            </div>

            <!-- Bouton retour créatif -->
            <div class="mt-10 flex justify-center">
                <a href="{{ url()->previous() }}" class="group relative inline-flex items-center px-6 py-3 bg-[#C447AF] text-white font-medium rounded-full overflow-hidden shadow-md hover:shadow-lg transition-all duration-300 btn-creative">
                    <i class="fas fa-arrow-left mr-2 group-hover:animate-pulse"></i>
                    back
                    <span class="absolute -right-2 -top-2 w-4 h-4 rounded-full bg-[#E192D4] opacity-70"></span>
                    <span class="absolute -right-1 -bottom-1 w-3 h-3 rounded-full bg-[#E192D4] opacity-50"></span>
                </a>
            </div>
        </div>
    </div>
</body>

</html>