<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un exercice</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <h1 class="text-3xl font-bold text-center text-gray-800 mt-8">Formulaire d'ajout d'exercice</h1>

    <form action="{{ route('exercices.store') }}" method="POST" class="bg-white p-6 rounded-2xl shadow-md max-w-3xl mx-auto mt-10 space-y-4" enctype="multipart/form-data">
        @csrf

        <h2 class="text-2xl font-bold text-center text-[#C447AF]">Ajouter un exercice</h2>
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
            <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#C447AF] focus:border-[#C447AF]" required>
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#C447AF] focus:border-[#C447AF]" required></textarea>
        </div>

        <div>
            <label for="category_id" class="block text-sm font-medium text-gray-700">Catégorie</label>
            <select name="category_id" id="category_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#C447AF] focus:border-[#C447AF]" required>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

       
        <div>
            <label for="video_url" class="block text-sm font-medium text-gray-700">URL de la vidéo</label>
            <input type="url" name="video_url" id="video_url" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#C447AF] focus:border-[#C447AF]">
        </div>

        <!-- <div>
        <label for="audio_url" class="block text-sm font-medium text-gray-700">URL de l’audio</label>
        <input type="url" name="audio_url" id="audio_url" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#C447AF] focus:border-[#C447AF]">
    </div> -->
        <div>
            <input type="hidden" name="respiration_data" id="respiration_data">
        </div>

        <div>
            <label for="expireDuration" class="block text-sm font-medium text-gray-700">expireDuration</label>
            <input type="number" name="expireDuration" id="expireDuration" min="0" onchange="updateRespirationData()" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#C447AF] focus:border-[#C447AF]">
        </div>

        <div>
            <label for="retainDuration" class="block text-sm font-medium text-gray-700">retainDuration</label>
            <input type="number" name="retainDuration" id="retainDuration" min="0" onchange="updateRespirationData()" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#C447AF] focus:border-[#C447AF]">
        </div>

        <div>
            <label for="inspireDuration" class="block text-sm font-medium text-gray-700">inspireDuration</label>
            <input type="number" name="inspireDuration" id="inspireDuration" min="0" onchange="updateRespirationData()" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#C447AF] focus:border-[#C447AF]">
        </div>


        <!-- <div>
        <label for="animation_script" class="block text-sm font-medium text-gray-700">Script d’animation (JS)</label>
        <textarea name="animation_script" id="animation_script" rows="6" class="mt-1 block w-full font-mono rounded-md border-gray-300 shadow-sm focus:ring-[#C447AF] focus:border-[#C447AF]"></textarea>
    </div> -->

        <div class="text-center">
            <button type="submit" class="bg-[#C447AF] hover:bg-[#DD6ECA] text-white font-bold py-2 px-4 rounded-xl transition-all">
                Ajouter l'exercice
            </button>
        </div>
    </form>
    <script>
        function updateRespirationData() {
            const expire = document.getElementById('expireDuration').value;
            const retain = document.getElementById('retainDuration').value;
            const inspire = document.getElementById('inspireDuration').value;

            const data = {
                expireDuration: parseInt(expire) || 0,
                retainDuration: parseInt(retain) || 0,
                inspireDuration: parseInt(inspire) || 0
            };

            document.getElementById('respiration_data').value = JSON.stringify(data);
        }

        // Remplissage automatique au chargement si des valeurs existent
        window.addEventListener('DOMContentLoaded', updateRespirationData);
    </script>
</body>

</html>