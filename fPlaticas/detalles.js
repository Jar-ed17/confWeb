// detalles.js
document.addEventListener("DOMContentLoaded", () => {
    const urlParams = new URLSearchParams(window.location.search);
    const conferencistaId = urlParams.get("id");

    // Información de los conferencistas (simulación de datos)
    const conferencistas = {
        "1": {
            bio: "Líder en el campo de la gestión empresarial con más de 15 años de experiencia.",
            experiencia: "Ha liderado múltiples proyectos exitosos en grandes corporaciones.",
            especialidades: ["Liderazgo", "Motivación", "Gestión de equipos"]
        },
        "2": {
            bio: "Experto en inteligencia emocional con publicaciones reconocidas.",
            experiencia: "Más de 10 años como conferencista y entrenador personal.",
            especialidades: ["Inteligencia emocional", "Productividad", "Coaching personal"]
        }
    };

    const conferencista = conferencistas[conferencistaId];
    if (conferencista) {
        document.getElementById("bio").textContent = conferencista.bio;
        document.getElementById("experiencia").textContent = conferencista.experiencia;
        const especialidadesUl = document.getElementById("especialidades");
        conferencista.especialidades.forEach(especialidad => {
            const li = document.createElement("li");
            li.textContent = especialidad;
            especialidadesUl.appendChild(li);
        });
    } else {
        document.getElementById("detalles-conferencista").innerHTML = "<p>Conferencista no encontrado.</p>";
    }

    // Manejo de reseñas y calificaciones
    const listaResenas = document.getElementById("lista-resenas");
    const formResena = document.getElementById("form-resena");

    // Función para cargar reseñas desde localStorage
    const cargarResenas = () => {
        const resenas = JSON.parse(localStorage.getItem(`resenas_${conferencistaId}`)) || [];
        listaResenas.innerHTML = "";

        resenas.forEach(resena => {
            const resenaDiv = document.createElement("div");
            resenaDiv.classList.add("resena");

            const calificacionP = document.createElement("p");
            calificacionP.textContent = `Calificación: ${resena.calificacion} ⭐`;

            const comentarioP = document.createElement("p");
            comentarioP.textContent = `Comentario: ${resena.comentario}`;

            resenaDiv.appendChild(calificacionP);
            resenaDiv.appendChild(comentarioP);
            listaResenas.appendChild(resenaDiv);
        });
    };

    // Cargar reseñas al cargar la página
    cargarResenas();

    // Manejo del formulario de reseñas
    formResena.addEventListener("submit", (e) => {
        e.preventDefault();

        const calificacion = document.getElementById("calificacion").value;
        const comentario = document.getElementById("comentario").value;

        const nuevaResena = {
            calificacion,
            comentario,
        };

        const resenas = JSON.parse(localStorage.getItem(`resenas_${conferencistaId}`)) || [];
        resenas.push(nuevaResena);

        localStorage.setItem(`resenas_${conferencistaId}`, JSON.stringify(resenas));

        // Limpiar formulario y recargar reseñas
        formResena.reset();
        cargarResenas();
    });
});
