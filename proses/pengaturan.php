<?php
session_start();
include ('../config/connection.php');

if(isset($_POST['profil'])){
    $id = $_POST['user_id'];
    $user_name = $_POST['user_name'];
    $user_fullname = $_POST['user_fullname'];
    $user_telp = $_POST['user_telp'];
    $user_bio = $_POST['user_bio'];

    $query = mysqli_query($con,"UPDATE users SET user_name='$user_name',user_fullname='$user_fullname',user_telp='$user_telp',user_bio='$user_bio' WHERE idusers='$id'")or die (mysqli_error($con));
    if($query){
        $msg = 'Profil anda berhasil di update';
    }else{
        $msg = 'Profil anda gagal di update';
    }
    $_SESSION['msg'] = $msg;
    header('Location:../?profil');
}
if(isset($_POST['change'])){
    $id = $_POST['user_id'];
    $user_password =password_hash($_POST['password'],PASSWORD_DEFAULT);

    $query = mysqli_query($con,"UPDATE users SET user_password='$user_password' WHERE idusers='$id'")or die (mysqli_error($con));
    if($query){
        $msg = 'Password anda berhasil di ubah';
    }else{
        $msg = 'Password anda gagal di ubah';
    }
    $_SESSION['msg'] = $msg;
    header('Location:../?change_password');
}
?>