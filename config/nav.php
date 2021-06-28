<!-- START X-NAVIGATION VERTICAL -->
<ul class="x-navigation x-navigation-horizontal">
    <li class="xn-logo">
        <a href="index.html"><b>Skripsi&</b>Perpus</a>
        <a href="#" class="x-navigation-control"></a>
    </li>
    <li class="<?=isset($home)?'active':'';?>">
        <a href="<?=$base_url;?>"><span class="fa fa-home"></span> Home</a>
    </li>
    <?php if($_SESSION['akses']=='super_user'||$_SESSION['akses']=='administrator'||$_SESSION['akses']=='user'):?>
    <li class="xn-openable">
        <a href="#"><span class="fa fa-folder"></span> Master</a>
        <ul class="animated zoomIn">
            <li <?=isset($mahasiswa)?'class="active"':'';?>><a href="<?=$base_url;?>?mahasiswa"><span
                        class="fa fa-folder-o"></span>
                    Mahasiswa</a></li>
            <li <?=isset($dosen)?'class="active"':'';?>><a href="<?=$base_url;?>?dosen"><span
                        class="fa fa-folder-o"></span> Dosen</a></li>
            <?php if($_SESSION['akses']!='user'):?>
            <li <?=isset($pengguna)?'class="active"':'';?>><a href="<?=$base_url;?>?pengguna"><span
                        class="fa fa-folder-o"></span> Pengguna</a></li>
            <?php endif;?>
        </ul>
    </li>
    <li class="xn-openable">
        <a href="#"><span class="fa fa-folder"></span> Manajemen</a>
        <ul class="animated zoomIn">
            <li <?=isset($skripsi)?'class="active"':'';?>><a href="<?=$base_url;?>?skripsi"><span
                        class="fa fa-file-text"></span> Skripsi</a></li>
            <li <?=isset($arsip)?'class="active"':'';?>><a href="<?=$base_url;?>?arsip"><span
                        class="fa fa-archive"></span> Arsip</a></li>
            <li <?=isset($publikasi)?'class="active"':'';?>><a href="<?=$base_url;?>?publikasi"><span
                        class="fa fa-rocket"></span> Publikasi</a></li>
        </ul>
    </li>
    <li class="xn-openable">
        <a href="#"><span class="fa fa-folder"></span> Laporan</a>
        <ul class="animated zoomIn">
            <li><a href="<?=$base_url;?>proses/cetak_pencarian.php" target="_blank"><span class="fa fa-print"></span>
                    Laporan Pencarian</a></li>
            <li><a href="<?=$base_url;?>proses/cetak_skripsi.php" target="_blank"><span class="fa fa-print"></span>
                    Laporan Skripsi</a></li>
        </ul>
    </li>
    <?php endif;?>
    <?php if($_SESSION['akses']=='mahasiswa'):?>
    <li class="<?=isset($upload)?'active':'';?>">
        <a href="<?=$base_url;?>?upload_skripsi"><span class="fa fa-upload"></span> Upload Skripsi</a>
    </li>
    <?php endif;?>
    <li class="xn-openable">
        <a href="#"><span class="fa fa-cogs"></span> Pengaturan</a>
        <ul class="animated zoomIn">
            <li><a href="<?=$base_url;?>?profil"><span class="fa fa-cog"></span> Profile</a></li>
            <li><a href="<?=$base_url;?>?change_password"><span class="fa fa-cogs"></span> Change Password</a></li>
            <hr style="border:1px solid #ffffff;margin-bottom:0px;">
            <?php if($_SESSION['akses']=='super_user'):?>
            <li><a href="<?=$base_url;?>?backup_db"><span class="fa fa-hdd-o"></span> Backup Database</a></li>
            <hr style="border:1px solid #ffffff;margin-bottom:0px;">
            <li><a href="<?=$base_url;?>?backup_app"><span class="fa fa-hdd-o"></span> Backup App</a></li>
            <hr style="border:1px solid #ffffff;margin-bottom:0px;">
            <?php endif;?>
        </ul>
    </li>
    <!-- SIGN OUT -->
    <li class="pull-right" style="background-color:red;">
        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-power-off"></span> KELUAR</a>
    </li>
    <!-- END SIGN OUT -->
</ul>
<!-- END X-NAVIGATION VERTICAL -->