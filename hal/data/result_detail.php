<?php
$id = $_GET['id'];
$view = mysqli_query($con,"UPDATE publikasi SET view=view+1 WHERE idpublikasi='$id'")or die(mysqli_error($con));
$query = mysqli_query($con,"SELECT * FROM publikasi WHERE idpublikasi='$id'")or die(mysqli_error($con));
$row = mysqli_fetch_array($query);
?>
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Result Detail</li>
</ul>
<!-- END BREADCRUMB -->
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-9">

            <div class="panel panel-default">
                <div class="panel-body posts">

                    <div class="post-item">
                        <div class="post-title">
                            <?=$row['judul'];?>
                        </div>
                        <div class="post-date"><span class="fa fa-calendar"></span> <?php $time = strtotime($row['upload_at']);
                                $newDate = date("F d, Y", $time);echo $newDate;?> / <?=number_format($row['view']);?>
                            Views / <?=number_format($row['download']);?> Download</div>
                        <div class="post-text">
                            <embed
                                src="<?=$base_url.'uploads/publikasi/'.$row['file'];?>#toolbar=0&navpanes=0&view=fitH&page=1"
                                type="application/pdf" width="100%" height="400px">
                            <h5>Abstrak :</h5>
                            <p><?=$row['abstrak'];?></p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="col-md-3">

            <div class="panel panel-default">
                <div class="panel-body">
                    <a href="<?=$base_url;?>proses/download.php?file=<?=$row['file'];?>&id=<?=$row['idpublikasi'];?>"
                        class="btn btn-sm btn-primary btn-block"><i class="fa fa-download"></i> Download (
                        <?=number_format($row['download']);?> )</a>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-body">
                    <h4>Detail Information :</h4>
                    <hr style="margin:0px 0px 5px 0px;border:1px solid #21243d">
                    <strong>NIM</strong><br>
                    <?=$row['nim'];?>
                    <hr style="margin:5px 0px 5px 0px;border:0.5px dashed #21243d">
                    <strong>Penulis</strong><br>
                    <?=$row['nama_lengkap'];?>
                    <hr style="margin:5px 0px 5px 0px;border:0.5px dashed #21243d">
                    <strong>Judul</strong><br>
                    <?=$row['judul'];?>
                    <hr style="margin:5px 0px 5px 0px;border:0.5px dashed #21243d">
                    <strong>File</strong><br>
                    <?=$row['file'];?>
                    <hr style="margin:5px 0px 5px 0px;border:0.5px dashed #21243d">
                    <strong>Upload Date</strong><br>
                    <?php $time = strtotime($row['upload_at']);
                    $newDate = date("d F Y", $time);echo $newDate;?>
                    <hr style="margin:5px 0px 5px 0px;border:0.5px dashed #21243d">
                </div>
            </div>

        </div>
    </div>

</div>
<!-- END PAGE CONTENT WRAPPER -->