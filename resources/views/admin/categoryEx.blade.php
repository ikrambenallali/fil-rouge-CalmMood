<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gestion des Catégories</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#FBF4FA] text-gray-800 p-6">

    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold text-[#C447AF] mb-6">Categories</h1>


        <!-- Liste des catégories -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            @foreach ($categories as $category)
            <a href="{{ route('exercices.parCategorie', $category->id) }}" class="block w-full">
                <div class="bg-white shadow-md rounded-2xl p-4 flex justify-between items-center hover:shadow-lg transition-shadow duration-300 hover:bg-[#C447AF] group">
                    <div>
                        <h3 class="text-xl font-semibold text-[#C447AF] group-hover:text-white">{{ $category->name }}</h3>
                    </div>
                </div>
            </a>


            @endforeach
        </div>
    </div>



    <!-- Scripts -->
    <script>

    </script>
</body>

</html>