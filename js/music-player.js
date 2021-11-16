const ifPlayed = (button, played) => {
  if (played) {
    button.children[0].classList.replace("fa-play", "fa-pause");
  } else {
    button.children[0].classList.replace("fa-pause", "fa-play");
  }
};

const timeMatch = (seconds) => {
  const time = Math.round(seconds);
  if (time >= 60) {
    let timeResult = time / 60;
    let numberString = timeResult + "";
    numberString = numberString.split(".");
    numberString = numberString[1];
    numberString = numberString.slice(0, 2);
    const numeroObjet = {
      entero: Math.trunc(timeResult),
      float: numberString,
    };
    return `${numeroObjet.entero}:${numeroObjet.float}`;
  } else {
    return `00:${time}`;
  }
};

const timePersent = (audio) => {
  const tiempoTotal = audio.duration;
  const tiempoActual = audio.currentTime;
  if (tiempoActual != tiempoTotal) {
    const porsentaje = Math.trunc((tiempoActual / tiempoTotal) * 100) + "%";
    const respuesta = {
      now: tiempoActual,
      total: tiempoTotal,
      porsentaje: porsentaje,
    };
    return respuesta;
  } else {
    clearInterval(prueba);
  }
};

const changeSong = ()=>{
    currentSong.textContent = info_song[counter].textContent;
    currentCaratulaSrc = caratulas[counter].src;
    currentCaratula.setAttribute("src", currentCaratulaSrc);
    currentCaratula.setAttribute("srcset", currentCaratulaSrc);
    prueba = setInterval(() => {
      const tiempo = timePersent(audio_output[counter]);
      if (!tiempo) progressBar.style.width = "100%";
      else {
        progressBar.style.width = tiempo.porsentaje;
        now.textContent = timeMatch(tiempo.now);
        total.textContent = timeMatch(tiempo.total);
      }
    }, 1000);
}


const caratulas = document.querySelectorAll(".letra img");
const info_song = document.querySelectorAll(".letra h2");
const letter_song = document.querySelector(".letra p");
const progressBar = document.querySelector(".progressData");

const boton_antes = document.querySelector("#antes");
const boton_despues = document.querySelector("#despues");
const audio_output = document.querySelectorAll(".letra audio");
const buttonPlay = document.querySelector("#playPause");
const now = document.querySelector("#progress .now");
const total = document.querySelector("#progress .total");
const currentSong = document.querySelector("#current-song h2");
const currentCaratula = document.querySelector(".caratula img");
const buttonBefore = document.querySelector("#antes");
const buttonAfter = document.querySelector("#despues");


const fullSong = audio_output.length - 1;
let counter = 0;
let currentCaratulaSrc ;

const volumenRange = document.querySelector("#volumenContainer input");

volumenRange.addEventListener("change", (e) => {
  let potencia = e.target.value / 100;
  audio_output.volume = potencia;
});

const vButton = document.querySelector("#volumenContainer button");
const containVolume = document.querySelector(
  "#volumenContainer .volumen-contenedor"
);

vButton.addEventListener("click", () => {
  containVolume.classList.toggle("activo");
});

let durationTrack = timeMatch(audio_output.duration);

buttonPlay.addEventListener("click", (evento) => {
    if (buttonPlay.children[0].classList[1].includes("fa-play")) {
    ifPlayed(buttonPlay, true);
    audio_output[counter].play();
    changeSong();
    } else {
        ifPlayed(buttonPlay, false);
        audio_output.forEach(item =>{
            item.pause();
        });
    }
});

buttonAfter.addEventListener("click", ()=>{
    counter < fullSong ? counter++ : counter = 0;
    ifPlayed(buttonPlay,true);
    audio_output.forEach(item =>{
        item.pause();
        item.currentTime = 0;
    });
    changeSong();
    audio_output[counter].play();
});

buttonBefore.addEventListener("click", ()=>{
    counter >  0 ? counter-- : counter = fullSong;
    ifPlayed(buttonPlay,true);
    audio_output.forEach(item =>{
        item.pause();
        item.currentTime = 0;
    });
    changeSong();
    audio_output[counter].play();
});