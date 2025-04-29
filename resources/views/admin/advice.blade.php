@extends('layouts.appAdmin')

@section('content')

        <!-- Contenu principal -->
        <div class=" flex-1 p-6">
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
@endsection