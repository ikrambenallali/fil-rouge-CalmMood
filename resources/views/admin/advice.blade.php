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
            <div class="max-w-4xl mx-auto">
                <h1 class="text-3xl font-bold text-[#C447AF] mb-6">Anti-Stress Tips</h1>

                <!-- Bouton d'ajout -->
                <button onclick="openCreateModal()"
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
                                <button onclick="openEditModal({{ $advice->id }})" class="text-[#C447AF] hover:text-[#A93B95] text-xl">
                                    <ion-icon name="create-outline"></ion-icon>
                                </button>
                                <form action="{{ route('advice.destroy',$advice->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-600 text-xl">
                                        <ion-icon name="trash-outline"></ion-icon>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Modal de modification -->
                        <div id="editModal-{{ $advice->id }}" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
                            <form action="{{ route('advice.update', $advice->id) }}" method="POST" enctype="multipart/form-data"
                                class="bg-white p-6 rounded-2xl shadow-lg w-full max-w-lg">
                                @csrf
                                @method('PUT')
                                <h2 class="text-2xl font-semibold text-[#C447AF] mb-4">Edit a Tip</h2>
                                <div class="mb-4">
                                    <label class="block mb-1 font-medium">Title</label>
                                    <input type="text" name="title" value="{{ $advice->title }}"
                                        class="w-full border border-gray-300 rounded-xl px-3 py-2" />
                                </div>
                                <div class="mb-4">
                                    <label class="block mb-1 font-medium">Content</label>
                                    <textarea name="content" class="w-full border border-gray-300 rounded-xl px-3 py-2 h-32 resize-none">{{ $advice->content }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="block mb-1 font-medium">Image</label>
                                    <input type="file" name="image" class="w-full border border-gray-300 rounded-xl px-3 py-2" />
                                    @if ($advice->image)
                                        <img src="{{ asset('storage/' . $advice->image) }}" class="mt-2 rounded-lg w-32 h-32 object-cover">
                                    @endif
                                </div>
                                <div class="flex justify-end space-x-2">
                                    <button type="button" onclick="closeEditModal({{ $advice->id }})"
                                        class="px-4 py-2 bg-gray-200 rounded-xl hover:bg-gray-300">Cancel</button>
                                    <button type="submit"
                                        class="px-4 py-2 bg-[#C447AF] text-white rounded-xl hover:bg-[#A93B95]">Update</button>
                                </div>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Modal d'ajout -->
    <div id="createModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
        <form id="createForm" action="{{ route('createAdvice') }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-6 rounded-2xl shadow-lg w-full max-w-lg">
            @csrf
            <h2 class="text-2xl font-semibold text-[#C447AF] mb-4">Add a Tip</h2>
            <div class="mb-4">
                <label class="block mb-1 font-medium">Title</label>
                <input type="text" name="title" placeholder="title" class="w-full border border-gray-300 rounded-xl px-3 py-2" />
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-medium">Content</label>
                <textarea name="content" placeholder="content" class="w-full border border-gray-300 rounded-xl px-3 py-2 h-32 resize-none"></textarea>
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-medium">Image</label>
                <input type="file" name="image" class="w-full border border-gray-300 rounded-xl px-3 py-2" />
            </div>
            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeCreateModal()" class="px-4 py-2 bg-gray-200 rounded-xl hover:bg-gray-300">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-[#C447AF] text-white rounded-xl hover:bg-[#A93B95]">Save</button>
            </div>
        </form>
    </div>

    <script>
        function openCreateModal() {
            document.getElementById('createModal').classList.remove('hidden');
        }

        function closeCreateModal() {
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