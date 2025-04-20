<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stress Test</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body class="bg-[#FBF4FA] min-h-screen flex items-center justify-center">
    <div class="flex flex-col md:flex-row gap-6">
    <div class="bg-[#FBF4FA] p-6 rounded-xl  max-w-3xl w-full">
    <div class="flex justify-center mb-6">
      <img class="w-[40%] -mb-2 -mt-2" src="{{ asset('storage/images/logo.png') }}" alt="logo">
    </div>
    <h1 class="text-2xl text-[#C447AF] font-bold mb-6 text-center">     
      What Is Your Main Type of Stress?
    </h1>
    <div id="quizContainer"></div>

    <div class="flex justify-end mt-4">
        <button id="nextBtn" class="bg-[#C447AF] text-white px-4 py-2 rounded ">Next</button>
    </div>
</div>

    <div class="">
    <img class="w-full -my-12" src="{{ asset('storage/images/photo5.png') }}" alt="logo">

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
                // Fin du test – Calculer les scores
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

                // Envoyer à Laravel via fetch
                fetch("{{ route('stressResult') }}", {
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
.then(res => {
    if (!res.ok) {
        return res.text().then(text => { throw new Error(text) });
    }
    return res.json();
})
.then(data => {
    window.location.href = `/stress-results/${data.id}`;
})
.catch(error => {
    console.error("Erreur lors de l'envoi des données :", error);
    alert("Une erreur s'est produite. Vérifie la console.");
});

            }
        });

        renderQuestion();

    </script>
</body>
</html>
