<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

  <!-- Styles -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Ionicons Script -->
  <script src="https://unpkg.com/ionicons@5.5.0/dist/ionicons/ionicons.esm.js" type="module"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.0/dist/ionicons/ionicons.js"></script>

  <title>home</title>
</head>

<body class="bg-[#FBF4FA]">
  <nav class="w-full flex flex-col md:flex-row justify-between items-center px-4 border-b-4 border-[#C447AF]">
    <!-- logo -->
    <div class="w-full md:w-auto text-center md:text-left">
      <img class="w-[40%] md:w-[20%] mx-auto md:mx-4" src="{{ asset('storage/images/logo.png') }}" alt="logo">
    </div>

    <ul class="flex flex-col md:flex-row gap-4 md:gap-16 items-center list-none mt-4 md:mt-0">
      <li class="relative group cursor-pointer">
        <a href="{{ url('/home') }}" class="flex flex-col items-center font-md font-bold text-[#C447AF]">
          Home
        </a>
      </li>
      <li class="relative group cursor-pointer">
        <a href="{{ url('/about') }}" class="flex flex-col items-center font-md font-bold text-[#C447AF]">
          About
        </a>
      </li>
      <li class="relative group cursor-pointer">
        <a href="#" class="flex flex-col items-center font-md font-bold text-[#C447AF]">
          Contact Us
        </a>
      </li>
      <li>
        <a href="{{ route('register') }}" class="bg-[#C447AF] text-white font-bold rounded-[20px] p-1 px-4">
          Get Started
        </a>
      </li>
    </ul>
  </nav>

  <div class="p-4 md:p-12">
    <div class="flex flex-col md:flex-row justify-between items-center">
      <div class="w-full md:w-[30%] m-4 text-lg text-center md:text-left">
        <p>Find Your Inner Balance
          In a world that moves too fast, taking a moment for yourself is essential.
          Our platform helps you manage daily stress with breathing exercises, guided meditation sessions,
          and personalized tracking. Discover simple and effective tools to calm your mind, improve your well-being,
          and achieve lasting serenity. Take control of your well-being today!
        </p>
      </div>
      <div class="w-full md:w-auto flex justify-center">
        <img class="w-3/4 md:w-3/4" src="{{ asset('storage/images/photo6.png') }}">
      </div>
    </div>

    <!-- Témoignages -->
    <div class="mt-8 flex flex-col gap-8 items-center md:float-right md:mr-[25%] md:-mt-16">
      <div class="bg-white rounded-xl shadow-sm p-6 max-w-lg">
        <div class="flex items-start space-x-4">
          <img src="{{ asset('storage/images/photo3.png') }}" class="w-12 h-12 rounded-full object-cover" alt="Sophie">
          <div>
            <p class="text-gray-800 mb-2">"Quelle expérience satisfaisante ! Je reviendrai certainement la prochaine fois."</p>
            <p class="text-sm text-gray-600">IKRAM</p>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-xl shadow-sm p-6 max-w-lg md:ml-64">
        <div class="flex items-start space-x-4">
          <img src="{{ asset('storage/images/photo4.png') }}" class="w-12 h-12 rounded-full object-cover" alt="Sophie">
          <div>
            <p class="text-gray-800 mb-2">"Quelle expérience satisfaisante ! Je reviendrai certainement la prochaine fois."</p>
            <p class="text-sm text-gray-600">FIRDAOUS</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>