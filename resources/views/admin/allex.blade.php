<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercices de la catégorie</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#FBF4FA] p-6">

    <h2 class="text-2xl font-bold text-[#C447AF] mb-4">Exercices de la catégorie : {{ $category->name }}</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        @forelse ($exercices as $exercice)
        <a href="{{ route('exercices.show', $exercice->id) }}" class="block w-full">

            <div class="bg-white shadow-md rounded-2xl p-4 hover:shadow-lg transition-shadow">
                <h3 class="text-lg font-semibold text-[#C447AF]">{{ $exercice->title }}</h3>
                <p class="text-gray-600">{{ $exercice->description }}</p>
                <p class="text-sm text-gray-400">Durée : {{ $exercice->duration }} s</p>
            </div>
        @empty
            <p class="text-gray-600">Aucun exercice trouvé dans cette catégorie.</p>
        </a>
        @endforelse
    </div>

    <div class="mt-6">
        <a href="{{ url()->previous() }}" class="text-[#C447AF] hover:underline">← Retour</a>
    </div>

</body>
</html>
