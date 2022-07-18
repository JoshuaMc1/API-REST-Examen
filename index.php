<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="API REST, API documentation">
    <meta name="keywords" content="HTML, CSS, JQuery">
    <meta name="author" content="Joshua Mclean">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAaVBMVEX///8AAACysrLCwsIwMDDMzMz7+/s6OjqUlJTc3NwODg6lpaV0dHTw8PAYGBhTU1NsbGweHh61tbXl5eW/v7/Nzc0qKiqfn5/V1dX19fVgYGBXV1d+fn4/Pz+EhIQ4ODiOjo5KSkqAgIDq39woAAACnElEQVR4nO3c7XKiMBSA4YKitmpdlVrKiv24/4tcx+kg9SQ0nJjoZt7nt8bzVqSg6MMDAAAAAAAAAAAAAAAAAAAAAAAAAAAA7CZVucmlslja7rE03FzalNXEtsKL0wJXyasO75ldPTdWFj13+Wm3L4yVf1zuvL5CX978+jCLrU/h0fjV0Lhwuqd3XzV1GvHgV3h8LkY3Kpw5T/joV3jcEG5S6PRS+FZ4Fmart/iF9aAJXzwLsyZ6odNDdPzY3ygKs7+RC/OhA467O0RNYTaLWrgcPuCHb2HW3V8FL9wrBuxsp7rC7nYaunCrGbCzx9cVZlW8woNqwPMOX1lYxyvUDZj7Fnb+RoELK91859eRtvB89Ba4cK4c0LtwH6twyPFaV7u71xZ+xir8/ZTJrD061RaeRw5c2HfO26d9GWkLd+2uJvAZ8Fis9VSMLhn+o/QV7sUCI7mpPLfvGFTl940M+4RFO8w1C+WNNsMK53KFVU9h61EuNZNLBSk0HJtTSCGFFFJIIYUUUkghhRRSmH7h5MLwQrHCXRVmzfTSbljhTizQPIkbrd/ELNEKnfi/EyWvWUiscCpnSaywlrMkVmjY4SZWWMlZ0ip8NsySVuFr8oXyv2FihaanMKnCxjhLSoWXl/8lV2j5qCydQtsVzckUWj/sTKSwMVxJnVSh4XA0pcIm7xvlvz7Hnzaf9Vdp3z7jFoZ4n2Zi/TrJbQoF//fanFCoQ+EJhRQ6olCHwhMKKXREoQ6FJxRS6IhCnTsovIfvW4QtjP+dmdiFgb/3RCGFFFJIIYUUUkghhRRSSKGLtVzMqbDsKTReeGgX+AxY/tKl4Zqsrfwtyva6CsNvX5qvy7OK+NuXAAAAAAAAAAAAAAAAAAAAAAAAAAAAyfgHaMFGJdbioEkAAAAASUVORK5CYII=" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Manual para usar API REST</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: system-ui, sans-serif;
            background: -webkit-linear-gradient(to right, #264653, #2a9d8f);
            background: linear-gradient(to right, #264653, #2a9d8f);
        }

        .bg-gradient-primary {
            background: linear-gradient(to right, #264653, #2a9d8f);
        }

        .mt-n4 {
            margin-top: -1.5rem !important;
        }

        .z-index-2 {
            z-index: 2 !important;
        }

        .border-radius-lg {
            border-radius: 0.5rem;
        }

        .text-capitalize {
            text-transform: capitalize !important;
        }

        .bg-twitter {
            background-color: #55ACEE;
        }

        .bg-twitter:hover {
            background-color: #6AB5EE;
        }

        .bg-facebook {
            background-color: #3B5998;
        }

        .bg-facebook:hover {
            background-color: #4F689B;
        }

        .bg-dark2 {
            background-color: #212529;
        }

        .bg-dark2:hover {
            background-color: #2F3336;
        }
    </style>
</head>

<body>
    <div class="container my-4">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="card bg-light">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 mb-5 mt-3">
                            <h3 class="fw-bold text-center">Documentación</h3>
                        </div>
                        <div class="col-lg-12 mb-3 py-4">
                            <div class="card">
                                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                    <div class="bg-gradient-primary shadow border-radius-lg pt-4 pb-3">
                                        <h5 class="text-white text-capitalize ps-3">Para que sirve</h5>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="text-dark fs-5">Esta API sirve para todas las operaciones basicas de
                                        un
                                        <span class="fw-bold">CRUD</span>, con el fin de agilizar la programación de
                                        la aplicación movil, esta API permite listar todos los contactos, buscar
                                        contactos por ID y por el Nombre, actualizar contactos y eliminar contactos.
                                    </p>
                                    <p class="text-dark fs-5">La API esta escrita en el lenguaje de programación
                                        <span class="fw-bold">PHP</span> y utiliza la base de datos de <span class="fw-bold">MySQL</span>.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3 py-4" id="method">
                            <div class="card">
                                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                    <div class="bg-gradient-primary shadow border-radius-lg pt-4 pb-3">
                                        <h5 class="text-white text-capitalize ps-3">Rutas</h5>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <span class="fw-bold fs-5">Se admiten todos los métodos HTTP. Puede utilizar http o https para sus solicitudes.</span>
                                    <div class="row">
                                        <div class="col-lg-12 my-2">
                                            <div class="card bg-light">
                                                <div class="card-body">
                                                    <div class="card-title">
                                                        <h6 class="fw-bold">Metodo GET</h6>
                                                    </div>
                                                    <div class="card-text">
                                                        <ol>
                                                            <li>
                                                                <span class="fw-bold">Obtener toda la lista <i class="fas fa-arrow-right"></i> </span><a href="<?php echo  "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . "api/read.php" ?>"><?php echo  "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . "api/read" ?></a>
                                                            </li>
                                                            <li>
                                                                <span class="fw-bold">Obtener un contacto por ID <i class="fas fa-arrow-right"></i> </span><a href="<?php echo  "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . "api/single_read.php?id=1" ?>"><?php echo  "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . "api/single_read?id=1" ?></a>
                                                            </li>
                                                            <li>
                                                                <span class="fw-bold">Obtener un contacto por Nombre <i class="fas fa-arrow-right"></i> </span><a href="<?php echo  "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . "api/single_read.php?nombre=Joshua" ?>"><?php echo  "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . "api/single_read?nombre=Joshua" ?></a></span>
                                                            </li>
                                                        </ol>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 my-2">
                                            <div class="card bg-light">
                                                <div class="card-body">
                                                    <div class="card-title">
                                                        <h6 class="fw-bold">Metodo POST</h6>
                                                    </div>
                                                    <div class="card-text">
                                                        <ol>
                                                            <li>
                                                                <span class="fw-bold">Crear contacto <i class="fas fa-arrow-right"></i> </span><a href="<?php echo  "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . "api/create.php" ?>"><?php echo  "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . "api/create" ?></a>
                                                            </li>
                                                            <li>
                                                                <span class="fw-bold">Actualizar/Editar contacto <i class="fas fa-arrow-right"></i> </span><a href="<?php echo  "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . "api/update.php" ?>"><?php echo  "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . "api/update" ?></a>
                                                            </li>
                                                        </ol>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 my-2">
                                            <div class="card bg-light">
                                                <div class="card-body">
                                                    <div class="card-title">
                                                        <h6 class="fw-bold">Metodo DELETE</h6>
                                                    </div>
                                                    <div class="card-text">
                                                        <ol>
                                                            <li>
                                                                <span class="fw-bold">Eliminar contacto <i class="fas fa-arrow-right"></i> </span><a href="<?php echo  "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . "api/delete.php" ?>"><?php echo  "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . "api/delete" ?></a>
                                                            </li>
                                                        </ol>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-muted">Es necesario implementar el metodo mecionado de lo contrario no se podra acceder al servicio requerido.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3 py-4">
                            <div class="card">
                                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                    <div class="bg-gradient-primary shadow border-radius-lg pt-4 pb-3">
                                        <h5 class="text-white text-capitalize ps-3">A tener en cuenta</h5>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="card-text">
                                        <p>Los metodos <span class="fw-bold">POST y DELETE</span>, necesitan ciertos parametros, estos parametros son <span class="fw-bold">extrictamente requeridos</span>, a continuación se le explicara como deben llamarse los parametros y que tipo de dato es el solicitado.</p>
                                        <div class="row">
                                            <div class="col-lg-6 my-2">
                                                <div class="card bg-light">
                                                    <div class="card-body">
                                                        <div class="card-title">
                                                            <h6 class="fw-bold">Crear contacto <a href="#method"><i class="fas fa-thumbtack text-secondary"></i></a></h6>
                                                        </div>
                                                        <div class="card-text mt-2">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">Parametro</th>
                                                                        <th scope="col">Tipo de dato</th>
                                                                        <th scope="col">Metodo</th>
                                                                        <th scope="col">Estricto</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>nombre</td>
                                                                        <td><span class="fw-bold text-success">String <span class="text-danger"> (Maximo 50 caracteres)</span></span></td>
                                                                        <td class=" text-center"><span class="badge bg-success">POST</span></td>
                                                                        <td class=" text-center"><span class="badge bg-danger">Si</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>telefono</td>
                                                                        <td><span class="fw-bold text-success">String <span class="text-danger"> (Maximo 15 caracteres)</span></span></td>
                                                                        <td class=" text-center"><span class="badge bg-success">POST</span></td>
                                                                        <td class=" text-center"><span class="badge bg-danger">Si</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>longitude</td>
                                                                        <td><span class="fw-bold text-success">String <span class="text-danger"> (Maximo 30 caracteres)</span></span></td>
                                                                        <td class=" text-center"><span class="badge bg-success">POST</span></td>
                                                                        <td class=" text-center"><span class="badge bg-danger">Si</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>latitude</td>
                                                                        <td><span class="fw-bold text-success">String <span class="text-danger"> (Maximo 30 caracteres)</span></span></td>
                                                                        <td class=" text-center"><span class="badge bg-success">POST</span></td>
                                                                        <td class=" text-center"><span class="badge bg-danger">Si</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>firma</td>
                                                                        <td><span class="fw-bold text-success">Imagen <span class="text-danger"> (Debe estar en Base64)</span></span></td>
                                                                        <td class=" text-center"><span class="badge bg-success">POST</span></td>
                                                                        <td class=" text-center"><span class="badge bg-danger">Si</span></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 my-2">
                                                <div class="card bg-light">
                                                    <div class="card-body">
                                                        <div class="card-title">
                                                            <h6 class="fw-bold">Eliminar contacto <a href="#method"><i class="fas fa-thumbtack text-secondary"></i></a></h6>
                                                        </div>
                                                        <div class="card-text mt-2">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">Parametro</th>
                                                                        <th scope="col">Tipo de dato</th>
                                                                        <th scope="col">Metodo</th>
                                                                        <th scope="col">Estricto</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>id</td>
                                                                        <td><span class="fw-bold text-success">String/Int <span class="text-danger"> (Solo números)</span></span></td>
                                                                        <td class=" text-center"><span class="badge bg-success">GET</span></td>
                                                                        <td class=" text-center"><span class="badge bg-danger">Si</span></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 my-2">
                                                <div class="card bg-light">
                                                    <div class="card-body">
                                                        <div class="card-title">
                                                            <h6 class="fw-bold">Actualizar/Editar contacto <a href="#method"><i class="fas fa-thumbtack text-secondary"></i></a></h6>
                                                        </div>
                                                        <div class="card-text mt-2">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">Parametro</th>
                                                                        <th scope="col">Tipo de dato</th>
                                                                        <th scope="col">Metodo</th>
                                                                        <th scope="col">Estricto</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>id</td>
                                                                        <td><span class="fw-bold text-success">String/Int <span class="text-danger"> (Solo números)</span></span></td>
                                                                        <td class=" text-center"><span class="badge bg-success">POST</span></td>
                                                                        <td class=" text-center"><span class="badge bg-danger">Si</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>nombre</td>
                                                                        <td><span class="fw-bold text-success">String <span class="text-danger"> (Maximo 50 caracteres)</span></span></td>
                                                                        <td class=" text-center"><span class="badge bg-success">POST</span></td>
                                                                        <td class=" text-center"><span class="badge bg-danger">Si</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>telefono</td>
                                                                        <td><span class="fw-bold text-success">String <span class="text-danger"> (Maximo 15 caracteres)</span></span></td>
                                                                        <td class=" text-center"><span class="badge bg-success">POST</span></td>
                                                                        <td class=" text-center"><span class="badge bg-danger">Si</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>longitude</td>
                                                                        <td><span class="fw-bold text-success">String <span class="text-danger"> (Maximo 30 caracteres)</span></span></td>
                                                                        <td class=" text-center"><span class="badge bg-success">POST</span></td>
                                                                        <td class=" text-center"><span class="badge bg-danger">Si</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>latitude</td>
                                                                        <td><span class="fw-bold text-success">String <span class="text-danger"> (Maximo 30 caracteres)</span></span></td>
                                                                        <td class=" text-center"><span class="badge bg-success">POST</span></td>
                                                                        <td class=" text-center"><span class="badge bg-danger">Si</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>firma</td>
                                                                        <td><span class="fw-bold text-success">Imagen <span class="text-danger"> (Debe estar en Base64)</span></span></td>
                                                                        <td class=" text-center"><span class="badge bg-success">POST</span></td>
                                                                        <td class=" text-center"><span class="badge bg-success">No</span></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 py-4">
                            <div class="card">
                                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                    <div class="bg-gradient-primary shadow border-radius-lg pt-4 pb-3">
                                        <h5 class="text-white text-capitalize ps-3">Desarrollada por:</h5>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <a href="https://github.com/JoshuaMc1">
                                                <img src="perfil.jpg" class="img-fluid rounded-pill" alt="Foto de perfil">
                                            </a>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="row mb-3">
                                                <div class="col-lg-12">Nombre: </div>
                                                <div class="col-lg-12 fw-bold fs-6">Joshua David Mclean Escaleras</div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-lg-12">Correo: </div>
                                                <div class="col-lg-12 fw-bold fs-6"><a href="mailto:joshua15mclean@gmail.com">joshua15mclean@gmail.com</a></div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-lg-12 mb-2">Redes sociales: </div>
                                                <div class="col-lg-6 fw-bold mb-2 fs-5">
                                                    <div class="d-grid"><a class="btn bg-twitter btn-sm text-white" href="https://twitter.com/JosDav0" role="button"><i class="fab fa-twitter"></i> Twitter</a></div>
                                                </div>
                                                <div class="col-lg-6 fw-bold mb-2 fs-5">
                                                    <div class="d-grid"><a class="btn bg-facebook btn-sm text-white" href="https://www.facebook.com/david.mclean.79069" role="button"><i class="fab fa-facebook"></i> Facebook</a></div>
                                                </div>
                                                <div class="col-lg-12 fw-bold fs-5">
                                                    <div class="d-grid"><a class="btn bg-dark2 btn-sm text-white" href="https://github.com/JoshuaMc1/API-REST-Examen" role="button"><i class="fab fa-github"></i> GitHub</a></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 fw-bold fs-6">Integrante del grupo 5 de la clase Programación Movil 1</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>

    </script>
</body>

</html>