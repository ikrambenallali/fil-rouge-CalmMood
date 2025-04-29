@extends('layouts.appAdmin')

@section('content')
        <!-- Main Content -->
        <!-- logo -->

        <div class="flex-1 p-10 overflow-y-auto">
            <div class="-ml-6">
                <img class="w-[15%] -my-12" src="{{ asset('storage/images/logo.png') }}" alt="logo">
            </div>
            <h2 class="text-3xl font-semibold mb-8 mt-12 text-[#C447AF] ">Dashboard</h2>

            <!-- Utilisateurs Section -->


            <div class="bg-white shadow-lg rounded-lg p-6 mb-8">
                <div class="flex justify-between">
                    <h3 class="text-xl font-bold mb-4 text-gray-700">user management</h3>
                    <form action="{{ route('allUsers') }}" method="GET" class="flex justify-between mb-4 gap-2">
                        <div class="relative w-full">
                            <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}"
                                class="w-full p-2 border rounded-lg" />
                            <ion-icon name="search-outline" class="absolute right-3 top-2 text-gray-500"></ion-icon>
                        </div>
                        <button type="submit" class="bg-[#C447AF] text-white px-4 py-2 rounded-lg">Search</button>
                    </form>


                </div>
                <table class="w-full text-sm text-left bg-white ">
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
                                    <button class="text-black ">
                                        <ion-icon name="person-remove-outline"></ion-icon>
                                    </button>
                                </form>

                                <form method="POST" action="{{ route('activerUser', $user->id) }}" class="inline">
                                    @csrf
                                    <button class="text-black ">
                                        <ion-icon name="person-add-outline"></ion-icon>
                                    </button>
                                </form>

                                <form method="POST" action="{{ route('deleteUser', $user->id) }}" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-black ">
                                        <ion-icon name="trash-outline"></ion-icon>
                                    </button>
                                </form>
                                <!-- edit users  -->
                                <!-- <button class="text-black ">
                                    <ion-icon name="create-outline"></ion-icon>
                                </button> -->

                            </td>
                        </tr>

                        @endforeach
                    </tbody>

                </table>
                <!-- Liens de pagination -->
                <div class="flex justify-end mt-4">
                    {{ $users->links() }}
                </div>
            </div>
         
           
        </div>
    </div>
@endsection