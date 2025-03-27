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
  <nav class="w-full flex justify-between items-center px-4 p-0 border-b-4 border-[#C447AF] ">
    <!-- logo -->
    <div class="w-auto">
      <img class="w-[20%] mx-4" src="{{ asset('storage/images/logo.png') }}" alt="logo">
    </div>

    <ul class="flex gap-16  list-none">
      <li class="relative group cursor-pointer">
        <a href="#" class="flex flex-col items-center font-md font-bold text-[#C447AF]">
          Home
        </a>
      </li>

      <li class="relative group cursor-pointer">
        <a href="#" class="flex flex-col items-center font-md font-bold text-[#C447AF]">
          About
        </a>
      </li>
      <li class="relative group cursor-pointer">
        <a href="#" class="flex flex-col items-center font-md font-bold text-[#C447AF]">
          Contact Us
        </a>
      </li>
      <li>
        <a href="{{ route('register') }}" class="bg-[#C447AF] text-white font-bold  rounded-[20px] p-1 px-4">
          Get Started
         </a>
      </li>

    </ul>

  </nav>
  

<!-- Hero Section -->
<section class="container mx-auto flex flex-col md:flex-row items-center  py-20 px-6">
    <div class="md:w-1/2 text-center md:text-left -mt-24">
        <h2 class="text-4xl font-extrabold text-[#C447AF] ">About </h2>
        <p class="mt-4 text-black leading-relaxed">
        At CalmMood, we believe that managing stress is the key to a balanced and fulfilling life. In today’s fast-paced world, stress can feel overwhelming, affecting both mental and physical well-being. That’s why we created CalmMood—an intuitive platform designed to help you regain control and find serenity in your daily life.

Our mission is simple: to provide effective, science-backed tools that empower you to manage stress effortlessly. 
        </p>
        <details class="mt-4 text-black leading-relaxed">
    <summary class="cursor-pointer text-[#C447AF] font-bold" id="more">Read more...</summary>
    <p class="mt-2 hidden" id="extra-text">
        Whether it's through interactive stress tracking, guided relaxation exercises, or soothing sound therapy, CalmMood adapts to your lifestyle, helping you build a sustainable wellness routine.

        Driven by values of compassion, simplicity, and scientific effectiveness, our platform is designed to make stress relief accessible to everyone. With expert-backed techniques, user-friendly features, and a supportive community, CalmMood is here to guide you toward a more peaceful mind.

        Join us on this journey! Download our app, subscribe to our newsletter, and follow us on social media to start your path to a calmer, healthier life today.
    </p>
</details>
        
    </div>
    <div class="md:w-1/2 mt-10 md:mt-0 flex justify-center">
        <img src="{{ asset('storage/images/photo7.png') }}" alt="Team Illustration" class="w-full max-w-md">
    </div>
</section>
<script>
    document.getElementById('more').addEventListener('click', function() {
        document.getElementById('extra-text').classList.remove('hidden'); // Affiche le texte
        this.classList.add('hidden'); // Cache "Read more..."
    });
</script>
</body>

</html>