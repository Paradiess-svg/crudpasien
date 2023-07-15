<?php
include '../koneksi.php';
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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../datatables/datatables.css">
    <script src="../datatables/datatables.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>

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
        <a href="kelola.php" type="button" class="btn btn-primary mb-3"> <i class="fa fa-plus"></i>Tambahkan data</a>
        <a href="log.php" type="button" class="btn btn-primary mb-3"> <i class="fa fa-user-plus"></i> Super Admin</a>
        <a href="../logout.php" type="button" class="btn btn-primary mb-3"> <i class="fa fa-user-times"></i> Logout</a>


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
            <table id="dt" class="table align-middle table-striped table-hover ">
                <thead>
                    <tr>
                        <th scope="col">
                            <center>No</center>
                        </th>
                        <th scope="col">ID Pasien</th>
                        <th scope="col">Nama Pasien</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
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
                            <td>
                                <a href="kelola.php?ubah=<?php echo $result['id']; ?>" type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $result['id']?>"><i class="fa fa-trash"></i></button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal<?= $result['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-danger fw-bold" id="exampleModalLabel">Konfirmasi</h5>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h4 class="text-warning"><b>Perhatian! data yang terhapus tak dapat di pulihkan</b></h4>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <a href="proses.php?hapus=<?php echo $result['id']; ?>" type="button" class="btn btn-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
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