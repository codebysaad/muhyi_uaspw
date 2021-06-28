<?php

if($_GET['lvl']=='mahasiswa'){
    $query = mysqli_query($con, "SELECT * FROM mahasiswa")or die(mysqli_error($con));
    while ($data = mysqli_fetch_array($query)) {
        $cek = mysqli_query($con, "SELECT * FROM users WHERE user_name='".$data['nim']."'")or die(mysqli_error($con));
        if(mysqli_num_rows($cek)==0){
            $insert = mysqli_query($con, "INSERT INTO users (idusers, user_name, user_password, user_fullname, user_type, is_active, is_block) VALUES ('','".$data['nim']."','".password_hash($data['nim'],PASSWORD_DEFAULT)."','".$data['nama_lengkap']."','mahasiswa',1,0)")or die (mysqli_error($con));
            if($insert){
                $msg = 'Semua mahasiswa telah diaktifkan kunci';
            }else{
                $msg = 'Gagal mengaktifkan kunci';
            }
        }else{
            $msg = 'Semua kunci telah di aktifkan';
        }
    }
    $_SESSION['msg'] = $msg;
    header('Location:'.$base_url.'?mahasiswa');
}
if($_GET['lvl']=='dosen'){
    function delSpace($str){
        return implode('',explode(' ',$str));
    }
    $query = mysqli_query($con, "SELECT * FROM dosen")or die(mysqli_error($con));
    while ($data = mysqli_fetch_array($query)) {
        $cek = mysqli_query($con, "SELECT * FROM users WHERE user_name='".delSpace($data['nip'])."'")or die(mysqli_error($con));
        if(mysqli_num_rows($cek)==0){
            $insert = mysqli_query($con, "INSERT INTO users (idusers, user_name, user_password, user_fullname, user_type, is_active, is_block) VALUES ('','".delSpace($data['nip'])."','".password_hash(delSpace($data['nip']),PASSWORD_DEFAULT)."','".$data['nama_lengkap']."','dosen',1,0)")or die (mysqli_error($con));
            if($insert){
                $msg = 'Semua dosen telah diaktifkan kunci';
            }else{
                $msg = 'Gagal mengaktifkan kunci';
            }
        }else{
            $msg = 'Semua kunci telah di aktifkan';
        }
    }
    $_SESSION['msg'] = $msg;
    header('Location:'.$base_url.'?dosen');
}

?>