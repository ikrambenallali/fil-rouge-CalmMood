<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultat du test de stress</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-[#FBF4FA] flex flex-col items-center justify-center text-center p-6">

    <div class="bg-white shadow-xl rounded-2xl p-8 max-w-xl w-full">
        <h2 class="text-3xl font-bold text-[#C447AF] mb-4">{{ $user->auth()->stress_result }}</h2>
        
        <p class="text-xl text-gray-700 mb-2">Type de stress principal détecté :</p>
        <h3 class="text-2xl font-semibold text-[#DD6ECA] mb-6">{{ $type_stress->name }}</h3>
        
        <p class="mb-4 text-gray-600">👉 Exercice recommandé : <span class="font-semibold">{{ $exercice->title }}</span></p>
        
        <div id="breath-circle" class="w-48 h-48 rounded-full border-4 border-[#E192D4] flex items-center justify-center text-xl font-bold text-[#C447AF] mx-auto mb-6">
            Inspire
        </div>
        
        <p class="text-sm text-gray-500">Suivez le rythme pendant 2 minutes pour apaiser votre esprit ✨</p>
        
        <a href="/stress-test" class="mt-6 inline-block bg-[#C447AF] text-white px-6 py-2 rounded-xl hover:bg-[#a93792] transition">Recommencer le test</a>
    </div>
</body>
</html>