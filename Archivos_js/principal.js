document.addEventListener("DOMContentLoaded", function() {
    const contenido = document.getElementById('contenido');
    const botonAceptar = document.getElementById('aceptar');

    // Muestra los valores de scrollHeight y clientHeight
    console.log("scrollHeight inicial:", contenido.scrollHeight);
    console.log("clientHeight inicial:", contenido.clientHeight);

    // Detectar si el contenedor tiene scroll
    if (contenido.scrollHeight > contenido.clientHeight) {
        console.log("El contenedor tiene scroll.");
    } else {
        console.log("El contenedor NO tiene scroll.");
    }

    // Detectamos el evento de scroll
    contenido.addEventListener('scroll', () => {
        console.log("Evento scroll detectado");
        console.log("scrollTop:", contenido.scrollTop);
        console.log("clientHeight:", contenido.clientHeight);
        console.log("scrollHeight:", contenido.scrollHeight);

        // Verificamos si el scroll ha llegado al final
        if (contenido.scrollTop + contenido.clientHeight >= contenido.scrollHeight - 1) {
            botonAceptar.disabled = false;
            botonAceptar.classList.add('habilitado');
            console.log("Botón habilitado");
        }
    });
});