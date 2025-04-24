const breathCircle = document.getElementById('breath-circle');
      

function StartBreathing(inspireDuration,retainDuration,expireDuration) {

    breathCircle.textContent = 'Inspire';
    breathCircle.style.transform =`scale(${inspireDuration})`;
    breathCircle.style.transition = 'transform 4s ease-in-out';

    setTimeout(()=>{
        breathCircle.textContent ='Retain';
        breathCircle.style.transform =`scale(${retainDuration})`;
        breathCircle.style.transition = 'none';


   } ,4000)
    setTimeout(()=>{
        breathCircle.textContent = 'Expire';
        breathCircle.style.transform =`scale(${expireDuration})`;
        breathCircle.style.transition = 'transform 8s ease-in-out';


    },11000)
    setInterval(StartBreathing, 19000);

}

StartBreathing();
