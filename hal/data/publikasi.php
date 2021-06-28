<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="#">Manajemen</a></li>
    <li class="active">Publikasi</li>
</ul>
<!-- END BREADCRUMB -->


<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <?php if(isset($_SESSION['msg'])):?>
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <strong style="font-size:12pt;">Informasi </strong> <br><?=$_SESSION['msg'];?>
            </div>
            <?php endif; unset($_SESSION['msg']);?>
            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Manajemen Publikasi</h3>
                    <ul class="panel-controls">
                        <!-- <li><span href="#"><span class="fa fa-plus"></span></span>
                        </li>
                        <li><a href="#"><span class="fa fa-trash-o"></span></a></li> -->
                        <li data-toggle="tooltip" data-placement="top" title="Refresh"><a
                                href="<?=$base_url;?>?publikasi"><span class="fa fa-refresh"></span></a></li>
                    </ul>
                </div>
                <div class="panel-body table-responsive">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th width="60">NO</th>
                                <th>JUDUL SKRIPSI</th>
                                <th>PENULIS</th>
                                <th>TANGGAL LULUS</th>
                                <th>ABSTRAK</th>
                                <th>UPLOAD DATE</th>
                                <th width="50">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $n=1;
                            $query = mysqli_query($con,"SELECT * FROM publikasi ORDER BY nim ASC")or die(mysqli_error($con));
                            while($row = mysqli_fetch_array($query)):
                            ?>
                            <tr>
                                <td><?=$n++.'.';?></td>
                                <td><?=$row['judul'];?></td>
                                <td><?=$row['nim'].' - '.$row['nama_lengkap'];?></td>
                                <td><?=$row['tanggal_lulus'];?></td>
                                <td><?=$row['abstrak'];?></td>
                                <td><?=$row['upload_at'];?></td>
                                <td>
                                    <a href="<?=$base_url;?>proses/skripsi.php?act=rearsip&id=<?=$row['idpublikasi'];?>"
                                        class="btn btn-xs btn-primary"><i class="fa fa-archive"></i> Arsip</a>
                                </td>
                            </tr>
                            <?php endwhile;?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END DEFAULT DATATABLE -->
        </div>
    </div>

</div>
<!-- PAGE CONTENT WRAPPER -->