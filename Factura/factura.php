<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">

    <title>Sistema Factura</title>
</head>

<body>




    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="#" class="navbar-brand">Factura</a>

    </nav>

    <div class="container p-4">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">

                        <form id="task-form">

                            <!-- <div class="form-group">

                                <label for="">Cliente</label>
                                <select name="" id="" class="form-control">
                                    <?php
                                    require_once 'includes/database.php';
                                    $sql = "SELECT * FROM clientes";
                                    $res = pg_query($conn, $sql);

                                    while ($row = pg_fetch_array($res)) {
                                        $cliente = $row['nombre'];
                                        $rif_ci = $row['ci']; ?>

                                        <option value="<?= $cliente ?>"><?= $cliente ?> / <?= $rif_ci ?> </option>
                                    <?php } ?>

                                </select>
                            </div> -->

                            <div class="form-group">
                                <input type="text" name="" id="search" placeholder="Articulo" class="form-control">
                                <input type="number" name="" id="cantidad" placeholder="Cantidad" class="form-control">
                            </div>
                            <input type="submit" value="Agregar" class="btn btn-primary btn-block text-center">

                        </form>

                    </div>
                </div>

            </div>
            <div class="col-md-7">

                <div class="card my-4" id="task-result">
                    <div class="card-body">
                        <h5>Resultado</h5>
                        <ul id="container">


                        </ul>
                    </div>
                </div>


                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Cantidad</td>
                            <td>Articulo</td>
                            <td>Precio</td>
                        </tr>
                    </thead>
                    <tbody id="tasks"></tbody>
                </table>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="./includes/app.js"></script>

</body>

</html>