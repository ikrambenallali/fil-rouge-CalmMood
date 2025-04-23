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
        <h2 class="text-3xl font-bold text-[#C447AF] mb-4">Résultat du test de stress</h2>
        
        <p class="text-xl text-gray-700 mb-2">Type de stress principal détecté :</p>
        <h3 class="text-2xl font-semibold text-[#DD6ECA] mb-6">Stress émotionnel </h3>
        
        <p class="mb-4 text-gray-600">👉 Exercice recommandé : <span class="font-semibold">Respiration équilibrée (5s / 5s)</span></p>
        
        <div id="breath-circle" class="w-48 h-48 rounded-full border-4 border-[#E192D4] flex items-center justify-center text-xl font-bold text-[#C447AF] mx-auto mb-6">
            Inspire
        </div>
        
        <p class="text-sm text-gray-500">Suivez le rythme pendant 2 minutes pour apaiser votre esprit ✨</p>
        
        <a href="/stress-test" class="mt-6 inline-block bg-[#C447AF] text-white px-6 py-2 rounded-xl hover:bg-[#a93792] transition">Recommencer le test</a>
    </div>

    <script>
        // const breathCircle = document.getElementById('breath-circle');
        // let isInhaling = true;
        // const interval = 5000;

        // function updateBreathing() {
        //     breathCircle.textContent = isInhaling ? 'Inspire' : 'Expire';
        //     breathCircle.style.transform = isInhaling ? 'scale(1.2)' : 'scale(1)';
        //     breathCircle.style.transition = 'transform 5s ease-in-out';
        //     isInhaling = !isInhaling;
        // }

        // updateBreathing();
        // setInterval(updateBreathing, interval);
//         const breathCircle = document.getElementById('breath-circle');

// const phases = ['Inspire', 'Retiens', 'Expire', 'Retiens'];
// let currentPhase = 0;
// const duration = 4000;

// function updateBoxBreathing() {
//     breathCircle.textContent = phases[currentPhase];

//     if (phases[currentPhase] === 'Inspire') {
//         breathCircle.style.transform = 'scale(1.2)';
//     } else if (phases[currentPhase] === 'Expire') {
//         breathCircle.style.transform = 'scale(1)';
//     } else {
//         breathCircle.style.transform = 'scale(1.1)'; // léger effet pour les pauses
//     }

//     breathCircle.style.transition = 'transform 4s ease-in-out';

//     currentPhase = (currentPhase + 1) % phases.length;
// }

// updateBoxBreathing();
// setInterval(updateBoxBreathing, duration);
const breathCircle = document.getElementById('breath-circle');

    const phases = [
        { text: 'Inspire profondément', duration: 5000, scale: 1.2 },
        { text: 'Expire lentement', duration: 7000, scale: 1 }
    ];

    let currentPhase = 0;

    function updateBreathing() {
        const phase = phases[currentPhase];
        breathCircle.textContent = phase.text;
        breathCircle.style.transform = `scale(${phase.scale})`;
        breathCircle.style.transition = `transform ${phase.duration}ms ease-in-out`;

        // Planifier la prochaine phase
        setTimeout(updateBreathing, phase.duration);

        // Passer à la phase suivante
        currentPhase = (currentPhase + 1) % phases.length;
    }

    updateBreathing();
    </script>
</body>
</html>
