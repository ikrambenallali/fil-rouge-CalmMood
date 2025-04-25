<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stress Types</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Ionicons -->
    <script src="https://unpkg.com/ionicons@5.5.0/dist/ionicons/ionicons.esm.js" type="module"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.0/dist/ionicons/ionicons.js"></script>
</head>

<body class="bg-[#FBF4FA] min-h-screen">

    <!-- Wrapper Flex -->
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 min-h-screen fixed bg-[#C447AF] text-white p-4 shadow-lg ">
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

        <!-- Main content -->
        <div class="flex-1 pl-64 py-10 px-4">
            <h1 class="text-4xl font-bold text-center text-[#C447AF] mb-10">Stress Types</h1>

            @if (session('success'))
                <div class="bg-green-500 text-white p-4 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex justify-end mb-6">
                <button onclick="openModal()" class="bg-[#C447AF] text-white py-2 px-6 rounded-lg text-lg hover:bg-[#DD6ECA] transition">
                    Add Stress Type
                </button>
            </div>

            <!-- Grid of Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($types as $type)
                    <div class="bg-white border border-[#E192D4] rounded-2xl shadow p-6 relative">
                        <h3 class="text-2xl font-semibold text-[#C447AF] mb-2">{{ $type->name }}</h3>
                        <p class="text-gray-700 mb-4">{{ $type->content }}</p>
                        <div class="absolute top-4 right-4 flex space-x-2">
                            <button onclick="openEditModal({{ $type->id }})" class="text-[#C447AF] hover:text-[#DD6ECA] text-xl">
                                <ion-icon name="create-outline"></ion-icon>
                            </button>
                            <form action="{{ route('type_stress.destroy', $type->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-[#C447AF] hover:text-[#DD6ECA] text-xl">
                                    <ion-icon name="trash-outline"></ion-icon>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Modal Create -->
            <div id="createModal" class="hidden fixed inset-0 bg-black bg-opacity-40 flex justify-center items-center z-50">
                <div class="bg-white rounded-xl p-8 w-full max-w-lg shadow-lg">
                    <h2 class="text-2xl font-bold text-[#C447AF] mb-6">Add Stress Type</h2>
                    <form action="{{ route('type_stress.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-medium mb-1">Name</label>
                            <input type="text" name="name" id="name" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#E192D4] outline-none">
                        </div>
                        <div class="mb-6">
                            <label for="content" class="block text-gray-700 font-medium mb-1">Description</label>
                            <textarea name="content" id="content" rows="4" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#E192D4] outline-none"></textarea>
                        </div>
                        <div class="flex justify-end space-x-4">
                            <button type="button" onclick="closeModal()" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">Cancel</button>
                            <button type="submit" class="bg-[#C447AF] text-white px-4 py-2 rounded-lg hover:bg-[#DD6ECA]">Add</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Modal Edit -->
            @foreach ($types as $type)
                <div id="editModal-{{ $type->id }}" class="hidden fixed inset-0 bg-black bg-opacity-40 flex justify-center items-center z-50">
                    <div class="bg-white rounded-xl p-8 w-full max-w-lg shadow-lg">
                        <h2 class="text-2xl font-bold text-[#C447AF] mb-6">Edit Stress Type</h2>
                        <form action="{{ route('type_stress.update', $type->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 font-medium mb-1">Name</label>
                                <input type="text" name="name" id="name" value="{{ $type->name }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#E192D4] outline-none">
                            </div>
                            <div class="mb-6">
                                <label for="content" class="block text-gray-700 font-medium mb-1">Description</label>
                                <textarea name="content" id="content" rows="4" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-[#E192D4] outline-none">{{ $type->content }}</textarea>
                            </div>
                            <div class="flex justify-end space-x-4">
                                <button type="button" onclick="closeEditModal({{ $type->id }})" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">Cancel</button>
                                <button type="submit" class="bg-[#C447AF] text-white px-4 py-2 rounded-lg hover:bg-[#DD6ECA]">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
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
