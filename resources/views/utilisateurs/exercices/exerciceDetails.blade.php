@extends('layouts.app')

@section('title', 'Résultat du test de stress')

@section('content')
    <style>
        /* Adding some initial transition properties */
        #breath-circle {
            transition: transform 0.5s ease-in-out;
        }
    </style>

    <!-- positivity -->
    @if ($exercices->category->name == 'Positivity')
    <form action="{{ route('positivity') }}" method="POST">
        @csrf
        <div class="flex items-center justify-center">
            <div class="bg-white rounded-2xl shadow-xl p-8 w-full max-w-md border border-[#C447AF]">
                <h2 class="text-2xl font-semibold text-[#C447AF] text-center mb-6">
                    3 Positive Things Today
                </h2>

                <input type="hidden" name="exercise_id" value="{{ $exercices->id }}">

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-[#C447AF] mb-1">Positive Thought 1</label>
                        <input type="text" name="positive_thing_1" class="w-full px-4 py-2 border border-[#C447AF] rounded-xl focus:outline-none focus:ring-2 focus:ring-[#C447AF] bg-[#FBF4FA] placeholder-[#C447AF]" placeholder="Something good...">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-[#C447AF] mb-1">Positive Thought 2</label>
                        <input type="text" name="positive_thing_2" class="w-full px-4 py-2 border border-[#C447AF] rounded-xl focus:outline-none focus:ring-2 focus:ring-[#C447AF] bg-[#FBF4FA] placeholder-[#C447AF]" placeholder="A happy moment...">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-[#C447AF] mb-1">Positive Thought 3</label>
                        <input type="text" name="positive_thing_3" class="w-full px-4 py-2 border border-[#C447AF] rounded-xl focus:outline-none focus:ring-2 focus:ring-[#C447AF] bg-[#FBF4FA] placeholder-[#C447AF]" placeholder="Something you're grateful for...">
                    </div>

                    <button type="submit" class="w-full py-3 rounded-xl bg-[#C447AF] text-white font-semibold mt-6">
                        Save My Positives
                    </button>
                </div>

                <p class="mt-6 text-center text-sm text-[#C447AF]">
                    ✨ You'll receive sweet reminders to reflect on your happy moments ✨
                </p>
            </div>
        </div>
    </form>
    @endif

    <div id="barreExercice" class="{{ $exercices->category->name === 'Positivity' ? 'hidden' : '' }} bg-white shadow-xl rounded-2xl p-16 max-w-xl mx-auto w-full border-4 border-[#C447AF]">
        <p class="mb-8 text-gray-600">Recommended exercise: <span class="font-semibold">{{ $exercices->title }}</span></p>

        @if ($exercices->category->name == 'Breathing')
        <div id="breath-circle" class="w-32 h-32 rounded-full border-4 border-[#E192D4] flex items-center justify-center text-xl font-bold text-[#C447AF] mx-auto mb-10">
            Inspire
        </div>
        <div class="mt-4 text-gray-700 text-center">
            <button id="start-exercice" class="mb-4 bg-[#E192D4] text-white px-6 py-2 rounded-xl">
                Start the exercise
            </button>
            <button id="stop-exercice" class="mb-4 bg-[#C447AF] text-white px-6 py-2 rounded-xl hidden">
                Stop exercising
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
            <img class="w-1/2" src="{{ asset('storage/images/photo10.png') }}">
            <audio id="exercice-audio" controls class="relative z-10 hidden" autoplay>
                <source src="{{ asset('storage/audio/audio2.mp3') }}" type="audio/mpeg">
                Votre navigateur ne supporte pas la lecture audio.
            </audio>
        </div>
        @endif

        <p class="text-sm text-gray-500 text-center">Follow the rhythm for 2 minutes to calm your mind</p>
    </div>

    @if(!$exercices->video_url && $exercices->category->name == 'Breathing')
    <audio id="exercice-audio" controls class="relative z-10 hidden" autoplay>
        <source src="{{ asset('storage/audio/audio1.mp3') }}" type="audio/mpeg">
        <source src="{{ asset('storage/audio/audio1.mp3') }}" type="audio/ogg">
        Votre navigateur ne supporte pas la lecture audio.
    </audio>
    @endif

    <script>
        let categoryName = @json($exercices->category->name);

        const barre = document.getElementById('barreExercice');

        if (categoryName === 'Positivity') {
            barre.classList.add('hidden');
        } else {
            barre.classList.remove('hidden');
        }

        const respirationData = @json($exercices->respiration_data ?? []);

        let parsedData = respirationData;
        if (typeof respirationData === 'string') {
            try {
                parsedData = JSON.parse(respirationData);
                console.log("Parsed data:", parsedData);
            } catch (e) {
                console.error("Error parsing respirationData:", e);
            }
        }

        const startBtn = document.getElementById('start-exercice');
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

        if (startBtn) {
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
        }
    </script>
@endsection