<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gestion des Catégories</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#FBF4FA] text-gray-800 p-6">

    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold text-[#C447AF] mb-6">Catégories</h1>

        <!-- Bouton pour ouvrir le formulaire -->
        <button onclick="openModal()"
            class="bg-[#DD6ECA] text-white px-4 py-2 rounded-2xl hover:bg-[#C447AF] transition mb-4">
            + Ajouter une Catégorie
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
                <div id="editModal-{{ $category->id }}" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
                    <div class="bg-white p-6 rounded-2xl w-full max-w-md shadow-lg">
                        <h2 class="text-2xl font-semibold text-[#C447AF] mb-4">Modifier la Catégorie</h2>
                        <form action="{{ route('categories.update', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label class="block mb-1 font-medium">Nom</label>
                                <input type="text" name="name" required
                                    value="{{ $category->name }}"
                                    class="w-full border border-gray-300 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#E192D4]" />
                            </div>
                            <div class="flex justify-end gap-2">
                                <button type="button" onclick="closeEditModal({{ $category->id }})"
                                    class="bg-gray-200 px-4 py-2 rounded-xl hover:bg-gray-300">Annuler</button>
                                <button type="submit"
                                    class="bg-[#C447AF] text-white px-4 py-2 rounded-xl hover:bg-[#A93B95]">Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Modal Ajouter -->
    <div id="addModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-2xl w-full max-w-md shadow-lg">
            <h2 class="text-2xl font-semibold text-[#C447AF] mb-4">Ajouter une Catégorie</h2>
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Nom</label>
                    <input type="text" name="name" required
                        class="w-full border border-gray-300 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#E192D4]" />
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" onclick="closeModal()"
                        class="bg-gray-200 px-4 py-2 rounded-xl hover:bg-gray-300">Annuler</button>
                    <button type="submit"
                        class="bg-[#C447AF] text-white px-4 py-2 rounded-xl hover:bg-[#A93B95]">Ajouter</button>
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
