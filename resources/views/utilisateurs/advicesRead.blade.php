<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CalmMood Exercises</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</head>

<body class="bg-[#FBF4FA] min-h-screen flex">

    <!-- Sidebar -->
    <div class="w-64 bg-[#C447AF] text-white p-6 flex flex-col">
        <h1 class="text-2xl font-bold mb-10 text-center">CalmMood</h1>
        <nav class="flex-1">
            <ul>
                <li class="mb-4">
                    <a href="{{ route('dashboardUser') }}" class="flex items-center hover:bg-[#FBF4FA] hover:text-[#C447AF] p-2 rounded-xl">
                        <ion-icon name="home-outline" class="text-xl"></ion-icon>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('categoryExUser') }}" class="flex items-center bg-[#FBF4FA] text-[#C447AF] p-2 rounded-xl">
                        <ion-icon name="reader-outline" class="text-xl"></ion-icon>
                        <span class="ml-3">Exercises</span>
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('allAdvice') }}" class="flex items-center hover:bg-[#FBF4FA] hover:text-[#C447AF] p-2 rounded-xl">
                        <ion-icon name="bulb-outline" class="text-xl"></ion-icon>
                        <span class="ml-3">Anti-Stress Tips</span>
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('type') }}" class="flex items-center hover:bg-[#FBF4FA] hover:text-[#C447AF] p-2 rounded-xl">
                        <ion-icon name="help-circle-outline" class="text-xl"></ion-icon>
                        <span class="ml-3">Types of Stress</span>
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('profile') }}" class="flex items-center hover:bg-[#FBF4FA] hover:text-[#C447AF] p-2 rounded-xl">
                        <ion-icon name="person-outline" class="text-xl"></ion-icon>
                        <span class="ml-3">Profile</span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Logout Button -->
        <div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full bg-[#FBF4FA] text-[#C447AF] font-semibold py-2 px-4 rounded-lg flex items-center justify-center transition-all duration-200">
                    <ion-icon name="log-out-outline" class="mr-2 text-xl"></ion-icon> Logout
                </button>
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-10 ">
        <!-- Logo -->
        <div class="-ml-6">
            <img class="w-[15%] -my-12" src="{{ asset('storage/images/logo.png') }}" alt="logo">
        </div>





        <!-- Exercises Grid -->
        <div class="mt-16 flex flex-col gap-4">
            @forelse ($advices as $advice)

            <div class="bg-white shadow-md rounded-2xl overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                <!-- Exercise Image or Icon -->
                <div class="p-6 ">
                    <h3 class="text-xl font-semibold text-[#C447AF]">{{ $advice->advice->title }}</h3>

                    <p class="text-gray-600">{{ $advice->advice->content }}</p>
                    <!-- Custom Checkbox -->
                   
                </div>
            </div>
            @empty
            <div class="col-span-full bg-white p-8 rounded-2xl shadow text-center">
                <ion-icon name="sad-outline" class="text-6xl text-[#C447AF] mb-4"></ion-icon>
                <h3 class="text-xl font-semibold text-[#C447AF] mb-2">No exercises found</h3>
                <p class="text-gray-600">We couldn't find any exercises matching your criteria.</p>
            </div>
            @endforelse
        </div>
                        <a href="{{ route('allAdvice') }}" class="bg-[#C447AF] text-white  rounded  block w-[10%] text-center py-2 mt-4 hover:bg-[#E192D4] transition duration-300">
                            <ion-icon name="arrow-forward-outline" class=""></ion-icon>
                           Show All Tips
                        </a>

    </div>

    <style>
        /* Custom Styles for Checkbox Toggle */
        .toggle-checkbox:checked {
            right: 0;
            border-color: #C447AF;
        }

        .toggle-checkbox:checked+.toggle-label {
            background-color: #E192D4;
        }
    </style>
</body>

</html>