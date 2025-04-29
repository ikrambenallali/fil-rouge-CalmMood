@extends('layouts.appAdmin')

@section('content')
<div class="flex-1 px-4 sm:px-6 md:px-10 py-6 overflow-y-auto">
    <!-- Logo -->
    <div class="-ml-4 sm:-ml-6 md:-ml-10">
        <img class="w-28 sm:w-32 md:w-40 -my-8" src="{{ asset('storage/images/logo.png') }}" alt="logo">
    </div>

    <h2 class="text-2xl sm:text-3xl font-semibold mb-6 mt-10 text-[#C447AF]">Dashboard</h2>

    <!-- Utilisateurs Section -->
    <div class="bg-white shadow-lg rounded-lg p-4 sm:p-6 mb-8">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4 gap-4">
            <h3 class="text-lg sm:text-xl font-bold text-gray-700">User Management</h3>
            <form action="{{ route('allUsers') }}" method="GET" class="flex flex-col sm:flex-row gap-2 w-full sm:w-auto">
                <div class="relative w-full sm:w-64">
                    <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}"
                        class="w-full p-2 border rounded-lg pr-10" />
                    <ion-icon name="search-outline" class="absolute right-3 top-2.5 text-gray-500"></ion-icon>
                </div>
                <button type="submit" class="bg-[#C447AF] text-white px-4 py-2 rounded-lg">Search</button>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left bg-white min-w-[600px]">
                <thead class="bg-[#E192D4]">
                    <tr>
                        <th class="p-3 text-[#FBF4FA]">Name</th>
                        <th class="p-3 text-[#FBF4FA]">Email</th>
                        <th class="p-3 text-[#FBF4FA]">Status</th>
                        <th class="p-3 text-[#FBF4FA]">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr class="border-b">
                        <td class="p-3">{{ $user->name }}</td>
                        <td class="p-3">{{ $user->email }}</td>
                        <td class="p-3">{{ $user->status }}</td>
                        <td class="p-3 flex space-x-2">
                            <form method="POST" action="{{ route('desactiverUser', $user->id) }}" class="inline">
                                @csrf
                                <button class="text-black">
                                    <ion-icon name="person-remove-outline"></ion-icon>
                                </button>
                            </form>

                            <form method="POST" action="{{ route('activerUser', $user->id) }}" class="inline">
                                @csrf
                                <button class="text-black">
                                    <ion-icon name="person-add-outline"></ion-icon>
                                </button>
                            </form>

                            <form method="POST" action="{{ route('deleteUser', $user->id) }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="text-black">
                                    <ion-icon name="trash-outline"></ion-icon>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Liens de pagination -->
        <div class="flex justify-end mt-4">
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection
