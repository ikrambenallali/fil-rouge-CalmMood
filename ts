<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stress Test</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-6 rounded-xl shadow-md max-w-xl w-full">
        <h1 class="text-2xl font-bold mb-4 text-center">🧠 What Is Your Main Type of Stress?</h1>

        <div id="quizContainer"></div>

        <div class="flex justify-end mt-4">
            <button id="nextBtn" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Next</button>
        </div>
    </div>

    <script>
       const questions = [
    {
        text: "When you feel stressed, what do you usually experience?",
        options: [
            { text: "My heart races", type: "acute" },
            { text: "I feel drained of energy for several days", type: "chronic" },
            { text: "I become very emotional", type: "emotional" },
            { text: "I get physical pain (headaches, back pain, etc.)", type: "physical" },
        ]
    },
    {
        text: "How often do you experience stress?",
        options: [
            { text: "Only in specific situations", type: "acute" },
            { text: "Almost every day", type: "chronic" },
            { text: "When I have personal conflicts", type: "emotional" },
            { text: "When I'm tired or sick", type: "physical" },
        ]
    },
    {
        text: "What usually triggers your stress?",
        options: [
            { text: "An emergency or unexpected event", type: "acute" },
            { text: "My work, studies, or ongoing responsibilities", type: "chronic" },
            { text: "Complicated personal relationships", type: "emotional" },
            { text: "Lack of sleep or poor nutrition", type: "physical" },
        ]
    },
    {
        text: "How does your body react to stress?",
        options: [
            { text: "I sweat and my heart rate increases", type: "acute" },
            { text: "I often have insomnia", type: "chronic" },
            { text: "I cry or feel very sad", type: "emotional" },
            { text: "I have muscle tension or aches", type: "physical" },
        ]
    },
    {
        text: "How long does your stress last?",
        options: [
            { text: "A few minutes or hours", type: "acute" },
            { text: "Several days or even weeks", type: "chronic" },
            { text: "It depends on the emotions I feel", type: "emotional" },
            { text: "It lasts until my body fully recovers", type: "physical" },
        ]
    },
    {
        text: "What do you usually do to manage your stress?",
        options: [
            { text: "I take deep breaths or take a break", type: "acute" },
            { text: "I can’t manage it—it always comes back", type: "chronic" },
            { text: "I talk to someone or cry", type: "emotional" },
            { text: "I rest or take a hot bath", type: "physical" },
        ]
    },
    {
        text: "How does your stress affect you mentally?",
        options: [
            { text: "I suddenly have trouble concentrating", type: "acute" },
            { text: "I feel constant pressure on my shoulders", type: "chronic" },
            { text: "I keep going over emotional thoughts", type: "emotional" },
            { text: "My brain feels tired, I get migraines", type: "physical" },
        ]
    },
    {
        text: "Is your sleep affected by stress?",
        options: [
            { text: "I sleep badly the night after a stressful event", type: "acute" },
            { text: "I almost always sleep poorly", type: "chronic" },
            { text: "I sleep poorly when I'm upset", type: "emotional" },
            { text: "My stress exhausts me, I want to sleep all the time", type: "physical" },
        ]
    },
    {
        text: "Do you feel supported during stressful times?",
        options: [
            { text: "Yes, I can handle it on my own when it's occasional", type: "acute" },
            { text: "No, I feel like I'm always alone", type: "chronic" },
            { text: "I need to talk and be heard", type: "emotional" },
            { text: "I need rest to feel better", type: "physical" },
        ]
    },
    {
        text: "If you had to describe your stress in one word, what would it be?",
        options: [
            { text: "Sudden", type: "acute" },
            { text: "Constant", type: "chronic" },
            { text: "Emotionally intense", type: "emotional" },
            { text: "Physically exhausting", type: "physical" },
        ]
    },
];

let currentQuestion = 0;
        const answers = [];

        const container = document.getElementById("quizContainer");
        const nextBtn = document.getElementById("nextBtn");

        function renderQuestion() {
            const q = questions[currentQuestion];
            container.innerHTML = `
                <p class="mb-4 font-semibold">Q${currentQuestion + 1}. ${q.text}</p>
                <div class="space-y-3">
                    ${q.options.map((opt, i) => `
                        <label class="flex items-center space-x-2 cursor-pointer">
                            <input type="radio" name="answer" value="${opt.type}" class="form-radio text-blue-600">
                            <span>${opt.text}</span>
                        </label>
                    `).join('')}
                </div>
            `;
        }

        nextBtn.addEventListener("click", () => {
            const selected = document.querySelector('input[name="answer"]:checked');
            if (!selected) {
                alert("Please choose an answer.");
                return;
            }

            answers.push(selected.value);
            currentQuestion++;

            if (currentQuestion < questions.length) {
                renderQuestion();
            } else {
                // Calculate the scores
                const scores = {
                    acute: 0,
                    chronic: 0,
                    emotional: 0,
                    physical: 0,
                };
                answers.forEach(type => {
                    scores[type]++;
                });

                const mainType = Object.entries(scores).sort((a, b) => b[1] - a[1])[0][0];

                // Send data to Laravel via fetch
                fetch("{{ route('stressResult2') }}", {
                    method: "POST",
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        acute: scores.acute,
                        chronic: scores.chronic,
                        emotional: scores.emotional,
                        physical: scores.physical,
                        main_type: mainType
                    })
                })
                .then(res => res.json())
                .then(data => {
                    window.location.href = `/stress-results/${data.id}`;
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        });

        renderQuestion();

    </script>
</body>
</html>




<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\StressTestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('registerForme');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('loginForme');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/home', function () {
    return view('home.index'); 
});
Route::get('/about', function () {
    return view('about.index'); 
});
Route::get('/contact', function () {
    return view('about.contactUs'); 
});
Route::get('/dashboard', function () {
    return view('admin.dashboard'); 
});
Route::get('/typeStress', function () {
    return view('utilisateurs.typeStress'); 
});
Route::post('/contactStore', [ContactController::class, 'store'])->name('contact.store');
// dashboard routes
Route::get('/dashboard',[UserController::class, 'index'])->name('allUsers');
Route::delete('/dashboard/{id}', [UserController::class, 'destroy'])->name('deleteUser');
Route::post('/dashboard/{id}', [UserController::class, 'activate'])->name('activerUser');
Route::post('/dashboards/{id}', [UserController::class, 'desactivate'])->name('desactiverUser');
// Route::post('/stressTest', [StressTestController::class, 'store']);
Route::post('/stressResult2', [StressTestController::class, 'store'])->name('stressResult2');
Route::get('/stress-results/{id}', [StressTestController::class, 'show'])->name('stressResults');

Route::get('/stressResult', function () {
    return view('utilisateurs/test');
})->name('stressResult');



Route::post('/logout', function () {
    return view('authentification.login'); 
})->name('logout');




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


        <!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultat du test de stress</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-[#FBF4FA] flex flex-col items-center justify-center text-center p-6">

    <div class="bg-white shadow-xl rounded-2xl p-8 max-w-xl w-full border-4 border-[#C447AF]">



        </h3>

        <p class="mb-8 text-gray-600"> Recommended exercise : <span class="font-semibold">{{ $exercices->title }}</span></p>
        @if ($exercices->category->name == 'Breathing')

        <div id="breath-circle" class="w-48 h-48 rounded-full border-4 border-[#E192D4] flex items-center justify-center text-xl font-bold text-[#C447AF] mx-auto mb-6">
            Inspire
        </div>
        @endif
        @if ($exercices->category->name == 'Meditation'  && $exercices->video_url)

        @if($exercices->video_url)
        <video width="320" height="240" controls class="mx-auto">
            <source src="" type="video/mp4">
            Votre navigateur ne supporte pas la lecture vidéo.
        </video>
        @endif
        @endif
        <button id="start-exercice" class="mb-4 bg-[#C447AF] text-white px-6 py-2 rounded-xl hover:bg-[#a93792] transition">
            Commencer l'exercice
        </button>
        <button id="stop-exercice" class="mb-4 bg-red-500 text-white px-6 py-2 rounded-xl hover:bg-red-700 transition hidden">
            Arrêter l'exercice
        </button>

        <p class="text-sm text-gray-500">Follow the rhythm for 2 minutes to calm your mind </p>

    </div>


    @if(!$exercices->video_url)
    <audio id="exercice-audio" controls class="relative z-10  hidden" autoplay>
        <source src="{{ asset('storage/audio/audio1.mp3') }}" type="audio/mpeg">
        <source src="{{ asset('storage/audio/audio1.mp3') }}" type="audio/ogg">
        Votre navigateur ne supporte pas la lecture audio.
    </audio>
    @endif

    <script>
        {
            !!$exercices -> animation_script!!
        }
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