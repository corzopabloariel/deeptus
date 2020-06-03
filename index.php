<?php
function printElement($e) {
    echo $e;
}
$Arr = [];
$filename = ["us" => "assets/txt/us.txt", "service" => "assets/txt/service.txt"];
foreach($filename AS $k => $v) {
    if (file_exists($v))
        $Arr[$k] = file_get_contents($v, true);
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Deeptus</title>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.rawgit.com/konpa/devicon/df6431e323547add1b4cf45992913f15286456d3/devicon.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <script src="https://kit.fontawesome.com/773d0bcede.js"></script>
    </head>
    <body>
        <header class="header header__image">
            <div class="header__info d-flex align-items-center">
                <div class="container">
                    <i class="fas fa-envelope mr-2"></i><a>consultas@deeptus.com</a>
                </div>
            </div>
            <nav class="header__nav">
                <div class="container">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <svg class="header__logo" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
                                <image x="0" y="0" width="100%" xlink:href="assets/images/logo.jpeg" />
                            </svg>
                            <span class="header__name">deeptus</span>
                        </div>
                        <ul class="list-group list-group-horizontal align-items-center header__list mb-0 pb-0">
                            <li class="list-group-item"><a>Nosotros</a></li>
                            <li class="list-group-item"><a>Servicios</a></li>
                            <li class="list-group-item"><a>Portfolio</a></li>
                            <li class="list-group-item"><a>Contacto</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="header__slider"></div>
        </header>
        <section class="section">
            <div class="container">
                <?php printElement($Arr["us"]) ?>
            </div>
        </section>
        <section class="section section__important">
            <div class="container mision">
                <h4 class="mision__title w-50 text-right">Nuestra Misión</h4>
                <p class="text mision__text w-50 text-right">Nos motiva,</p>
                <p class="text mision__text w-50 text-right">Algo</p>
            </div>
        </section>
        <?php printElement($Arr["service"]) ?>
        <footer class="footer">
            <div class="container">
                <h5 class="footer--title"><span class="linea linea--150 linea--title linea--dark">Contáctenos</span></h5>
                <div class="row">
                    <div class="col-12 col-md-8">
                        <form action="assets/form/contacto.php" onsubmit="event.preventDefault();" method="post">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form--label" for="name">Nombre</label>
                                        <input type="text" name="name" id="name" require class="form-control form--input" placeholder="Nombre">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form--label" for="email">Email</label>
                                        <input type="email" name="email" id="email" require class="form-control form--input" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form--label" for="text">Consulta</label>
                                        <textarea name="text" id="text" rows="5" require class="form-control form--input" placeholder="Consulta"></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-12 col-md">
                        <p class="footer--info text-center"><i class="fas fa-at"></i></p>
                        <p class="footer--info footer--info__link text-center"><a>consultas@deeptus.com</a></p>
                    </div>
                </div>
            </div>
        </footer>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script src="assets/js/index.js"></script>
    </body>
</html>