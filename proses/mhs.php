<?php
session_start();
include ('../config/connection.php');

if(isset($_POST['save'])){
    $nim = $_POST['nim'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jk = $_POST['jk'];
    $jenjang = $_POST['jenjang'];
    $program_studi = $_POST['program_studi'];

    $cek = mysqli_query($con,"SELECT * FROM mahasiswa WHERE nim='$nim'") or die(mysqli_error($con));
    if(mysqli_num_rows($cek)==0){
        $insert = mysqli_query($con,"INSERT INTO mahasiswa (idmahasiswa, nim, nama_lengkap, tempat_lahir, tanggal_lahir, jk, jenjang, program_studi) VALUES ('','$nim','$nama_lengkap','$tempat_lahir','$tanggal_lahir','$jk','$jenjang','$program_studi')") or die (mysqli_error($con));
        $msg = 'Berhasil menambahkan data mahasiswa';
    }else{
        $msg = 'Gagal menambahkan data mahasiswa';
    }
    $_SESSION['msg'] = $msg;
    header('Location:../?mahasiswa');
}
if(isset($_POST['edit'])){
    $id = $_POST['idmhs'];
    $nim = $_POST['nim'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jk = $_POST['jk'];
    $jenjang = $_POST['jenjang'];
    $program_studi = $_POST['program_studi'];

    $update = mysqli_query($con,"UPDATE mahasiswa SET nim='$nim', nama_lengkap='$nama_lengkap', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', jk='$jk', jenjang='$jenjang', program_studi='$program_studi' WHERE idmahasiswa='$id'") or die (mysqli_error($con));
    if($update){
        $msg = 'Berhasil mengubah data mahasiswa';
    }else{
        $msg = 'Gagal menngubah data mahasiswa';
    }
    $_SESSION['msg'] = $msg;
    header('Location:../?mahasiswa');
}
if (isset($_GET['id'])!="") {
    $id = $_GET['id'];
    $query = mysqli_query($con, "DELETE FROM mahasiswa WHERE idmahasiswa='$id'")or die(mysqli_error($con));
    if ($query) {
        $msg = "Data mahasiswa berhasil dihapus";
    }else{
        $msg = "Data mahasiswa gagal dihapus";
    }
    $_SESSION['msg'] = $msg;
    header('Location:../?mahasiswa');
}
?>