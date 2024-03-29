<div class="container-fluid ImagenCargaVideos ImagenFija">
    <div class="row">
        <div class="container ColorSecundarioFondoTranslucido">
            <div class="row">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-anico-tab" data-bs-toggle="pill" data-bs-target="#pills-anico" type="button" role="tab" aria-controls="pills-anico" aria-selected="true">Anico</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-ameritas-tab" data-bs-toggle="pill" data-bs-target="#pills-ameritas" type="button" role="tab" aria-controls="pills-ameritas" aria-selected="false">Ameritas</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-nationallife-tab" data-bs-toggle="pill" data-bs-target="#pills-nationallife" type="button" role="tab" aria-controls="pills-nationallife" aria-selected="false">National Life</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-anico" role="tabpanel" aria-labelledby="pills-anico-tab">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 col-sm-2 col-md-3 col-lg-3"></div>
                                <div class="col-12 col-sm-8 col-md-6 col-lg-6">
                                    <center>
                                        <img src="app/views/assets/img/Aseguradoras/AmericanNational.png" class="img-fluid" height="150px" width="150px" alt="Anico" title="Anico">
                                    </center><br><br>
                                    <form action="./?managment=ProcesoVideosVida" method="post">
                                        <table class="table table-hover table-success text-center text-dark table-responsive shadow p-3 mb-5">
                                            <thead>
                                                <tr>
                                                    <th colspan="2"><h2>Anico</h2></th>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        Seleccione
                                                    </th>
                                                    <th>
                                                        Nombre de Video
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($rows = mysqli_fetch_assoc($Anico)) :
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="id[]" value="<?= $rows['idVideo']; ?>" class="form-check-input">
                                                        </td>
                                                        <td>
                                                            <?= $rows['Nombre']; ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                                endwhile;
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td>
                                                        <label for="nombreanico">Editar</label>
                                                        <input type="text" name="nombreanico" id="nombreanico" class="form-control" placeholder="Ingrese Nombre a Cambiar">
                                                    </td>
                                                    <td>
                                                        <p>
                                                            <input type="submit" value="Editar" name="btnAnico" class="btn btn-outline-success">
                                                            <input type="submit" value="Eliminar" name="btnAnico" class="btn btn-outline-danger">
                                                        </p>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </form>
                                </div>
                                <div class="col-12 col-sm-2 col-md-3 col-lg-3"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-ameritas" role="tabpanel" aria-labelledby="pills-ameritas-tab">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 col-sm-2 col-md-3 col-lg-3"></div>
                                <div class="col-12 col-sm-8 col-md-6 col-lg-6">
                                    <center>
                                        <img src="app/views/assets/img/Aseguradoras/Ameritas.png" class="img-fluid" height="150px" width="150px" alt="Anico" title="Anico">
                                    </center><br><br>
                                    <form action="./?managment=ProcesoVideosVida" method="post">
                                        <table class="table table-hover table-success text-center text-dark table-responsive shadow p-3 mb-5">
                                            <thead>
                                                <tr>
                                                    <th colspan="2"><h2>Ameritas</h2></th>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        Seleccione
                                                    </th>
                                                    <th>
                                                        Nombre de Video
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($rows = mysqli_fetch_assoc($Ameritas)) :
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="id[]" value="<?= $rows['idVideo']; ?>" class="form-check-input">
                                                        </td>
                                                        <td>
                                                            <?= $rows['Nombre']; ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                                endwhile;
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td>
                                                        <label for="nombreameritas">Editar</label>
                                                        <input type="text" name="nombreameritas" id="nombreameritas" class="form-control" placeholder="Ingrese Nombre a Cambiar">
                                                    </td>
                                                    <td>
                                                        <p>
                                                            <input type="submit" value="Editar" name="btnAmeritas" class="btn btn-outline-success">
                                                            <input type="submit" value="Eliminar" name="btnAmeritas" class="btn btn-outline-danger">
                                                        </p>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </form>
                                </div>
                                <div class="col-12 col-sm-2 col-md-3 col-lg-3"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-nationallife" role="tabpanel" aria-labelledby="pills-nationallife-tab">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 col-sm-2 col-md-3 col-lg-3"></div>
                                <div class="col-12 col-sm-8 col-md-6 col-lg-6">
                                    <center>
                                        <img src="app/views/assets/img/Aseguradoras/NationalLifeGroup.png" class="img-fluid" height="150px" width="150px" alt="Anico" title="Anico">
                                    </center><br><br>
                                    <form action="./?managment=ProcesoVideosVida" method="post">
                                        <table class="table table-hover table-success text-center text-dark table-responsive shadow p-3 mb-5">
                                            <thead>
                                                <tr>
                                                    <th colspan="2"><h2>National Life</h2></th>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        Seleccione
                                                    </th>
                                                    <th>
                                                        Nombre de Video
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                <?php
                                                while ($rows = mysqli_fetch_assoc($NationalLife)) :
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="id[]" value="<?= $rows['idVideo']; ?>" class="form-check-input">
                                                        </td>
                                                        <td>
                                                            <?= $rows['Nombre']; ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                                endwhile;
                                                ?>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td>
                                                        <label for="nombrenationallife">Editar</label>
                                                        <input type="text" name="nombrenationallife" id="nombrenationallife" class="form-control" placeholder="Ingrese Nombre a Cambiar">
                                                    </td>
                                                    <td>
                                                        <p>
                                                            <input type="submit" name="btnNationalLife" value="Editar" class="btn btn-outline-success">
                                                            <input type="submit" name="btnNationalLife" value="Eliminar" class="btn btn-outline-danger">
                                                        </p>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </form>
                                </div>
                                <div class="col-12 col-sm-2 col-md-3 col-lg-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-white ColorPrincipalTranslucido" id="Contacto">
            <div class="container">
                <hr>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 text-center">
                        <img src="app/views/assets/img/LogoColorReal.png" alt="Select Insurance" height="80px" title="Select Insurance"><br><br>
                    </div>
                    <div class="col-12 col-md-1 col-lg-1"></div>
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3"><br><br>
                        <p><b>CONTÁCTENOS</b></p>
                    </div>
                    <div class="col-12 col-sm-6 col-md-2 col-lg-2"><br><br>
                        <p><b>ENLACES</b></p>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3"><br><br>
                        <p><b>ZONA DE AFILIADOS</b></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3 text-center">
                        <p class="fs-7">
                            Select Insurance And Financial
                            Services nace en el año 2009 teniendo
                            en cuenta la necesidad de las personas
                            como una compañía dedicada a la venta y el
                            asesoramiento de seguros de vida y hoy es
                            una compañía especializada en aseguramiento, plan
                            de retiro y planes de inversión.
                        </p>
                    </div>
                    <div class="col-12 col-md-1 col-lg-1"></div>
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">

                        <p class="lh-lg">
                            Tel.: (786) 216 1936 <br>

                            Email: contact@selectinsurance.info <br>

                            Skype: contact insurance <br>

                            Dirección: 7791 NW 46 ST. SUITE 112 DORAL, FL 33166 <br>
                        </p>
                    </div>
                    <div class="col-12 col-sm-6 col-md-2 col-lg-2">
                        <p class="lh-lg">
                            Cotizador Online <br>

                            Nuestros Servicios <br>

                            Testimonios <br>

                            Contacto <br>
                            <a href="?managment=login" style="text-decoration: none;" target="__blank">Administracion</a>
                        </p>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                        <p class="lh-lg">
                            FAQ <br>

                            Blog <br>

                            Crm <br>

                            Galería <br>
                        </p>
                    </div>
                </div>
                <h6 class="text-end">Copyright © <?php echo date('M') . ' ' . date('Y'); ?> Select Insurance.</h6><br>
            </div>
        </div>
    </div>
</div>