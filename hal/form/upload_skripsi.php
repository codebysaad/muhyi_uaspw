<?php
$id = $_SESSION['iduser'];
$query = mysqli_query($con,"SELECT * FROM users WHERE idusers='$id'")or die(mysqli_error($con));
$row = mysqli_fetch_array($query);
?>
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="<?=$base_url;?>">Home</a></li>
    <li class="active">Upload Skripsi</li>
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
        </div>
        <form action="<?=$base_url;?>proses/upload_skripsi.php" method="post" enctype="multipart/form-data">
            <!-- START JQUERY VALIDATION PLUGIN -->
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12" style="margin-bottom:15px;">
                                <div class="form-group">
                                    <label class="control-label">Judul Tugas Akhir/Skripsi<span
                                            style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="judul"
                                        placeholder="ex: Sistem Informasi Manajemen Arsi Skripsi" required autofocus>
                                </div>
                            </div>
                            <div class="col-md-2" style="margin-bottom:15px;">
                                <div class="form-group">
                                    <label class="control-label">Tanggal Lulus<span style="color:red;">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                        <input type="text" name="tanggal_lulus" class="form-control datepicker"
                                            data-date-format="yyyy-mm-dd" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2" style="margin-bottom:15px;">
                                <div class="form-group">
                                    <label class="control-label">NIM<span style="color:red;">*</span></label>
                                    <input type="text" class="form-control nim" name="nim" placeholder="ex: 201565001"
                                        value="<?=$row['user_name'];?>" required>
                                </div>
                            </div>
                            <div class="col-md-8" style="margin-bottom:15px;">
                                <div class="form-group">
                                    <label class="control-label">Nama Lengkap<span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="nama_lengkap"
                                        placeholder="ex: Nurul Hikmah" value="<?=$row['user_fullname'];?>" required>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:15px;">
                                <div class="form-group">
                                    <label class="control-label">File Skripsi<span style="color:red;">*</span></label>
                                    <input type="file" class="form-control" name="file" required>
                                    <span class="help-block">Format file yang diizinkan *.pdf. Ukuran maksimal 5
                                        MB.</span>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom:15px;">
                                <div class="form-group">
                                    <label class="control-label">Abstrak<span style="color:red;">*</span></label>
                                    <textarea class="form-control" rows="20" name="abstrak"
                                        placeholder="Type your abstrak here..." required></textarea>
                                </div>
                            </div>
                            <a href="<?=$base_url;?>" class="btn btn-default pull-left"><i class="fa fa-reply"></i>
                                Cancel</a>
                            <button type="submit" class="btn btn-info pull-right" id="btn-ubah" name="upload"><i
                                    class="fa fa-save"></i>
                                Upload &
                                Save</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- END JQUERY VALIDATION PLUGIN -->
    </form>
</div>
</div>
<!-- PAGE CONTENT WRAPPER -->