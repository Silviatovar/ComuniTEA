
// Configuración del tour
const driver = window.driver.js.driver;
const driverObj = driver({
    animate: false,
    prevBtnText: "Anterior",
    nextBtnText: "Siguiente",
    doneBtnText: "Terminar",
    overlayColor: "black",
    showProgress: true,
    steps: [
        {
            element: "#navbarSupportedContent", 
            popover: {
                title: "¡Bienvenido a ComuniTEA!",
                description: "Aquí podrás desplazarte por nuestra página web y conocer todo lo que tenemos para ti."
            }
        },
        {
            element: "#loginForm",
            popover: {
                title: "Inicio de sesión",
                description: "Si ya formas parte de nuestra comunidad, inicia sesión aquí."
            }
        },
        {
            element: "#registroForm",
            popover: {
                title: "¿No tienes una cuenta?",
                description: "Rellena este formulario para ser parte de nuestra comunidad."
            }
        },
        {
            element: "#accordion",
            popover: {
                title: "Aquí encontrarás...",
                description: "Toda la información que necesitas sobre ComuniTEA."
            }
        },
        {
            element: "#loginForm",
            popover: {
                title: "¡Listo!",
                description: "¡Ahora puedes iniciar sesión en tu cuenta!"
            }
        }

    ]
});

// Función para iniciar el tour manualmente
function iniciarTour() {
    driverObj.drive();
}

// Verificar si el tour ya se ha visto antes
let tourVisto = "tourVisto";
if (document.cookie.indexOf(tourVisto) === -1) {
    // Si el tour no se ha visto, iniciar el tour y establecer una cookie para no mostrarlo nuevamente
    driverObj.drive();
    document.cookie = "tourVisto=true; max-age=3600"; // Establecer cookie con nombre 'tourVisto' y expiración en una hora
}
