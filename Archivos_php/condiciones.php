<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Términos y Condiciones</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        /* Contenedor emergente */
        .contenedor-emergente {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            visibility: hidden; /* Inicialmente invisible */
        }

        /* Caja del contenido emergente */
        .emergenteTC {
            background-color: white;
            width: 80%;
            max-width: 800px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            max-height: 80%;
            position: relative;
            transform: translateY(-50px);
            animation: slideIn 0.5s ease-out forwards;
        }

        /* Animación de la ventana emergente */
        @keyframes slideIn {
            from {
                transform: translateY(-50px);
            }
            to {
                transform: translateY(0);
            }
        }

        h4 {
            margin-top: 0;
            font-size: 1.5rem;
            color: #333;
        }

        .actualizacion {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 20px;
        }

        /* Estilo del texto de los términos */
        .contenido {
            overflow-y: auto;
            max-height: 400px;
            margin-bottom: 20px;
        }

        .contenido p {
            font-size: 1rem;
            line-height: 1.5;
            color: #333;
        }

        /* Estilo del botón Aceptar */
        .btnaceptar {
            text-align: center;
        }

        #aceptar {
            padding: 10px 20px;
            font-size: 1rem;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            opacity: 0.5;
        }

        #aceptar:enabled {
            opacity: 1;
        }

        #aceptar:disabled {
            cursor: not-allowed;
        }
    </style>
</head>
<body>

    <div class="contenedor-emergente" id="ventanaEmergente">
        <div class="emergenteTC">
            <h4>TÉRMINOS Y CONDICIONES</h4>
            <p class="actualizacion">Este documento fue modificado por última vez el 14 de noviembre del 2024.</p>
            <p>El presente contenido regula los términos y condiciones generales aplicables al uso de los contenidos,
                productos y servicios ofrecidos a través del sitio web Dakcomweb. Toda persona que pretenda acceder o
                utilizar el sitio web y los servicios ofrecidos en él, podrá hacerlo únicamente sujeto a los TÉRMINOS Y
                CONDICIONES aquí establecidos, así como, a las políticas y principios incorporados en el presente
                documento. En todo caso, aquella persona que no acepte los TÉRMINOS Y CONDICIONES vigentes deberá abstenerse de
                utilizar el sitio web y/o adquirir los productos y servicios que eventualmente sean ofrecidos en el mismo.</p>

            <div class="contenido" id="contenido">
                <div style="height: 600px;">
                    <p>
                        1. Aceptación de los términos<br>
                        Al acceder y utilizar Dakcomweb, aceptas los siguientes términos y condiciones. Si no estás de acuerdo, te pedimos que no utilices nuestro sitio.<br><br>
                        2. Uso de la página<br>
                        Esta página está destinada a la compra y consulta de información sobre componentes de computadora.
                        Cualquier uso indebido de la página que viole estos términos puede resultar en la suspensión o
                        prohibición de acceso.<br><br>
                        3. Registro de usuario<br>
                        Para realizar compras, puede que sea necesario registrarse. Te comprometes a proporcionar
                        información precisa y actualizada. Mantener la confidencialidad de tu cuenta es tu responsabilidad.<br><br>
                        4. Productos y disponibilidad<br>
                        Todos los productos mostrados están sujetos a disponibilidad y pueden cambiar sin previo aviso. Nos
                        reservamos el derecho de limitar la cantidad de productos disponibles por cliente.<br><br>
                        5. Precios<br>
                        Los precios de los productos están expresados en pesos mexicanos, incluyen impuestos. Nos reservamos
                        el derecho de modificar precios sin previo aviso. El precio que aparece al momento de la compra será
                        el precio final.<br><br>
                        6. Proceso de compra<br>
                        Para realizar una compra, sigue las instrucciones proporcionadas en la página. Asegúrate de
                        verificar los detalles antes de confirmar tu pedido. No nos hacemos responsables de errores de
                        usuario en el proceso de compra.<br><br>
                        7. Envío y entrega<br>
                        Ofrecemos envíos a toda la república mexicana. Los tiempos de entrega son estimados y pueden variar.
                        No nos hacemos responsables de retrasos causados por factores externos como servicios de paquetería
                        o condiciones climáticas.<br><br>
                        8. Garantías y devoluciones<br>
                        Los productos vendidos tienen garantía de 30 días hábiles a la entrega del mismo. Las devoluciones
                        son aceptadas bajo ciertos términos, como defectos de fabricación. Para más detalles, consulta
                        nuestra política de garantías y devoluciones.<br><br>
                        9. Propiedad intelectual<br>
                        Todo el contenido en esta página, incluyendo imágenes, logos y descripciones, es propiedad de Dakcomweb 
                        y está protegido por derechos de autor. Algunas imágenes de productos han sido obtenidas de Google y 
                        pertenecen a sus respectivos propietarios. No está permitido su uso sin autorización.<br><br>
                        10. Privacidad<br>
                        Manejamos la información personal de acuerdo con nuestra Política de Privacidad. La información
                        proporcionada solo será utilizada para procesar pedidos y mejorar la experiencia de usuario.<br><br>
                        11. Modificaciones de términos<br>
                        Nos reservamos el derecho de modificar estos términos y condiciones en cualquier momento. Los
                        cambios serán efectivos una vez publicados en la página.<br><br>
                        12. Limitación de responsabilidad<br>
                        Dakcomweb no se hace responsable por daños indirectos, incidentales o consecuentes relacionados con
                        el uso de nuestra página o productos.
                    </p>
                </div>
            </div>

            <div class="btnaceptar">
                <button id="aceptar" disabled>Aceptar</button>
            </div>
        </div>
    </div>

    <script>
        // Mostrar la ventana emergente después de 1 segundo
        window.onload = function() {
            setTimeout(function() {
                document.getElementById('ventanaEmergente').style.visibility = 'visible';
            }, 1000); // 1 segundo
        };

        // Hacer que el botón "Aceptar" se habilite cuando el usuario haya llegado al final
        document.getElementById('contenido').onscroll = function() {
            var contenido = document.getElementById('contenido');
            var aceptarButton = document.getElementById('aceptar');

            if (contenido.scrollTop + contenido.clientHeight >= contenido.scrollHeight) {
                aceptarButton.disabled = false;
            }
        };

       // Acción al hacer clic en "Aceptar"
       document.getElementById('aceptar').onclick = function() {
            window.location.href = 'login.php'; // Redirigir a perfil.php
        };
    </script>

</body>
</html>