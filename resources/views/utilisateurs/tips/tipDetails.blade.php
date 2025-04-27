<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Détail du Conseil</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#FBF4FA] text-gray-800">

    <div class="max-w-4xl mx-auto p-6">
        <div class="bg-white shadow-lg rounded-2xl overflow-hidden">
            <!-- Image de l'advice -->
            <img src="{{ asset('storage/' . $advice->image) }}" alt="Conseil image" class="w-full h-64 object-cover">

            <!-- Contenu -->
            <div class="p-6">
                <!-- Titre -->
                <h3 class="text-xl font-semibold text-[#C447AF] mb-2">{{ $advice->title }}</h3>


                <!-- Date ou autre info -->
                <p class="text-sm text-gray-500 mb-6">
                    {{ $advice->created_at->format('d M Y') }}
                </p>

                <!-- Contenu principal -->
                <div class="text-lg leading-relaxed space-y-4">
                    <p class="text-gray-700 mb-4">{{ $advice->content }}</p>


                </div>
            </div>
        </div>
    </div>

</body>

</html>