<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stress Types Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#C447AF',
                        primaryLight: '#DD6ECA',
                        primaryLighter: '#E192D4',
                        background: '#FBF4FA',
                    },
                    boxShadow: {
                        'custom': '0 4px 15px rgba(196, 71, 175, 0.15)',
                    }
                }
            }
        }
    </script>
    <!-- Ionicons -->
    <script src="https://unpkg.com/ionicons@5.5.0/dist/ionicons/ionicons.esm.js" type="module"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.0/dist/ionicons/ionicons.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
        }
        
        .sidebar-link {
            transition: all 0.3s ease;
        }
        
        .sidebar-link:hover ion-icon, 
        .sidebar-link:hover span {
            transform: translateX(5px);
        }
        
        .sidebar-link ion-icon,
        .sidebar-link span {
            transition: transform 0.3s ease;
        }
        
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(196, 71, 175, 0.2);
        }
        
        .btn-ripple {
            position: relative;
            overflow: hidden;
        }
        
        .btn-ripple:after {
            content: "";
            display: block;
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
            background-image: radial-gradient(circle, #fff 10%, transparent 10.01%);
            background-repeat: no-repeat;
            background-position: 50%;
            transform: scale(10, 10);
            opacity: 0;
            transition: transform .5s, opacity 1s;
        }
        
        .btn-ripple:active:after {
            transform: scale(0, 0);
            opacity: .3;
            transition: 0s;
        }
    </style>
</head>

<body class="bg-background min-h-screen">

    <!-- Wrapper Flex -->
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 min-h-screen fixed bg-primary text-white p-5 shadow-custom">
            <div class="flex items-center justify-center mb-10">
                <h1 class="text-2xl font-bold">CalmMood</h1>
            </div>
            
            <nav>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('allUsers') }}" class="sidebar-link flex items-center space-x-3 hover:bg-background hover:text-primary p-3 rounded-xl">
                            <ion-icon name="home-outline" class="text-xl"></ion-icon>
                            <span class="font-medium">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('allUsers') }}" class="sidebar-link flex items-center space-x-3 hover:bg-background hover:text-primary p-3 rounded-xl">
                            <ion-icon name="people-outline" class="text-xl"></ion-icon>
                            <span class="font-medium">User Management</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="sidebar-link flex items-center space-x-3 hover:bg-background hover:text-primary p-3 rounded-xl">
                            <ion-icon name="podium-outline" class="text-xl"></ion-icon>
                            <span class="font-medium">Statistics</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('categoryEx') }}" class="sidebar-link flex items-center space-x-3 hover:bg-background hover:text-primary p-3 rounded-xl">
                            <ion-icon name="reader-outline" class="text-xl"></ion-icon>
                            <span class="font-medium">Exercises</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('advice') }}" class="sidebar-link flex items-center space-x-3 hover:bg-background hover:text-primary p-3 rounded-xl">
                            <ion-icon name="bulb-outline" class="text-xl"></ion-icon>
                            <span class="font-medium">Anti-Stress Tips</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('categories.index') }}" class="sidebar-link flex items-center space-x-3 hover:bg-background hover:text-primary p-3 rounded-xl">
                            <ion-icon name="list-outline" class="text-xl"></ion-icon>
                            <span class="font-medium">Categories</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('type_stress.index') }}" class="sidebar-link flex items-center space-x-3 bg-background text-primary p-3 rounded-xl">
                            <ion-icon name="help-circle-outline" class="text-xl"></ion-icon>
                            <span class="font-medium">Types of Stress</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="absolute bottom-8 left-0 w-full px-5">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full bg-white text-primary font-semibold py-3 px-4 rounded-xl flex items-center justify-center transition-all hover:bg-opacity-90 btn-ripple">
                        <ion-icon name="log-out-outline" class="mr-2"></ion-icon> Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Main content -->
        <div class="flex-1 pl-64 pb-10">
            <!-- Header section -->
            <div class="bg-white py-6 px-8 shadow-sm mb-8">
                <div class="flex justify-between items-center">
                    <h1 class="text-3xl font-bold text-primary">Stress Types</h1>
                    <div class="flex items-center space-x-4">
                       
                    </div>
                </div>
            </div>

            <div class="px-8">
                @if (session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-md mb-6 flex items-start">
                        <ion-icon name="checkmark-circle-outline" class="text-2xl mr-2 text-green-500"></ion-icon>
                        <div>
                            <p class="font-medium">Success!</p>
                            <p>{{ session('success') }}</p>
                        </div>
                        <button class="ml-auto" onclick="this.parentElement.remove()">
                            <ion-icon name="close-outline" class="text-xl"></ion-icon>
                        </button>
                    </div>
                @endif

                <div class="flex justify-between items-center mb-8">
                    <div>
                        <h2 class="text-xl font-medium text-gray-700">All Stress Types</h2>
                        <p class="text-gray-500">Manage and organize different stress categories</p>
                    </div>
                    <button onclick="openModal()" class="bg-primary hover:bg-primaryLight text-white py-2 px-6 rounded-lg text-lg transition-colors flex items-center btn-ripple">
                        <ion-icon name="add-outline" class="mr-1"></ion-icon> Add Stress Type
                    </button>
                </div>

                <!-- Grid of Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($types as $type)
                        <div class="card bg-white rounded-2xl shadow-custom overflow-hidden">
                            <div class="h-2 bg-primary"></div>
                            <div class="p-6 relative">
                                <h3 class="text-xl font-semibold text-primary mb-3">{{ $type->name }}</h3>
                                <p class="text-gray-600">{{ $type->content }}</p>
                                <div class="mt-6 pt-4 border-t border-gray-100 flex justify-end space-x-2">
                                    <button onclick="openEditModal({{ $type->id }})" class="p-2 text-gray-600 hover:text-primary hover:bg-background rounded-lg transition-colors">
                                        <ion-icon name="create-outline" class="text-xl"></ion-icon>
                                    </button>
                                    <form action="{{ route('type_stress.destroy', $type->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this item?')" class="p-2 text-gray-600 hover:text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                                            <ion-icon name="trash-outline" class="text-xl"></ion-icon>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Modal Create -->
            <div id="createModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
                <div class="bg-white rounded-xl p-8 w-full max-w-lg shadow-lg">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-primary">Add Stress Type</h2>
                        <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                            <ion-icon name="close-outline" class="text-2xl"></ion-icon>
                        </button>
                    </div>
                    <form action="{{ route('type_stress.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                            <input type="text" name="name" id="name" required class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-primaryLighter focus:border-primaryLighter outline-none transition-all">
                        </div>
                        <div class="mb-6">
                            <label for="content" class="block text-gray-700 font-medium mb-2">Description</label>
                            <textarea name="content" id="content" rows="4" required class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-primaryLighter focus:border-primaryLighter outline-none transition-all"></textarea>
                        </div>
                        <div class="flex justify-end space-x-4">
                            <button type="button" onclick="closeModal()" class="px-5 py-2 rounded-lg border border-gray-300 text-gray-700 font-medium hover:bg-gray-50 transition-colors">Cancel</button>
                            <button type="submit" class="bg-primary text-white px-5 py-2 rounded-lg font-medium hover:bg-primaryLight transition-colors btn-ripple">Add Type</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Modal Edit -->
            @foreach ($types as $type)
                <div id="editModal-{{ $type->id }}" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
                    <div class="bg-white rounded-xl p-8 w-full max-w-lg shadow-lg">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-2xl font-bold text-primary">Edit Stress Type</h2>
                            <button onclick="closeEditModal({{ $type->id }})" class="text-gray-400 hover:text-gray-600">
                                <ion-icon name="close-outline" class="text-2xl"></ion-icon>
                            </button>
                        </div>
                        <form action="{{ route('type_stress.update', $type->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                                <input type="text" name="name" id="name" value="{{ $type->name }}" required class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-primaryLighter focus:border-primaryLighter outline-none transition-all">
                            </div>
                            <div class="mb-6">
                                <label for="content" class="block text-gray-700 font-medium mb-2">Description</label>
                                <textarea name="content" id="content" rows="4" required class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-primaryLighter focus:border-primaryLighter outline-none transition-all">{{ $type->content }}</textarea>
                            </div>
                            <div class="flex justify-end space-x-4">
                                <button type="button" onclick="closeEditModal({{ $type->id }})" class="px-5 py-2 rounded-lg border border-gray-300 text-gray-700 font-medium hover:bg-gray-50 transition-colors">Cancel</button>
                                <button type="submit" class="bg-primary text-white px-5 py-2 rounded-lg font-medium hover:bg-primaryLight transition-colors btn-ripple">Update</button>
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
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            document.getElementById('createModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        function openEditModal(id) {
            document.getElementById('editModal-' + id).classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeEditModal(id) {
            document.getElementById('editModal-' + id).classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Close modals when clicking outside
        window.onclick = function(event) {
            if (event.target.classList.contains('fixed')) {
                event.target.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }
        }
    </script>
</body>

</html>