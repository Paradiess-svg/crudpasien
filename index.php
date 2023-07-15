<?php
include 'koneksi.php';
session_start();

$query = "SELECT * FROM tb_pasien;";
$sql = mysqli_query($conn, $query);
$no = 0;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="datatables/datatables.css">
    <script src="datatables/datatables.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

    <title>Crud-db</title>
</head>

<script>
    $(document).ready(function() {
        $('#dt').DataTable();
    });
</script>

<body>
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                crudphpnative-test
            </a>
        </div>
    </nav>
    <div class="container">
        <h1 class="mt-3">Data Pasien</h1>
        <figure>
            <blockquote class="blockquote">
                <p>Data database</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                crud-db <cite title="Source Title"> crudphpnative-test</cite>
            </figcaption>
        </figure>
        
        <a href="logout.php" type="button" class="btn btn-primary mb-3"> <i class="fa fa-user-times"></i> Logout</a>

        <?php
        if (isset($_SESSION['eksekusi'])) :
        ?>

            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>
                    <?php
                    echo $_SESSION['eksekusi'];
                    ?>
                </strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php

            session_destroy();
        endif;
        ?>

        <div class="table-responsive">
            <table id="dt" class="table align-middle table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">
                            <center>No</center>
                        </th>
                        <th scope="col">ID Pasien</th>
                        <th scope="col">Nama Pasien</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while (
                        $result = mysqli_fetch_assoc($sql)
                    ) {
                    ?>
                        <tr>
                            <th scope="row">
                                <center><?php echo ++$no; ?>.</center>
                            </th>
                            <td><?php echo $result['id_pasien']; ?></td>
                            <td><?php echo $result['nama_pasien']; ?></td>
                            <td class="fw-bolder"><?php echo $result['jenis_kelamin']; ?></td>
                            <td><?php echo $result['alamat']; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="m-5 align-middle align-center">
        <h6>Hello mom tinggal upload git</h6>
    </div>


</body>

</html>