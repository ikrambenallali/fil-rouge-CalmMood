<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Détail du Conseil</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #FBF4FA 0%, #F5E6F3 100%);
        }
        .custom-shadow {
            box-shadow: 0 10px 25px -5px rgba(196, 71, 175, 0.1);
        }
    </style>
</head>

<body class="gradient-bg text-gray-800 min-h-screen py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">
        <!-- Card principale -->
        <div class="bg-white rounded-3xl overflow-hidden custom-shadow">
            <!-- Image avec overlay subtil -->
            <div class="relative">
                <img src="{{ asset('storage/' . $advice->image) }}" alt="Image du conseil" class="w-full h-80 sm:h-96 object-cover">
                <div class="absolute "></div>
            </div>

            <!-- Contenu -->
            <div class="p-6 sm:p-8">
                <!-- En-tête avec date -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
                    <h1 class="text-2xl sm:text-3xl font-bold text-[#C447AF] mb-2 sm:mb-0">{{ $advice->title }}</h1>
                    <span class="text-sm font-medium px-4 py-2 rounded-full bg-[#FBF4FA] text-[#C447AF]">
                        {{ $advice->created_at->format('d M Y') }}
                    </span>
                </div>

                <!-- Ligne de séparation subtile -->
                <div class="w-full h-0.5 bg-gradient-to-r from-[#C447AF]/20 to-transparent mb-6"></div>

                <!-- Contenu principal -->
                <div class="text-lg leading-relaxed space-y-6">
                    <p class="text-gray-700">{{ $advice->content }}</p>
                </div>

                <!-- Call to action ou éléments additionnels -->
                <div class="mt-10 pt-6 border-t border-gray-100">
                    <div class="flex justify-between items-center">
                       
                        <a href="{{ route('allAdvice') }}" class="px-5 py-2 rounded-full bg-[#C447AF] text-white font-medium hover:bg-[#a53a93] transition-colors">
                            back to tips
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>