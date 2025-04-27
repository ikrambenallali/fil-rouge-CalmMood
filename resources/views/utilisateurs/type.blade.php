<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Types of Stress</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
      transform: translateY(-10px);
      box-shadow: 0 10px 25px rgba(196, 71, 175, 0.15);
    }

    .gradient-overlay {
      background: linear-gradient(rgba(255, 255, 255, 0.7), rgba(251, 244, 250, 0.9));
    }

    .text-shadow {
      text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
    }

    .custom-shadow {
      box-shadow: 0 8px 20px -5px rgba(196, 71, 175, 0.2);
    }
  </style>
</head>

<body class="bg-[#FBF4FA] text-gray-800 font-sans min-h-screen py-12">

  <div class="max-w-6xl mx-auto px-6">

    <h1 class="text-4xl md:text-5xl font-bold text-center mb-4 text-[#C447AF]">Types of Stress</h1>
    <p class="text-center text-gray-600 max-w-2xl mx-auto mb-12 text-lg">Understanding different types of stress can help you develop effective coping strategies</p>

    <!-- Grille des cartes -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">

      <!-- Card 1 -->
       @foreach ($types as $type)
         
       <div class="card relative bg-white rounded-2xl overflow-hidden custom-shadow h-full">
         <div class="absolute inset-0 bg-cover bg-center z-0" style="background-image: url('{{ asset('storage/images/image1.jpg') }}');"></div>
         <div class="absolute inset-0 gradient-overlay z-0"></div>
 
         <div class="relative z-10 p-6 flex flex-col h-full">
           <div class="w-12 h-12 rounded-full bg-[#C447AF]/10 flex items-center justify-center mb-4">
             <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#C447AF]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
             </svg>
           </div>
           <h2 class="text-[#C447AF] font-bold text-2xl mb-3 text-shadow">{{ $type->name }}</h2>
           <p class="text-gray-700 text-lg flex-grow">
             {{$type->content}}
           </p>
 
         </div>
       </div>
       @endforeach
    </div>

    <!-- CTA Section -->

    <div class="mt-16 text-center bg-white rounded-2xl p-8 custom-shadow">
  <h2 class="text-2xl font-bold mb-3 text-[#C447AF]">Do You Know Your Type of Stress?</h2>
  <p class="text-gray-600 text-lg max-w-2xl mx-auto mb-6">
    Take our quick assessment to identify your stress triggers and receive personalized coping strategies.
  </p>

  <a href="{{ route('stress.test') }}" 
     class="inline-block bg-[#C447AF] hover:bg-[#a53a93] text-white text-lg font-semibold px-8 py-3 rounded-full transition-colors shadow-lg">
    Take the Stress Test
  </a>

  <p class="text-gray-500 text-sm mt-4">Free assessment • Takes only 5 minutes</p>

  <p class="text-gray-500 text-sm mt-4">Already took the test? Go to your dashboard:</p>

  <a href="{{ route('dashboardUser') }}" 
     class="inline-block mt-2 bg-[#C447AF] hover:bg-[#a53a93] text-white text-lg font-semibold px-8 py-3 rounded-full transition-colors shadow-lg">
    Go to Dashboard
  </a>
</div>

  </div>

</body>

</html>