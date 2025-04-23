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

        <p class="text-xl text-gray-700 mb-2">Type de stress principal détecté :</p>
        <h3 class="text-2xl font-semibold text-[#DD6ECA] mb-6">{{ $user->stressResult->main_type ?? 'Non détecté' }}

        </h3>

        <p class="mb-4 text-gray-600">👉 Exercice recommandé : <span class="font-semibold">{{ $exercices->title }}</span></p>
        <div id="breath-circle" class="w-48 h-48 rounded-full border-4 border-[#E192D4] flex items-center justify-center text-xl font-bold text-[#C447AF] mx-auto mb-6">
            Inspire
        </div>
        <button id="start-exercice" class="mb-4 bg-[#C447AF] text-white px-6 py-2 rounded-xl hover:bg-[#a93792] transition">
    Commencer l'exercice
</button>
<button id="stop-exercice" class="mb-4 bg-red-500 text-white px-6 py-2 rounded-xl hover:bg-red-700 transition hidden">
    Arrêter l'exercice
</button>

        <p class="text-sm text-gray-500">Suivez le rythme pendant 2 minutes pour apaiser votre esprit ✨</p>

    </div>

    @if($exercices->video_url)
    <video width="320" height="240" controls>
        <source src="https://youtu.be/mXxhVVG6rI4?si=A316dBGGn-wsx4yV" type="video/mp4">
        Votre navigateur ne supporte pas la lecture vidéo.
    </video>
    @endif

    @if(!$exercices->video_url)
    <audio id="exercice-audio" controls class="relative z-10  hidden" autoplay>
        <source src="{{ asset('storage/audio/audio1.mp3') }}" type="audio/mpeg">
        <source src="{{ asset('storage/audio/audio1.mp3') }}" type="audio/ogg">
        Votre navigateur ne supporte pas la lecture audio.
    </audio>
    @endif

    <script>
    {!! $exercices->animation_script !!}
    document.getElementById('start-exercice')?.addEventListener('click', () => {
        const audio = document.getElementById('exercice-audio');
        audio?.play();
    });

    const startBtn = document.getElementById('start-exercice');
    const stopBtn = document.getElementById('stop-exercice');
    const audio = document.getElementById('exercice-audio');

    startBtn?.addEventListener('click', () => {
        audio?.play();
        stopBtn.classList.remove('hidden');
        startBtn.classList.add('hidden');
    });

    stopBtn?.addEventListener('click', () => {
        if (audio) {
            audio.pause();
            audio.currentTime = 0; 
        }
        stopBtn.classList.add('hidden');
        startBtn.classList.remove('hidden');
        
      
    });
</script>


</body>

</html>