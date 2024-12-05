const menuToggle = document.querySelector('.toggle');
const showcase = document.querySelector('.showcase');
const videoBackground = document.querySelector('.video-background'); // Asegúrate de que el video tenga esta clase

// Activa el video de fondo cuando la página se carga o se recarga
window.addEventListener('load', () => {
    if (videoBackground) {
        videoBackground.play();
    }
});

menuToggle.addEventListener('click', () => {
    menuToggle.classList.toggle('active');
    showcase.classList.toggle('active');
});