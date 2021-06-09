const getRemainTime = deadline=>{
    let now = new Date(),
    remainTime = (new Date(deadline)-now + 1000)/100,
    remainSeconds = ('0' + Math.floor(remainTime % 60)).slice(-2)
    remainMinutes = ('0' + Math.floor(remainTime / 60 % 60)).slice(-2),
    remainHours = ('0' + Math.floor(remainTime / 3600 % 24)).slice(-2),
    remainDays = Math.floor(remainTime /(3600*24));
    
    return{
        remainTime,
        remainSeconds,
        remainMinutes,
        remainHours,
        remainDays
    }
};

const countdown = (deadline,element,finalMessage)=>{
    const el = document.getElementById(element);

    const timerUpdate = setInterval(()=>{
        let t = getRemainTime(deadline);
        el.innerHTML = `d:${t.remainDays}h:${t.remainHours}m:${t.remainMinutes}s:${t.remainSeconds}`;
        if (t.remainSeconds <= 0) {
            clearInterval(timerUpdate);
            el.innerHTML = finalMessage;
        }
    },1000)
};

countdown('Jun 14 2021 12:00:00 GMT-O500','clock','Se acabaron las ofertas papu');
 
// let n = Date();
//  console.log(n);
