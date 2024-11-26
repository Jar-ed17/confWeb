// filtros.js
document.addEventListener("DOMContentLoaded", () => {
    const temaSelect = document.getElementById("tema");
    const nivelSelect = document.getElementById("nivel");
    const modalidadSelect = document.getElementById("modalidad");
    const duracionSelect = document.getElementById("duracion");
    const conferencias = document.querySelectorAll(".container");

    const filtrarConferencias = () => {
        const temaSeleccionado = temaSelect.value.toLowerCase();
        const nivelSeleccionado = nivelSelect.value.toLowerCase();
        const modalidadSeleccionada = modalidadSelect.value.toLowerCase();
        const duracionSeleccionada = duracionSelect.value.toLowerCase();

        conferencias.forEach((conferencia) => {
            const tema = conferencia.dataset.tema.toLowerCase();
            const nivel = conferencia.dataset.nivel.toLowerCase();
            const modalidad = conferencia.dataset.modalidad.toLowerCase();
            const duracion = conferencia.dataset.duracion.toLowerCase();

            const esTemaValido = temaSeleccionado === "todos" || tema === temaSeleccionado;
            const esNivelValido = nivelSeleccionado === "todos" || nivel === nivelSeleccionado;
            const esModalidadValida = modalidadSeleccionada === "todas" || modalidad === modalidadSeleccionada;
            const esDuracionValida = duracionSeleccionada === "todas" || duracion === duracionSeleccionada;

            conferencia.style.display = esTemaValido && esNivelValido && esModalidadValida && esDuracionValida ? "block" : "none";
        });
    };

    temaSelect.addEventListener("change", filtrarConferencias);
    nivelSelect.addEventListener("change", filtrarConferencias);
    modalidadSelect.addEventListener("change", filtrarConferencias);
    duracionSelect.addEventListener("change", filtrarConferencias);
});
