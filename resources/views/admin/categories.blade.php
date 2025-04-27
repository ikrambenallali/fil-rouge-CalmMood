<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gestion des Catégories</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/ionicons@5.5.0/dist/ionicons/ionicons.esm.js" type="module"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.0/dist/ionicons/ionicons.js"></script>
</head>
<body class="bg-[#FBF4FA] text-gray-800">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 min-h-screen fixed bg-[#C447AF] text-white p-2 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold mb-10 text-center">CalmMood</h1>
            <nav>
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
                <h1 class="text-3xl font-bold text-[#C447AF] mb-6">Categories</h1>

                <!-- Bouton pour ouvrir le formulaire -->
                <button onclick="openModal()"
                    class="bg-[#DD6ECA] text-white px-4 py-2 rounded-2xl hover:bg-[#C447AF] transition mb-4">
                    + Add Category
                </button>

                <!-- Liste des catégories -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach ($categories as $category)
                        <div class="bg-white shadow-md rounded-2xl p-4 flex justify-between items-center">
                            <div>
                                <h3 class="text-xl font-semibold text-[#C447AF]">{{ $category->name }}</h3>
                            </div>
                            <div class="flex gap-2">
                                <!-- Bouton Modifier -->
                                <button onclick="openEditModal({{ $category->id }})"
                                    class="text-[#C447AF] hover:text-[#A93B95]">
                                    ✏️
                                </button>

                                <!-- Bouton Supprimer -->
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-600">
                                        🗑️
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Modal Modifier -->
                        <div id="editModal-{{ $category->id }}" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
                            <div class="bg-white p-6 rounded-2xl w-full max-w-md shadow-lg">
                                <h2 class="text-2xl font-semibold text-[#C447AF] mb-4">Edit Category</h2>
                                <form action="{{ route('categories.update', $category->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-4">
                                        <label class="block mb-1 font-medium">Name</label>
                                        <input type="text" name="name" required
                                            value="{{ $category->name }}"
                                            class="w-full border border-gray-300 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#E192D4]" />
                                    </div>
                                    <div class="flex justify-end gap-2">
                                        <button type="button" onclick="closeEditModal({{ $category->id }})"
                                            class="bg-gray-200 px-4 py-2 rounded-xl hover:bg-gray-300">Cancel</button>
                                        <button type="submit"
                                            class="bg-[#C447AF] text-white px-4 py-2 rounded-xl hover:bg-[#A93B95]">Edit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>

    <!-- Modal Ajouter -->
    <div id="addModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white p-6 rounded-2xl w-full max-w-md shadow-lg">
            <h2 class="text-2xl font-semibold text-[#C447AF] mb-4">Add Category</h2>
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Name</label>
                    <input type="text" name="name" required
                        class="w-full border border-gray-300 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#E192D4]" />
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" onclick="closeModal()"
                        class="bg-gray-200 px-4 py-2 rounded-xl hover:bg-gray-300">Cancel</button>
                    <button type="submit"
                        class="bg-[#C447AF] text-white px-4 py-2 rounded-xl hover:bg-[#A93B95]">Add</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        function openModal() {
            document.getElementById('addModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('addModal').classList.add('hidden');
        }

        function openEditModal(id) {
            const modal = document.getElementById('editModal-' + id);
            if (modal) modal.classList.remove('hidden');
        }

        function closeEditModal(id) {
            const modal = document.getElementById('editModal-' + id);
            if (modal) modal.classList.add('hidden');
        }
    </script>
</body>
</html>