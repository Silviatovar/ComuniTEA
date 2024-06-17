
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php include 'nav.php'; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.0.0/uicons-brands/css/uicons-brands.css">
    <link rel="stylesheet"
        href="https://cdn-uicons.flaticon.com/2.0.0/uicons-solid-straight/css/uicons-solid-straight.css">
    <link rel="stylesheet"
        href="https://cdn-uicons.flaticon.com/2.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css">
    <link rel="stylesheet"
        href="https://cdn-uicons.flaticon.com/2.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/2.1.0/uicons-bold-rounded/css/uicons-bold-rounded.css">
    <link rel="stylesheet"
        href="https://cdn-uicons.flaticon.com/2.1.0/uicons-solid-rounded/css/uicons-solid-rounded.css">
    <link rel="stylesheet"
        href="https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-rounded/css/uicons-regular-rounded.css">
    <link rel="stylesheet" href="https://fontawesome.com/icons/heart?f=classic&s=solid">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/driverPopover.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/driver.js@1.0.1/dist/driver.css" />
    <script src="https://cdn.jsdelivr.net/npm/driver.js/dist/driver.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  
    <link rel="stylesheet" href="css/nav.css">
 
</head>

<body class="d-flex flex-column min-vh-100">
    <h1> ¡UNETE A COMUNITEA!</h1>

    <div id="carouselExampleFade" class="carousel slide carousel-fade " data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="carrousel/(3).jpg" class="d-block w-100" alt=" ">
            </div>
            <div class="carousel-item">
                <img src="carrousel/(1).jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="carrousel/(2).jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="carrousel/(4).jpg" class="d-block w-100" alt="...">
            </div>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!--INICIO SECCIÓN1-->
    <div class="flex-grow-1">
        <div class="container my-5 py-5 card card-header">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item card">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button bg-light text-danger fw-bold py-4" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                            aria-controls="collapseOne">
                            ¿Qué es ComuniTEA? <img src="img/compromiso-de-los-empleados.png" alt="puesta en marcha"
                                width="25" height="25"> </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show py-4 mx-4"
                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">

                            ComuniTEA es una aplicación totalmente gratuita, especialmente diseñada para facilitar la
                            comunicación de personas que enfrentan desafíos en las habilidades sociales y de
                            comunicación, como el Trastorno del Espectro Autista (TEA), Trastorno Generalizado del
                            Desarrollo (TGD), Autismo u otras afecciones similares.
                            Nuestra aplicación se centra en la inclusión y utiliza la tecnología para mejorar la
                            comunicación, reemplazando las tarjetas físicas con pictogramas digitales. ComuniTEA ha sido
                            desarrollada con el objetivo de adaptarse a las necesidades específicas de cada usuario.

                        </div>
                    </div>
                </div>
                <div class="accordion-item card">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button bg-light text-danger fw-bold py-4" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true"
                            aria-controls="collapseTwo">
                            ¿DONDE SE ENCUENTRAN NUESTROS PICTOS?<img src="img/arbitro.png" alt="25" width="25"
                                height="25">
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse show py-3 mx-4"
                        aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">

                            Los pictogramas predeterminados en ComuniTEA provienen de <img src="img/LOGO ARASAC.png"
                                alt="100" width="100" height=""> del Gobierno de Aragón, España, garantizando un
                            catálogo visualmente comprensible y efectivo.
                            <br>
                            Puedes consultar su web aqui <a href="https://arasaac.org/" target="_blank">ARASAAC</a>

                        </div>
                    </div>
                </div>
                <div class="accordion-item card">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button bg-light text-danger fw-bold py-4" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true"
                            aria-controls="collapseThree">
                            ¡APOYANOS PARA SEGUIR CRECIENDO! <img src="img/puesta-en-marcha.png" alt="puesta en marcha"
                                width="25" height="25">
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse show py-3 mx-4"
                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">

                            Agradecemos tu apoyo y te invitamos a compartir tus comentarios, sugerencias o problemas
                            escribiéndonos a info@comunitea.com.
                            También puedes seguirnos en nuestra página de Facebook, ComuniTEA App, para mantenerte
                            actualizado sobre las novedades y participar en nuestra comunidad.
                            ¡Tu retroalimentación es fundamental para continuar mejorando y haciendo de ComuniTEA una
                            herramienta cada vez más útil y efectiva para la comunidad!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--FIN -->
    <!--INICIO FOOTER-->

    <footer class="container-fluid bg-dark text-lefts text-light px-5 pt-2">
        <div class="text-left p-3">
            <p>Todos los Derechos reservadors &copy; 2024 | Made with by <i class="fa-regular fa-heart"></i> <span
                    class="text-warning">Silvia Tovar Herrera</span></p>
        </div>
    </footer>

<script src="./js/tourPinicio.js"></script>
<script defer src="./js/generalScript.js"></script>
<script src="./CONEXION/create_tables.php"></script>
</body>
</html>
