<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultat du test de stress</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
    /* Adding some initial transition properties */
    #breath-circle {
        transition: transform 0.5s ease-in-out;
    }
</style>

<body class="min-h-screen bg-[#FBF4FA] flex flex-col items-center justify-center text-center p-6">

    <div class="bg-white shadow-xl rounded-2xl p-16 max-w-xl w-full border-4 border-[#C447AF]">

        <p class="mb-8 text-gray-600"> Recommended exercise : <span class="font-semibold">{{ $exercices->title }}</span></p>

        @if ($exercices->category->name == 'Breathing')
        <div id="breath-circle" class="w-32 h-32 rounded-full border-4 border-[#E192D4] flex items-center justify-center text-xl font-bold text-[#C447AF] mx-auto mb-10">
            Inspire
        </div>
        <div class="mt-4 text-gray-700">
            <button id="start-exercice" class="mb-4 bg-[#C447AF] text-white px-6 py-2 rounded-xl hover:bg-[#a93792] transition">
                Commencer l'exercice
            </button>
            <button id="stop-exercice" class="mb-4 bg-red-500 text-white px-6 py-2 rounded-xl hover:bg-red-700 transition hidden">
                Arrêter l'exercice
            </button>

        </div>

        @endif

        @php
        $youtubeId = $exercices->getYoutubeId($exercices->video_url);
        @endphp

        @if ($exercices->category->name == 'Meditation' && $youtubeId)
        <div class="aspect-w-16 aspect-h-9 mb-6">
            <iframe class="w-full h-64 mx-auto rounded-xl"
                src="https://www.youtube.com/embed/{{ $youtubeId }}"
                title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
        </div>
        @endif
        @if ($exercices->category->name == 'Meditation' && !$exercices->video_url)
    <div class="aspect-w-8 aspect-h-4 mb-6 flex justify-center">
        <img class="w-1/2 " src="{{ asset('storage/images/photo10.png') }}">
        <audio id="exercice-audio" controls class="relative z-10 hidden" autoplay>
            <source src="{{ asset('storage/audio/audio2.mp3') }}" type="audio/mpeg">
            Votre navigateur ne supporte pas la lecture audio.
        </audio>
    </div>
@endif



        <p class="text-sm text-gray-500">Follow the rhythm for 2 minutes to calm your mind </p>

    </div>

    @if(!$exercices->video_url)
    <audio id="exercice-audio" controls class="relative z-10 hidden" autoplay>
        <source src="{{ asset('storage/audio/audio1.mp3') }}" type="audio/mpeg">
        <source src="{{ asset('storage/audio/audio1.mp3') }}" type="audio/ogg">
        Votre navigateur ne supporte pas la lecture audio.
    </audio>
    @endif
    <script>
        const respirationData = @json($exercices -> respiration_data ?? []);

        let parsedData = respirationData;
        if (typeof respirationData === 'string') {
            try {
                parsedData = JSON.parse(respirationData);
                console.log("Parsed data:", parsedData);
            } catch (e) {
                console.error("Error parsing respirationData:", e);
            }
        }

        startBtn = document.getElementById('start-exercice');
        console.log("StartBtn:", startBtn);

        startBtn?.addEventListener('click', () => {
            const audio = document.getElementById('exercice-audio');
            audio?.play();
        });

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

        const breathCircle = document.getElementById('breath-circle');
        let breathingInterval;



        function startBreathing() {

            const inspireDuration = parsedData.inspireDuration || 0;
            const retainDuration = parsedData.retainDuration || 0;
            const expireDuration = parsedData.expireDuration || 0;

            const inspireMs = inspireDuration * 1000;
            const retainMs = retainDuration * 1000;
            const expireMs = expireDuration * 1000;
            const totalCycle = inspireMs + retainMs + expireMs;

            breathCircle.style.transition = 'none';
            breathCircle.style.transform = 'scale(1)';
            breathCircle.textContent = 'Inspire';

            requestAnimationFrame(() => {
                requestAnimationFrame(() => {
                    breathCircle.style.transition = `transform ${inspireDuration}s ease-in-out`;
                    breathCircle.style.transform = 'scale(1.5)';

                    setTimeout(() => {
                        breathCircle.textContent = 'Retain';
                    }, inspireMs);

                    setTimeout(() => {
                        breathCircle.textContent = 'Expire';
                        breathCircle.style.transition = `transform ${expireDuration}s ease-in-out`;
                        breathCircle.style.transform = 'scale(1)';
                    }, inspireMs + retainMs);
                });
            });

            return setTimeout(() => {
                startBreathing(inspireDuration, retainDuration, expireDuration);
            }, totalCycle);
        }

        startBtn.addEventListener('click', function() {
            if (breathingInterval) {
                clearTimeout(breathingInterval);
            }
            breathingInterval = startBreathing(
                respirationData.inspireDuration,
                respirationData.retainDuration,
                respirationData.expireDuration
            );
            this.textContent = "Restart Breathing";
        });
    </script>


</body>

</html>