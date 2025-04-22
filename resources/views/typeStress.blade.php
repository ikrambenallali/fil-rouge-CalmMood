<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Types de Stress</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Ionicons Script -->
    <script src="https://unpkg.com/ionicons@5.5.0/dist/ionicons/ionicons.esm.js" type="module"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.0/dist/ionicons/ionicons.js"></script>

</head>

<body class="bg-[#FBF4FA]">

    <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-lg p-8 my-10 border border-[#E192D4]">
        <h1 class="text-4xl font-bold text-center text-[#C447AF] mb-8">Types de Stress</h1>

        @if (session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-6">
            {{ session('success') }}
        </div>
        @endif

        <div class="mb-6 text-right">
            <button onclick="openModal()" class="bg-[#C447AF] text-white py-2 px-6 rounded-lg text-xl hover:bg-[#DD6ECA] transition">Ajouter un type de stress</button>
        </div>

        <table class="min-w-full bg-white border border-[#E192D4] rounded-lg">
            <thead>
                <tr>
                    <th class="border p-4">Nom</th>
                    <th class="border p-4">Description</th>
                    <th class="border p-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                <tr>
                    <td class="border p-4">{{ $type->name }}</td>
                    <td class="border p-4">{{ $type->content }}</td>
                    <td class="border p-4">
                        <button onclick="openEditModal({{ $type->id }})" class="text-black">
                            <ion-icon name="create-outline"></ion-icon>
                        </button>
                        <form action="{{ route('type_stress.destroy', $type->id) }}" method="POST" class="inline-block ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-black">
                                <ion-icon name="trash-outline"></ion-icon>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Modal Create -->
        <div id="createModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center">
            <div class="bg-white rounded-lg p-8 max-w-lg w-full">
                <h2 class="text-xl font-bold mb-4">Ajouter un type de stress</h2>
                <form action="{{ route('type_stress.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700">Nom</label>
                        <input type="text" name="name" id="name" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#E192D4]">
                    </div>
                    <div class="mb-4">
                        <label for="content" class="block text-gray-700">Description</label>
                        <textarea name="content" id="content" rows="4" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#E192D4]"></textarea>
                    </div>
                    <button type="submit" class="bg-[#C447AF] text-white py-2 px-6 rounded-lg hover:bg-[#DD6ECA] transition">Ajouter</button>
                    <button type="button" onclick="closeModal()" class="bg-gray-500 text-white py-2 px-6 rounded-lg mt-4 hover:bg-gray-600">Annuler</button>
                </form>
            </div>
        </div>

        <!-- Modal Edit -->
        @foreach ($types as $type)
        <div id="editModal-{{ $type->id }}" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center">
            <div class="bg-white rounded-lg p-8 max-w-lg w-full">
                <h2 class="text-xl font-bold mb-4">Modifier un type de stress</h2>
                <form action="{{ route('type_stress.update', $type->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700">Nom</label>
                        <input type="text" name="name" id="name" value="{{ $type->name }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#E192D4]">
                    </div>
                    <div class="mb-4">
                        <label for="content" class="block text-gray-700">Description</label>
                        <textarea name="content" id="content" rows="4" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#E192D4]">{{ $type->content }}</textarea>
                    </div>
                    <button type="submit" class="bg-[#C447AF] text-white py-2 px-6 rounded-lg hover:bg-[#DD6ECA] transition">Modifier</button>
                    <button type="button" onclick="closeEditModal({{ $type->id }})" class="bg-gray-500 text-white py-2 px-6 rounded-lg mt-4 hover:bg-gray-600">Annuler</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

    <script>
        function openModal() {
            document.getElementById('createModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('createModal').classList.add('hidden');
        }

        function openEditModal(id) {
            document.getElementById('editModal-' + id).classList.remove('hidden');
        }

        function closeEditModal(id) {
            document.getElementById('editModal-' + id).classList.add('hidden');
        }
    </script>
</body>

</html>