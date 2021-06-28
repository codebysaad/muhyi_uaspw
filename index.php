<?php
    session_start();
    include ('config/connection.php');
    // $base_url = "http://localhost/skripsi-library/";
    $base_url= ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
    $base_url.= "://".$_SERVER['HTTP_HOST'];
    $base_url.= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
    if($_SESSION['username']=="" && $_SESSION['akses']==""):
        header("Location:".$base_url."login.php");
    else:
        include('config/header.php');
?>

<body>
    <!-- START PAGE CONTAINER -->
    <div class="page-container page-navigation-top">
        <!-- PAGE CONTENT -->
        <div class="page-content">
            <?php
                if(isset($_GET['backup_app'])){
                    include ('proses/backup_app.php');
                }
                else if(isset($_GET['backup_db'])){
                    include ('proses/backup_db.php');
                }
                else if(isset($_GET['mahasiswa'])){
                    $mahasiswa = true;
                    $hal = 'hal/data/mahasiswa.php';
                }
                else if(isset($_GET['dosen'])){
                    $dosen = true;
                    $hal = 'hal/data/dosen.php';
                }
                else if(isset($_GET['pengguna'])){
                    $pengguna = true;
                    $hal = 'hal/data/pengguna.php';
                }
                else if(isset($_GET['upload_skripsi'])){
                    $upload = true;
                    $hal = 'hal/form/upload_skripsi.php';
                }
                else if(isset($_GET['profil'])){
                    $upload = true;
                    $hal = 'hal/form/profil.php';
                }
                else if(isset($_GET['change_password'])){
                    $upload = true;
                    $hal = 'hal/form/change_password.php';
                }
                else if(isset($_GET['skripsi'])){
                    $skripsi = true;
                    $hal = 'hal/data/skripsi.php';
                }
                else if(isset($_GET['arsip'])){
                    $arsip = true;
                    $hal = 'hal/data/arsip.php';
                }
                else if(isset($_GET['publikasi'])){
                    $publikasi = true;
                    $hal = 'hal/data/publikasi.php';
                }
                else if(isset($_GET['aktifkan_keys'])){
                    $hal = 'proses/aktifkan_key.php';
                }
                else if(isset($_GET['result_detail'])){
                    $hal = 'hal/data/result_detail.php';
                }
                else{
                    $home = true;
                    $hal = 'hal/data/dashboard.php';
                }
                include('config/nav.php');
                include ($hal);
            ?>
        </div>
        <!-- END PAGE CONTENT -->
    </div>
    <!-- END PAGE CONTAINER -->
    <?php include('config/footer.php');?>
</body>

</html>
<?php endif;?>