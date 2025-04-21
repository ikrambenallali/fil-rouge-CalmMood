<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gestion des Conseils</title>
    <!-- Ionicons Script -->
    <script src="https://unpkg.com/ionicons@5.5.0/dist/ionicons/ionicons.esm.js" type="module"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.0/dist/ionicons/ionicons.js"></script>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#FBF4FA] text-gray-800 p-6">

    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold text-[#C447AF] mb-6">Anti-Stress Tips</h1>

        <!-- Bouton d'ajout -->
        <button onclick="openModal()"
            class="bg-[#DD6ECA] text-white px-4 py-2 rounded-2xl hover:bg-[#C447AF] transition mb-4">
            + Add Tip
        </button>

      <!-- Tableau des conseils -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($advices as $advice)
        <div class="bg-white rounded-2xl shadow-md p-4 flex flex-col justify-between hover:shadow-lg transition">
            <img src="{{ asset('storage/' . $advice->image) }}" alt="Image" class="h-40 w-full object-cover rounded-xl mb-4">
            <h3 class="text-xl font-semibold text-[#C447AF] mb-2">{{ $advice->title }}</h3>
            <p class="text-gray-700 mb-4">{{ $advice->content }}</p>
            <div class="flex justify-end space-x-3">
                <button onclick="openModal()" class="text-[#C447AF] hover:text-[#A93B95] text-xl">
                    <ion-icon name="create-outline"></ion-icon>
                </button>
                <button class="text-red-500 hover:text-red-600 text-xl">
                    <ion-icon name="trash-outline"></ion-icon>
                </button>
            </div>
        </div>
    @endforeach
</div>

    </div>

    <!-- Modal (caché par défaut) -->
     <form id="adviceForm" action="{{ route('createAdvice') }}" method="POST" enctype="multipart/form-data" >
        @csrf
    <div id="adviceModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-2xl shadow-lg w-full max-w-lg">
            <h2 class="text-2xl font-semibold text-[#C447AF] mb-4">Ajouter / Modifier un conseil</h2>

                <div class="mb-4">
                    <label class="block mb-1 font-medium">Title</label>
                    <input type="text" name="title" placeholder="title"
                        class="w-full border border-gray-300 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#E192D4]" />
                </div>
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Content</label>
                    <textarea name="content" placeholder="content"
                        class="w-full border border-gray-300 rounded-xl px-3 py-2 h-32 resize-none focus:outline-none focus:ring-2 focus:ring-[#E192D4]"></textarea>
                </div>
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Image</label>
                    <input type="file" name="image"
                        class="w-full border border-gray-300 rounded-xl px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#E192D4]" />
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeModal()"
                        class="px-4 py-2 bg-gray-200 rounded-xl hover:bg-gray-300">Cancel</button>
                    <button type="submit"
                        class="px-4 py-2 bg-[#C447AF] text-white rounded-xl hover:bg-[#A93B95]">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('adviceModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('adviceModal').classList.add('hidden');
        }
    </script>
</body>

</html>