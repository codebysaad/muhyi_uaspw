<?php
session_start();
include ('../config/connection.php');
if(isset($_POST['upload'])){
    // var_dump($userid);die;
    $judul  = $_POST['judul'];
    $tanggal_lulus      = $_POST['tanggal_lulus'];
    $nim      = $_POST['nim'];
    $nama_lengkap      = $_POST['nama_lengkap'];
    $abstrak      = $_POST['abstrak'];
    $tanggal     = date('Y-m-d');
    $userid  = $_SESSION['iduser'];
    $file       = $_FILES['file'];
    // $msg        = "";
    $filename    = $_FILES['file']['name'];
    $filetmp     = $_FILES['file']['tmp_name'];
    $filesize    = $_FILES['file']['size'];
    $filetype    = $_FILES['file']['type'];
    $fileext     = explode('.', $filename);
    $fileactext  = strtolower(end($fileext));
    $allowed    = array('pdf');

    if($filename!=""){
        if (in_array($fileactext, $allowed)) {
            if ($filesize<51200000) {
                $filenew = $nim."-".$nama_lengkap."-".date('YmdHis').".".$fileactext;
                $filefolder = '../uploads/'.$filenew;
                move_uploaded_file($filetmp, $filefolder);
                    
                $query = mysqli_query($con, "INSERT INTO skripsi (idskripsi,judul,tanggal_lulus,nim,nama_lengkap,abstrak,file,upload_at,upload_by) VALUES ('','$judul','$tanggal_lulus','$nim','$nama_lengkap','$abstrak','$filenew','$tanggal','$userid')") or die (mysqli_error($con));
                    
                if ($query) {
                    $msg = "Anda berhasil mengupload Tugas Akhir/Skripsi";
                    // $_SESSION['msg']=$msg;
                }else{
                    $msg = "Anda gagal mengupload Tugas Akhir/Skripsi";
                    // $_SESSION['msg']=$msg;
                }
            }else{
                $msg = "Ukuran file yang anda upload terlalu besar.";
                // $_SESSION['msg']=$msg;
            }
        }else{
            $msg = "Format file yang anda upload tidak sesuai.";
            // header("location:?pemasukan&msg=atgerr");
        }
    }
    $_SESSION['msg']=$msg;
    header('Location:../?upload_skripsi');    
}
?>