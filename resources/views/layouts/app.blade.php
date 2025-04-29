<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'CalmMood')</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</head>
<body class="bg-[#FBF4FA] min-h-screen flex flex-col md:flex-row">

  <!-- Mobile Menu Button (visible only on small screens) -->
  <div class="md:hidden bg-[#C447AF] p-4 flex items-center justify-between">
    <h1 class="text-xl font-bold text-white">CalmMood</h1>
    <button id="menuToggle" class="text-white text-2xl">
      <ion-icon name="menu-outline"></ion-icon>
    </button>
  </div>

  <!-- Sidebar (hidden on mobile by default, toggleable) -->
  <div id="sidebar" class="w-full md:w-64 bg-[#C447AF] text-white p-6 flex-col hidden md:flex">
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
          <a href="{{ route('categoryExUser') }}" class="flex items-center hover:bg-[#FBF4FA] hover:text-[#C447AF] p-2 rounded-xl">
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
  <div class="flex-1 p-4 md:p-10 overflow-y-auto">
    <div class="hidden md:block -ml-6">
      <img class="w-28 md:w-32 lg:w-40 -my-6 md:-my-12" src="{{ asset('storage/images/logo.png') }}" alt="logo">
    </div>
    <h2 class="text-2xl md:text-3xl font-semibold mb-4 md:mb-8 mt-4 md:mt-12 text-[#C447AF]">Hi {{ auth()->user()->name }}</h2>

    @yield('content')

  </div>

  <!-- JavaScript for mobile menu toggle -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const menuToggle = document.getElementById('menuToggle');
      const sidebar = document.getElementById('sidebar');
      
      menuToggle.addEventListener('click', function() {
        sidebar.classList.toggle('hidden');
        
        // Change the icon based on sidebar visibility
        const icon = menuToggle.querySelector('ion-icon');
        if (sidebar.classList.contains('hidden')) {
          icon.setAttribute('name', 'menu-outline');
        } else {
          icon.setAttribute('name', 'close-outline');
        }
      });
      
      // Close sidebar when window is resized to medium screen and above
      window.addEventListener('resize', function() {
        if (window.innerWidth >= 768) { // md breakpoint
          sidebar.classList.remove('hidden');
        } else {
          sidebar.classList.add('hidden');
        }
      });
    });
  </script>
</body>
</html>