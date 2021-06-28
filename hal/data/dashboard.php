<?php
error_reporting(0);
    function hitung($table){
        include($_SERVER['DOCUMENT_ROOT'].'/skripsi_library/config/connection.php');
        $query = mysqli_query($con,"SELECT * FROM $table")or die (mysqli_error($con));
        return number_format(mysqli_num_rows($query));
    }
    function viewLimit($text){
        $string = strip_tags($text);
        if(strlen($string) > 650){
            //truncate string
            $stringCut = substr($string, 0, 650);
            $endPoint = strrpos($stringCut, ' ');
            //if the string doesn't contain space any space then it will cut without word basis
            $string = $endPoint?substr($stringCut, 0, $endPoint):substr($stringCut, 0);
            // $string .= '...<a href="'.site_url('post/').$url.'">Read More</a>';
        }
        echo $string;
    }
?>
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <!-- <li><a href="#">Layouts</a></li> -->
    <!-- <li class="active">Navigation Top</li> -->
</ul>
<!-- END BREADCRUMB -->

<div class="page-title">
    <h2> Selamat datang, <b><?=$_SESSION['fullname'];?></b>
    </h2>
</div>

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    <?php if($_SESSION['akses']=='super_user'||$_SESSION['akses']=='administrator'||$_SESSION['akses']=='user'):?>
    <!-- START WIDGETS -->
    <div class="row">
        <div class="col-md-3">

            <!-- START WIDGET SLIDER -->
            <div class="widget widget-default widget-carousel">
                <div class="owl-carousel" id="owl-example">
                    <div>
                        <div class="widget-title">Total Skripsi</div>
                        <div class="widget-int"><?=hitung('skripsi');?></div>
                    </div>
                    <div>
                        <div class="widget-title">Total Arsip</div>
                        <!-- <div class="widget-subtitle">Visitors</div> -->
                        <div class="widget-int"><?=hitung('arsip');?></div>
                    </div>
                    <div>
                        <div class="widget-title">Total Publikasi</div>
                        <div class="widget-int"><?=hitung('publikasi');?></div>
                    </div>
                </div>
            </div>
            <!-- END WIDGET SLIDER -->

        </div>
        <div class="col-md-3">

            <!-- START WIDGET MESSAGES -->
            <div class="widget widget-default widget-item-icon" onclick="location.href='pages-messages.html';">
                <div class="widget-item-left">
                    <span class="fa fa-users"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int num-count"><?=hitung('mahasiswa');?></div>
                    <div class="widget-title">Total Mahasiswa</div>
                    <!-- <div class="widget-subtitle">In your mailbox</div> -->
                </div>
            </div>
            <!-- END WIDGET MESSAGES -->

        </div>
        <div class="col-md-3">

            <!-- START WIDGET REGISTRED -->
            <div class="widget widget-default widget-item-icon" onclick="location.href='pages-address-book.html';">
                <div class="widget-item-left">
                    <span class="fa fa-user"></span>
                </div>
                <div class="widget-data">
                    <div class="widget-int num-count"><?=hitung('dosen');?></div>
                    <div class="widget-title">Total Dosen</div>
                </div>
            </div>
            <!-- END WIDGET REGISTRED -->

        </div>
        <div class="col-md-3">

            <!-- START WIDGET CLOCK -->
            <div class="widget widget-info widget-padding-sm">
                <div class="widget-big-int plugin-clock">00:00</div>
                <div class="widget-subtitle plugin-date">Loading...</div>
                <!-- <div class="widget-buttons widget-c3">
                    <div class="col">
                        <a href="#"><span class="fa fa-clock-o"></span></a>
                    </div>
                    <div class="col">
                        <a href="#"><span class="fa fa-bell"></span></a>
                    </div>
                    <div class="col">
                        <a href="#"><span class="fa fa-calendar"></span></a>
                    </div>
                </div> -->
            </div>
            <!-- END WIDGET CLOCK -->

        </div>
    </div>
    <!-- END WIDGETS -->
    <?php endif;?>
    <div class="row">
        <div class="col-md-12">
            <?php if($_SESSION['akses']=='mahasiswa'||$_SESSION['akses']=='dosen'):?>
            <?php
                $key = $_GET['qcari'];
                $query = mysqli_query($con,"SELECT * FROM publikasi WHERE judul LIKE '%$key%' OR nama_lengkap LIKE '%$key%' OR abstrak LIKE '%$key%' ORDER BY view DESC")or die(mysqli_error($con));
                // var_dump(mysqli_fetch_array($query));die;
            ?>
            <!-- START SEARCH -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row stacked">
                        <div class="col-md-12">
                            <form action="?qcari=" method="get">
                                <div class="input-group push-down-10">
                                    <input type="text" class="form-control" name="qcari"
                                        placeholder="Type your keyword to search in here...." />
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>
                                            Search</button>
                                    </div>
                                </div>
                                <?php if(isset($_GET['qcari'])):?>
                                <span class="line-height-30">Search Results for
                                    <strong><?=$_GET['qcari'];?></strong>
                                    (<?=number_format(mysqli_num_rows($query));?> results)</span>
                                <a href="<?=$base_url;?>?dashboard" class="btn btn-xs btn-warning pull-right"><i
                                        class="fa fa-trash-o"></i>
                                    Bersihkan</a>
                                <?php endif;?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END SEARCH -->
            <!-- START SEARCH RESULT -->
            <?php 
                if(isset($_GET['qcari'])):
            ?>
            <div class="search-results">
                <?php
                    while ($row = mysqli_fetch_array($query)) :
                ?>
                <div class="sr-item">
                    <a href="<?=$base_url;?>?result_detail&id=<?=$row['idpublikasi'];?>&qcari=<?=$_GET['qcari'];?>"
                        class="sr-item-title"><?=$row['judul'];?></a>
                    <div class="sr-item-link">
                        <?=$base_url.'uploads/publikasi/'.$row['file'];?>
                    </div>
                    <p><?=viewLimit($row['abstrak']);?></p>
                    <p class="sr-item-links"><i class="fa fa-eye"></i> <?=number_format($row['view']);?> Views | <i
                            class="fa fa-download"></i> <?=number_format($row['download']);?> Download
                    </p>
                </div>
                <?php endwhile;?>
            </div>
            <?php endif;?>
            <!-- END SEARCH RESULT -->
            <?php endif;?>
            <?php if($_SESSION['akses']=='super_user'||$_SESSION['akses']=='administrator'||$_SESSION['akses']=='user'):?>
            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Daftar Skripsi di Publikasi</h3>
                    <ul class="panel-controls">
                        <li data-toggle="tooltip" data-placement="top" title="Cetak Laporan"><a
                                href="<?=$base_url;?>proses/cetak_pencarian.php" target="_blank"><span
                                    class="fa fa-print"></span></a></li>
                        <!-- <li><a href="#"><span class="fa fa-refresh"></span></a></li> -->
                    </ul>
                </div>
                <div class="panel-body table-responsive">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th width="60">NO</th>
                                <th>TANGGAL LULUS</th>
                                <th>JUDUL SKRIPSI</th>
                                <th>PENULIS</th>
                                <th width="80">VIEW</th>
                                <th width="110">DOWNLOAD</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $n=1;
                            $query = mysqli_query($con,"SELECT * FROM publikasi ORDER BY view DESC")or die(mysqli_error($con));
                            while($row = mysqli_fetch_array($query)):
                            ?>
                            <tr>
                                <td><?=$n++.'.';?></td>
                                <td><?=$row['tanggal_lulus'];?></td>
                                <td><?=$row['judul'];?></td>
                                <td><?=$row['nim'].' - '.$row['nama_lengkap'];?></td>
                                <td><?=number_format($row['view']);?></td>
                                <td><?=number_format($row['download']);?></td>
                            </tr>
                            <?php endwhile;?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END DEFAULT DATATABLE -->
            <?php endif;?>
        </div>
    </div>

</div>
<!-- PAGE CONTENT WRAPPER -->