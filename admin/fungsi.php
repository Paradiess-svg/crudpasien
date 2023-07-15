<?php
include '../koneksi.php';
function tambah_data($data){

    $id_pasien = $data['id_pasien'];
    $nama_pasien = $data['nama_pasien'];
    $jenis_kelamin = $data['jenis_kelamin'];
    $alamat = $data['alamat'];

    $query = "INSERT INTO tb_pasien VALUES(null, '$id_pasien','$nama_pasien',  '$jenis_kelamin',  '$alamat')";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

function ubah_data($data){
    $id = $data['id'];
    $id_pasien = $data['id_pasien'];
    $nama_pasien = $data['nama_pasien'];
    $jenis_kelamin = $data['jenis_kelamin'];
    $alamat = $data['alamat'];

    $queryshow = "SELECT * FROM tb_pasien WHERE id = '$id';";
    $sqlshow = mysqli_query($GLOBALS['conn'], $queryshow);
    $result = mysqli_fetch_assoc($sqlshow);

    $query = "UPDATE tb_pasien SET id_pasien='$id_pasien', nama_pasien='$nama_pasien', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat' WHERE id='$id';";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

function hapus_data($data){
    $id = $data['hapus'];

    $queryshow = "SELECT * FROM tb_pasien WHERE id = '$id';";
    $sqlshow = mysqli_query($GLOBALS['conn'] , $queryshow);
    $result = mysqli_fetch_assoc($sqlshow);

    $query="DELETE FROM tb_pasien WHERE id = '$id' ;";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;

}

?>