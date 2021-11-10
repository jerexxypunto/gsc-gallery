const openFullScreen = document.querySelector("#openFullScreen");
const modalFullScreen = document.querySelector("#modalFullize");
const buttonCerrarModal = document.querySelector(".modalFullize__cerrar");

openFullScreen.addEventListener('click', ()=>{
    modalFullScreen.classList.add("actived");
});

buttonCerrarModal.addEventListener('click', ()=>{
    modalFullScreen.classList.remove("actived");
});