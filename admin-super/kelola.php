<!DOCTYPE html>

<?php
include '../koneksi.php';
session_start();


$id = '';
$username = '';
$level ='';
$password = '';

if (isset($_GET['ubah'])) {
    $id = $_GET['ubah'];

    $query = "SELECT * FROM tb_login WHERE id = '$id';";
    $sql = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($sql);

    $username = $result ['username'];
    $password = $result ['password'];
    $level = $result ['level'];


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
    <title>tb_login</title>
</head>

<body>
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                php
            </a>
        </div>
    </nav>
    <div class="container">
        <h1 class="mt-3">Hotelku</h1>
        <figure>
            <blockquote class="blockquote">
                <p>db_hotel</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                tb_login <cite title="Source Title"> php</cite>
            </figcaption>
        </figure>
        <div class="container">
            <form method="post" action="proses.php" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $id?>" name="id">
                <div class="mb-3 row">
                    <label for="username" class="col-sm-2 col-form-label">username</label>
                    <div class="col-sm-10">
                        <input required type="text" name="username" class="form-control" id="username" placeholder="Ex:sadmin" value="<?php echo $username ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="password" class="col-sm-2 col-form-label">password</label>
                    <div class="col-sm-10">
                    <?php
                        if (isset($_GET['ubah'])) {
                        ?>
                            <input type="password" required class="form-control" name="password" id="password"  placeholder="Password" rows="3" value="<?php echo $password ?>"></input>
                        <?php
                        } else {
                        ?>
                            <input type="password" class="form-control mb-3" name="password" id="password" placeholder="Password" rows="3">
                        <?php
                        }
                        ?>
                        
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jkel" class="col-sm-2 col-form-label">level</label>
                    <div class="col-sm-10">
                        <select required id="jkel" name="level" class="form-select">
                            <option <?php if($level == 'admin') {echo "selected";} ?> value="admin">Admin</option>
                            <option <?php if($level == 'user') {echo "selected";} ?> value="user">User</option>
                        </select>
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