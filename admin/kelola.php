<!DOCTYPE html>

<?php
include '../koneksi.php';
session_start();


$id = '';
$id_pasien = '';
$nama_pasien = '';
$jenis_kelamin ='';
$alamat = '';

if (isset($_GET['ubah'])) {
    $id = $_GET['ubah'];

    $query = "SELECT * FROM tb_pasien WHERE id = '$id';";
    $sql = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($sql);

    $id_pasien = $result ['id_pasien'];
    $nama_pasien = $result ['nama_pasien'];
    $jenis_kelamin = $result ['jenis_kelamin'];
    $alamat = $result ['alamat'];


    //var_dump($result);

    //die();
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/font-awesome.min.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <title>Crud-db</title>
</head>

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
        <div class="container">
            <form method="post" action="proses.php" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $id?>" name="id">
                <div class="mb-3 row">
                    <label for="id_pasien" class="col-sm-2 col-form-label">ID Pasien</label>
                    <div class="col-sm-10">
                        <input required type="text" name="id_pasien" class="form-control" id="id_pasien" placeholder="Ex: 7645" value="<?php echo $id_pasien ?>">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Pasien</label>
                    <div class="col-sm-10">
                        <input required type="text" name="nama_pasien" class="form-control" id="nama" placeholder="Ex: Satoshi" value="<?php echo $nama_pasien ?>">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="jkel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select required id="jkel" name="jenis_kelamin" class="form-select">
                            <option <?php if($jenis_kelamin == 'Laki-laki') {echo "selected";} ?> value="Laki-laki">Laki-laki</option>
                            <option <?php if($jenis_kelamin == 'Perempuan') {echo "selected";} ?> value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat Lengkap</label>
                    <div class="col-sm-10">
                        <textarea required class="form-control" name="alamat" id="alamat" rows="3"><?php echo $alamat ?></textarea>
                    </div>
                </div>
                <div class="mb-3 row mt-3">
                    <div class="col">
                        <?php
                        if (isset($_GET['ubah'])) {
                        ?>
                            <button type="submit" name="aksi" value="edit" class="btn btn-primary"><i class="fa fa-floppy-o mx-1" aria-hidden="true"></i>Simpan Perubahan</button>
                        <?php
                        } else {
                        ?>
                            <button type="submit" name="aksi" value="add" class="btn btn-primary"><i class="fa fa-floppy-o mx-1" aria-hidden="true"></i>Tambah</button>
                        <?php
                        }
                        ?>
                        <a href="index.php" type="button" class="btn btn-danger"><i class="fa fa-reply mx-1" aria-hidden="true"></i>Batal</a>
                    </div>
            </form>
        </div>



        <h6>Hello mom</h6>
</body>

</html>