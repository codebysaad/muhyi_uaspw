<?php
session_start();
include ('../config/connection.php');

if(isset($_POST['save'])){
    $nip = $_POST['nip'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jk = $_POST['jk'];
    $telp = $_POST['jenjang'];
    $alamat = $_POST['alamat'];

    $cek = mysqli_query($con,"SELECT * FROM dosen WHERE nip='$nip'") or die(mysqli_error($con));
    if(mysqli_num_rows($cek)==0){
        $insert = mysqli_query($con,"INSERT INTO dosen (iddosen, nip, nama_lengkap, tempat_lahir, tanggal_lahir, jk, telp, alamat) VALUES ('','$nip','$nama_lengkap','$tempat_lahir','$tanggal_lahir','$jk','$telp','$alamat')") or die (mysqli_error($con));
        $msg = 'Berhasil menambahkan data dosen';
    }else{
        $msg = 'Gagal menambahkan data dosen';
    }
    $_SESSION['msg'] = $msg;
    header('Location:../?dosen');
}
if(isset($_POST['edit'])){
    $id = $_POST['iddosen'];
    $nip = $_POST['nip'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jk = $_POST['jk'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    $update = mysqli_query($con,"UPDATE dosen SET nip='$nip', nama_lengkap='$nama_lengkap', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', jk='$jk', telp='$telp', alamat='$alamat' WHERE iddosen='$id'") or die (mysqli_error($con));
    if($update){
        $msg = 'Berhasil mengubah data dosen';
    }else{
        $msg = 'Gagal menngubah data dosen';
    }
    $_SESSION['msg'] = $msg;
    header('Location:../?dosen');
}
if (isset($_GET['id'])!="") {
    $id = $_GET['id'];
    $query = mysqli_query($con, "DELETE FROM dosen WHERE iddosen='$id'")or die(mysqli_error($con));
    if ($query) {
        $msg = "Data dosen berhasil dihapus";
    }else{
        $msg = "Data dosen gagal dihapus";
    }
    $_SESSION['msg'] = $msg;
    header('Location:../?dosen');
}
?>