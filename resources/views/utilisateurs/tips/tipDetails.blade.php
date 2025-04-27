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
                        <div class="flex items-center space-x-2">
                            <span class="text-sm text-gray-500">Partagez ce conseil:</span>
                            <a href="#" class="p-2 rounded-full bg-[#FBF4FA] text-[#C447AF] hover:bg-[#C447AF] hover:text-white transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                </svg>
                            </a>
                            <a href="#" class="p-2 rounded-full bg-[#FBF4FA] text-[#C447AF] hover:bg-[#C447AF] hover:text-white transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/>
                                </svg>
                            </a>
                        </div>
                        <a href="{{ route('allAdvice') }}" class="px-5 py-2 rounded-full bg-[#C447AF] text-white font-medium hover:bg-[#a53a93] transition-colors">
                            Retour aux conseils
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>