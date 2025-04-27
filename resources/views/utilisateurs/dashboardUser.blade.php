<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Stress Result</title>
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
          <a href="#" class="flex items-center hover:bg-[#FBF4FA] hover:text-[#C447AF] p-2 rounded-xl">
            <ion-icon name="help-circle-outline" class="text-xl"></ion-icon>
            <span class="ml-3">Types of Stress</span>
          </a>
        </li>
        <li class="mb-4">
          <a href="#" class="flex items-center hover:bg-[#FBF4FA] hover:text-[#C447AF] p-2 rounded-xl">
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
  <!-- logo -->

  <div class="flex-1 p-10 overflow-y-auto">
    <div class="-ml-6">
        <img class="w-[15%] -my-12" src="{{ asset('storage/images/logo.png') }}" alt="logo">
    </div>
    <h2 class="text-3xl font-semibold mb-8 mt-12 text-[#C447AF] ">Hi {{ auth()->user()->name }}</h2>

  <!-- Main Content -->
  <div class="flex-1 p-4  flex justify-center items-center">
    <div class="bg-white rounded-2xl shadow-lg p-8 max-w-xl w-full">
      <h1 class="text-3xl font-bold text-center text-[#C447AF] mb-6">Your Stress Type</h1>

      @if ($type)
    <div class="bg-[#E192D4] text-white rounded-xl p-6 text-center mb-6">
        <h2 class="text-2xl font-semibold mb-2">{{ $type->name }}</h2>
        <p class="text-base">{{ $type->content }}</p>
    </div>
@else
    <div class="bg-red-500 text-white rounded-xl p-6 text-center mb-6">
        <p>Il n'y a pas de type de stress associé à cet utilisateur.</p>
    </div>
@endif



      <div class="mb-6">
        <h3 class="text-xl font-bold text-[#C447AF] mb-4">Our Recommendations:</h3>
        <ul class="space-y-3">
          <li class="flex items-start">
            <span class="inline-block w-2 h-2 bg-[#DD6ECA] rounded-full mt-2 mr-3"></span>
            <p>Practice deep breathing exercises daily.</p>
          </li>
          <li class="flex items-start">
            <span class="inline-block w-2 h-2 bg-[#DD6ECA] rounded-full mt-2 mr-3"></span>
            <p>Write down 3 positive things each evening in a journal.</p>
          </li>
          <li class="flex items-start">
            <span class="inline-block w-2 h-2 bg-[#DD6ECA] rounded-full mt-2 mr-3"></span>
            <p>Take time to meditate or relax without using screens.</p>
          </li>
        </ul>
      </div>

      <div class="flex justify-center">
        <a href="/exercises" class="bg-[#C447AF] hover:bg-[#DD6ECA] text-white font-bold py-3 px-6 rounded-xl transition">
          Start Exercises
        </a>
      </div>
    </div>
  </div>
  </div>
</body>
</html>
