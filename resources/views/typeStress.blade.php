@extends('layouts.appAdmin')

@section('content')
<!-- Main content -->
<div class="flex-1 bg-[#FBF4FA]">
    <!-- Header section -->


    <div class="px-4 sm:px-6 md:px-8">
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

        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-8">
            <div>
                <h2 class="text-xl font-medium text-[#C447AF]">All Stress Types</h2>
                <p class="text-gray-600">Manage and organize different stress categories</p>
            </div>
            <button onclick="openModal()" class="bg-[#C447AF] hover:bg-[#DD6ECA] text-white py-2 px-6 rounded-lg text-lg transition-colors flex items-center">
                <ion-icon name="add-outline" class="mr-1"></ion-icon> Add Stress Type
            </button>
        </div>

        <!-- Grid of Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($types as $type)
            <div class="card bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="h-2 bg-[#C447AF]"></div>
                <div class="p-6 relative">
                    <h3 class="text-xl font-semibold text-[#C447AF] mb-3">{{ $type->name }}</h3>
                    <p class="text-gray-600">{{ $type->content }}</p>
                    <div class="mt-6 pt-4 border-t border-gray-100 flex justify-end space-x-2">
                        <button onclick="openEditModal({{ $type->id }})" class="p-2 text-gray-600 hover:text-[#C447AF] hover:bg-[#FBF4FA] rounded-lg transition-colors">
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
                <h2 class="text-2xl font-bold text-[#C447AF]">Add Stress Type</h2>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                    <ion-icon name="close-outline" class="text-2xl"></ion-icon>
                </button>
            </div>
            <form action="{{ route('type_stress.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                    <input type="text" name="name" id="name" required class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-[#DD6ECA] focus:border-[#DD6ECA] outline-none transition-all">
                </div>
                <div class="mb-6">
                    <label for="content" class="block text-gray-700 font-medium mb-2">Description</label>
                    <textarea name="content" id="content" rows="4" required class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-[#DD6ECA] focus:border-[#DD6ECA] outline-none transition-all"></textarea>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="closeModal()" class="px-5 py-2 rounded-lg border border-gray-300 text-gray-700 font-medium hover:bg-gray-50 transition-colors">Cancel</button>
                    <button type="submit" class="w-full sm:w-auto bg-[#C447AF] text-white px-5 py-2 rounded-lg font-medium hover:bg-[#DD6ECA] transition-colors">
                        Add Type</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit -->
    @foreach ($types as $type)
    <div id="editModal-{{ $type->id }}" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
        <div class="bg-white rounded-xl p-8 w-full max-w-lg shadow-lg">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-[#C447AF]">Edit Stress Type</h2>
                <button onclick="closeEditModal({{ $type->id }})" class="text-gray-400 hover:text-gray-600">
                    <ion-icon name="close-outline" class="text-2xl"></ion-icon>
                </button>
            </div>
            <form action="{{ route('type_stress.update', $type->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                    <input type="text" name="name" id="name" value="{{ $type->name }}" required class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-[#DD6ECA] focus:border-[#DD6ECA] outline-none transition-all">
                </div>
                <div class="mb-6">
                    <label for="content" class="block text-gray-700 font-medium mb-2">Description</label>
                    <textarea name="content" id="content" rows="4" required class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-[#DD6ECA] focus:border-[#DD6ECA] outline-none transition-all">{{ $type->content }}</textarea>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="closeEditModal({{ $type->id }})" class="px-5 py-2 rounded-lg border border-gray-300 text-gray-700 font-medium hover:bg-gray-50 transition-colors">Cancel</button>
                    <button type="submit" class="bg-[#C447AF] text-white px-5 py-2 rounded-lg font-medium hover:bg-[#DD6ECA] transition-colors">Update</button>
                </div>
            </form>
        </div>
    </div>
    @endforeach
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
@endsection