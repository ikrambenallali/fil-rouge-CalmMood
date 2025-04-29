<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Ionicons -->
  <script src="https://unpkg.com/ionicons@5.5.0/dist/ionicons/ionicons.esm.js" type="module"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.0/dist/ionicons/ionicons.js"></script>

  <title>Contact Page</title>
</head>

<body class="bg-[#FBF4FA]">
  <!-- Navbar -->
  <nav class="w-full flex justify-between items-center px-4 py-2 border-b-4 border-[#C447AF] flex-wrap">
    <!-- Logo -->
    <div class="w-auto">
      <img class="w-20 md:w-24 lg:w-32 mx-4" src="{{ asset('storage/images/logo.png') }}" alt="logo" />
    </div>

    <!-- Navigation links -->
    <ul class="w-full lg:w-auto flex flex-col lg:flex-row gap-4 lg:gap-16 items-center list-none mt-4 lg:mt-0">
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
        <a href="{{ route('register') }}" class="bg-[#C447AF] text-white font-bold rounded-[20px] py-2 px-4">
          Get Started
        </a>
      </li>
    </ul>
  </nav>

  <!-- Contact Section -->
  <div class="container mx-auto px-4 py-12">
    <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
      <div class="p-8 flex flex-col lg:flex-row justify-between items-center gap-8">
        <!-- Contact Form -->
        <div class="w-full lg:w-3/4">
          <h2 class="text-2xl font-bold text-[#C447AF] mb-6">Contact Us</h2>

          <div class="space-y-4 mb-6 text-gray-600">
            <div class="flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
              </svg>
              <span>Chabiba, Nador, Maroc</span>
            </div>
            <div class="flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
              </svg>
              <span>youcode@gmail.com</span>
            </div>
            <div class="flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
              </svg>
              <span>+212 835445621</span>
            </div>
          </div>

          <!-- Form -->
          <form action="{{ route('contact.store') }}" method="POST">
            @csrf
            <div class="flex flex-col gap-4 w-full">
              <input type="text" name="first_name" placeholder="First Name" class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#C447AF]" />
              <input type="text" name="last_name" placeholder="Last Name" class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#C447AF]" />
              <input type="email" name="email" placeholder="E-mail" class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#C447AF]" />
              <textarea placeholder="Message" name="message" rows="4" class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#C447AF]"></textarea>

              <button type="submit" class="bg-[#C447AF] text-white font-bold py-3 rounded-md">
                Send
              </button>
            </div>
          </form>
        </div>

        <!-- Image -->
        <div class="w-full lg:w-1/2">
          <img src="{{ asset('storage/images/photo8.png') }}" alt="Contact Us" class="w-full h-auto object-contain">
        </div>
      </div>
    </div>
  </div>
</body>

</html>
