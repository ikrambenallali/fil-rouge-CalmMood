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
  <div class="flex-1 p-10 overflow-y-auto">
    <!-- Logo -->
    <div class="-ml-6">
      <img class="w-[15%] -my-12" src="{{ asset('storage/images/logo.png') }}" alt="logo">
    </div>
    
    <h2 class="text-3xl font-semibold mb-2 mt-12 text-[#C447AF]">Stress Relief Exercises</h2>
    <p class="text-gray-600 mb-8">Discover exercises designed to help you reduce stress and improve your mental wellbeing.</p>
    
    <!-- Filter and Search Section -->
    <div class="flex flex-col md:flex-row justify-between items-center bg-white rounded-xl p-4 mb-8 shadow-md">
      <div class="flex items-center mb-4 md:mb-0">
        <div class="relative">
          <input type="text" placeholder="Search exercises..." class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#C447AF] w-full md:w-64">
          <ion-icon name="search-outline" class="absolute left-3 top-2.5 text-gray-400 text-lg"></ion-icon>
        </div>
      </div>
      
      <div class="flex flex-wrap gap-2">
        <button class="px-4 py-2 rounded-lg bg-[#C447AF] text-white hover:bg-[#DD6ECA] transition">All</button>
        <button class="px-4 py-2 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 transition">Breathing</button>
        <button class="px-4 py-2 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 transition">Meditation</button>
        <button class="px-4 py-2 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 transition">Physical</button>
      </div>
    </div>

    <!-- Progress Section -->
    <div class="bg-white rounded-xl p-6 mb-8 shadow-md">
      <h3 class="text-xl font-semibold text-[#C447AF] mb-3">Your Progress</h3>
      <div class="w-full bg-gray-200 rounded-full h-4 mb-2">
        <div class="bg-[#E192D4] h-4 rounded-full" style="width: 65%"></div> 
      </div>
      <div class="flex justify-between text-sm text-gray-600">
        <span>12/20 exercises completed</span>
        <span>65% complete</span>
      </div>
    </div>
    
    <!-- Exercises Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      @forelse ($exercices as $exercice)
      <div class="bg-white shadow-md rounded-2xl overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
        <!-- Exercise Category Tag -->
        <div class="bg-[#E192D4] text-white text-xs font-bold uppercase px-3 py-1 inline-block absolute top-4 right-4 rounded-full">
          {{ $exercice->category ?? 'General' }}
        </div>
        
        <!-- Exercise Image or Icon -->
        <div class="h-40 bg-[#FBF4FA] flex items-center justify-center">
          <ion-icon name="{{ $exercice->icon ?? 'heart-outline' }}" class="text-6xl text-[#C447AF]"></ion-icon>
        </div>
        
        <div class="p-6">
          <h3 class="text-xl font-semibold text-[#C447AF] mb-2">{{ $exercice->title }}</h3>
          <p class="text-gray-600 mb-4">{{ $exercice->description }}</p>
          
          <!-- Duration & Difficulty -->
          <div class="flex items-center justify-between mb-4 text-sm">
            <div class="flex items-center text-gray-500">
              <ion-icon name="time-outline" class="mr-1"></ion-icon>
              <span>{{ $exercice->duration ?? '5 mins' }}</span>
            </div>
            <div class="flex items-center text-gray-500">
              <ion-icon name="fitness-outline" class="mr-1"></ion-icon>
              <span>{{ $exercice->difficulty ?? 'Easy' }}</span>
            </div>
          </div>
          
          <!-- Custom Checkbox -->
          <div class="flex items-center justify-between">
            <div class="flex items-center space-x-2">
              <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                <input type="checkbox" name="toggle-{{ $exercice->id }}" id="toggle-{{ $exercice->id }}" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 border-gray-300 appearance-none cursor-pointer peer checked:right-0 checked:border-[#C447AF]" />
                <label for="toggle-{{ $exercice->id }}" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer peer-checked:bg-[#E192D4]"></label>
              </div>
              <label for="toggle-{{ $exercice->id }}" class="text-sm text-gray-600">Completed</label>
            </div>
            
            <a href="{{ route('showExDetails', $exercice->id) }}" class="block w-auto">
            <span>Start</span>
              <ion-icon name="arrow-forward-outline" class="ml-1"></ion-icon>
            </a>
          </div>
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
    
    <!-- Pagination -->
    <div class="mt-8 flex justify-center">
      <nav class="flex items-center space-x-2">
        <a href="#" class="px-4 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100 transition">Previous</a>
        <a href="#" class="px-4 py-2 rounded-lg bg-[#C447AF] text-white">1</a>
        <a href="#" class="px-4 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100 transition">2</a>
        <a href="#" class="px-4 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100 transition">3</a>
        <a href="#" class="px-4 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100 transition">Next</a>
      </nav>
    </div>
  </div>

  <style>
    /* Custom Styles for Checkbox Toggle */
    .toggle-checkbox:checked {
      right: 0;
      border-color: #C447AF;
    }
    .toggle-checkbox:checked + .toggle-label {
      background-color: #E192D4;
    }
  </style>
</body>
</html>