// filtros.js
document.addEventListener("DOMContentLoaded", () => {
    const temaSelect = document.getElementById("tema");
    const nivelSelect = document.getElementById("nivel");
    const modalidadSelect = document.getElementById("modalidad");
    const duracionSelect = document.getElementById("duracion");
    const platicas = document.querySelectorAll(".container");

    const filtrarPlaticas = () => {
        const temaSeleccionado = temaSelect.value.toLowerCase();
        const nivelSeleccionado = nivelSelect.value.toLowerCase();
        const modalidadSeleccionada = modalidadSelect.value.toLowerCase();
        const duracionSeleccionada = duracionSelect.value.toLowerCase();

        platicas.forEach((platicas) => {
            const tema = platicas.dataset.tema.toLowerCase();
            const nivel = platicas.dataset.nivel.toLowerCase();
            const modalidad = platicas.dataset.modalidad.toLowerCase();
            const duracion = platicas.dataset.duracion.toLowerCase();

            const esTemaValido = temaSeleccionado === "todos" || tema === temaSeleccionado;
            const esNivelValido = nivelSeleccionado === "todos" || nivel === nivelSeleccionado;
            const esModalidadValida = modalidadSeleccionada === "todas" || modalidad === modalidadSeleccionada;
            const esDuracionValida = duracionSeleccionada === "todas" || duracion === duracionSeleccionada;

            conferencia.style.display = esTemaValido && esNivelValido && esModalidadValida && esDuracionValida ? "block" : "none";
        });
    };

    temaSelect.addEventListener("change", filtrarPlaticas);
    nivelSelect.addEventListener("change", filtrarPlaticas);
    modalidadSelect.addEventListener("change", filtrarPlaticas);
    duracionSelect.addEventListener("change", filtrarPlaticas);
});
