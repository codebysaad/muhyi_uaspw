<?php
session_start();
include ('../config/connection.php');

if($_GET['act']=='arsip' && isset($_GET['id'])!=''){
    $id = $_GET['id'];
    $view = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM skripsi WHERE idskripsi='$id'"))or die(mysqli_error($con));
    $insert = mysqli_query($con, "INSERT INTO arsip (idarsip,judul,tanggal_lulus,nim,nama_lengkap,abstrak,file,upload_at,upload_by) VALUES ('','".$view['judul']."','".$view['tanggal_lulus']."','".$view['nim']."','".$view['nama_lengkap']."','".$view['abstrak']."','".$view['file']."','".$view['upload_at']."','".$view['upload_by']."')")or die (mysqli_error($con));
    // var_dump($insert);die;
    if($insert){
        copy('../uploads/'.$view['file'],'../uploads/arsip/'.$view['file']);
        unlink('../uploads/'.$view['file']);
        mysqli_query($con,"DELETE FROM skripsi WHERE idskripsi='$id'")or die(mysqli_error($con));
    }
    $_SESSION['msg'] = 'File skripsi berhasil di pindahkan ke arsip';
    header('Location:../?skripsi');
}
if($_GET['act']=='rearsip' && isset($_GET['id'])!=''){
    $id = $_GET['id'];
    $view = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM publikasi WHERE idpublikasi='$id'"))or die(mysqli_error($con));
    $insert = mysqli_query($con, "INSERT INTO arsip (idarsip,judul,tanggal_lulus,nim,nama_lengkap,abstrak,file,upload_at,upload_by) VALUES ('','".$view['judul']."','".$view['tanggal_lulus']."','".$view['nim']."','".$view['nama_lengkap']."','".$view['abstrak']."','".$view['file']."','".$view['upload_at']."','".$view['upload_by']."')")or die (mysqli_error($con));
    // var_dump($insert);die;
    if($insert){
        copy('../uploads/'.$view['file'],'../uploads/arsip/'.$view['file']);
        unlink('../uploads/'.$view['file']);
        mysqli_query($con,"DELETE FROM publikasi WHERE idpublikasi='$id'")or die(mysqli_error($con));
    }
    $_SESSION['msg'] = 'File publikasi berhasil di pindahkan ke arsip';
    header('Location:../?publikasi');
}
if($_GET['act']=='publikasi' && isset($_GET['id'])!=''){
    $id = $_GET['id'];
    $view = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM skripsi WHERE idskripsi='$id'"))or die(mysqli_error($con));
    $insert = mysqli_query($con, "INSERT INTO publikasi (idpublikasi,judul,tanggal_lulus,nim,nama_lengkap,abstrak,file,upload_at,upload_by) VALUES ('','".$view['judul']."','".$view['tanggal_lulus']."','".$view['nim']."','".$view['nama_lengkap']."','".$view['abstrak']."','".$view['file']."','".$view['upload_at']."','".$view['upload_by']."')")or die (mysqli_error($con));
    // var_dump($insert);die;
    if($insert){
        copy('../uploads/'.$view['file'],'../uploads/publikasi/'.$view['file']);
        unlink('../uploads/'.$view['file']);
        mysqli_query($con,"DELETE FROM skripsi WHERE idskripsi='$id'")or die(mysqli_error($con));
    }
    $_SESSION['msg'] = 'File skripsi berhasil di pindahkan ke publikasi';
    header('Location:../?skripsi');
}
if($_GET['act']=='republikasi' && isset($_GET['id'])!=''){
    $id = $_GET['id'];
    $view = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM arsip WHERE idarsip='$id'"))or die(mysqli_error($con));
    $insert = mysqli_query($con, "INSERT INTO publikasi (idpublikasi,judul,tanggal_lulus,nim,nama_lengkap,abstrak,file,upload_at,upload_by) VALUES ('','".$view['judul']."','".$view['tanggal_lulus']."','".$view['nim']."','".$view['nama_lengkap']."','".$view['abstrak']."','".$view['file']."','".$view['upload_at']."','".$view['upload_by']."')")or die (mysqli_error($con));
    // var_dump($insert);die;
    if($insert){
        copy('../uploads/'.$view['file'],'../uploads/publikasi/'.$view['file']);
        unlink('../uploads/'.$view['file']);
        mysqli_query($con,"DELETE FROM arsip WHERE idarsip='$id'")or die(mysqli_error($con));
    }
    $_SESSION['msg'] = 'File arsip berhasil di pindahkan ke publikasi';
    header('Location:../?arsip');
}
?>