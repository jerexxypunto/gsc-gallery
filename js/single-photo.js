const openFullScreen = document.querySelector("#openFullScreen");
const modalFullScreen = document.querySelector("#modalFullize");
const buttonCerrarModal = document.querySelector(".modalFullize__cerrar");
const imagenModal = document.querySelector(".modalFullsize__content img");

const showSize = document.querySelectorAll(".photo-size");
const formatoImagen = document.querySelector("#photo-format");

let dataImageObjet = {height : imagenModal.naturalHeight, width : imagenModal.naturalWidth, formato: imagenModal.currentSrc.slice(-1 -2) };

showSize[0].textContent = ` ${dataImageObjet.width} `;
showSize[1].textContent = ` ${dataImageObjet.height} `;
formatoImagen.textContent = ` ${(dataImageObjet.formato).toUpperCase()} `;

openFullScreen.addEventListener('click', ()=>{
    modalFullScreen.classList.add("actived");
});

buttonCerrarModal.addEventListener('click', ()=>{
    modalFullScreen.classList.remove("actived");
});