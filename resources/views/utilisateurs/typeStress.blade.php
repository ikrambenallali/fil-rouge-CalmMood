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
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body class="bg-[#FBF4FA] text-[#C447AF] font-sans">

  <div class="max-w-5xl mx-auto py-12 px-6">
    <h1 class="text-4xl font-bold text-center mb-10 text-[#]">Types of Stress</h1>

    
    <!-- Grille des cartes -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
    <!-- Card 1 -->
    <div class="relative p-6 rounded-2xl shadow-md hover:shadow-xl transform hover:scale-105 overflow-hidden">
      <div class="absolute inset-0 bg-cover bg-center opacity-50 z-0" style="background-image: url('{{ asset('storage/images/image1.jpg') }}');"></div>
      <div class="relative z-10">
        <h2 class="text-[#C447AF] font-bold text-2xl font-semibold mb-2 text-shadow-lg">Acute Stress</h2>
        <p class="text-black text-lg">
          Acute stress is the most common and immediate form of stress. It happens in response to sudden challenges or pressures—like a tight deadline, a surprise event, or a moment of danger.
        </p>
      </div>
    </div>
  
    <!-- Card 2 -->
    <div class="relative p-6 rounded-2xl shadow-md hover:shadow-xl transform hover:scale-105 overflow-hidden">
      <div class="absolute inset-0 bg-cover bg-center opacity-50 z-0" style="background-image: url('{{ asset('storage/images/image1.jpg') }}');"></div>
      <div class="relative z-10">
        <h2 class="text-[#C447AF] font-bold text-2xl font-semibold mb-2 text-shadow-lg">Chronic Stress</h2>
        <p class="text-black text-lg">
          Chronic stress develops when you're exposed to stressors over a long period of time. Unlike acute stress, it doesn’t go away easily and can wear you down both mentally and physically.
        </p>
      </div>
    </div>
  
    <!-- Card 3 -->
    <div class="relative p-6 rounded-2xl shadow-md hover:shadow-xl transform hover:scale-105 overflow-hidden">
      <div class="absolute inset-0 bg-cover bg-center opacity-50 z-0" style="background-image: url('{{ asset('storage/images/image1.jpg') }}');"></div>
      <div class="relative z-10">
        <h2 class="text-[#C447AF] font-bold text-2xl font-semibold mb-2 text-shadow-lg">Emotional Stress</h2>
        <p class="text-black text-lg">
          Emotional stress arises from personal relationships, loss, loneliness, or emotional trauma. It can affect your ability to think clearly, make decisions, or maintain focus.
        </p>
      </div>
    </div>
  
    <!-- Card 4 -->
    <div class="relative p-6 rounded-2xl shadow-md hover:shadow-xl transform hover:scale-105 overflow-hidden">
      <div class="absolute inset-0 bg-cover bg-center opacity-50 z-0" style="background-image: url('{{ asset('storage/images/image1.jpg') }}');"></div>
      <div class="relative z-10">
        <h2 class="text-[#C447AF] font-bold text-2xl font-semibold mb-2 text-shadow-lg">Physical Stress</h2>
        <p class="text-black text-lg">
          Physical stress comes from things that put strain on your body—such as lack of sleep, poor nutrition, illness, or overworking. It can lead to fatigue, headaches, or muscle tension.
        </p>
      </div>
    </div>
  </div>
  
  <!-- CTA en dehors de la grille -->
  <div class="mt-12 text-center">
    <p class="text-xl font-medium mb-6">Do you know your type of stress?</p>
    <a href="/stress-test" class="inline-block bg-[#C447AF] text-white text-lg font-semibold px-6 py-3 rounded-full">
      Take the Stress Test
    </a>
  </div>
  
  

</body>
</html>
