<script>
function submit(x) {
    if (x == 'add') {
        $('[name="nip"]').val("");
        $('[name="nama_lengkap"]').val("");
        $('[name="tempat_lahir"]').val("");
        $('[name="tanggal_lahir"]').val("");
        $('[name="jk"]').val("");
        $('[name="telp"]').val("");
        $('[name="alamat"]').val("");
        $('#modal_add .modal-title').html('Add New Dosen');
        $('#btn-ubah').hide();
        $('#btn-add').show();
    } else {
        $('#modal_add .modal-title').html('Edit Dosen')
        $('#btn-add').hide();
        $('#btn-ubah').show();

        $.ajax({
            type: "POST",
            data: {
                id: x
            },
            url: '<?=$base_url;?>proses/view_dsn.php',
            dataType: 'json',
            success: function(data) {
                $('[name="iddosen"]').val(data.iddosen);
                $('[name="nip"]').val(data.nip);
                $('[name="nama_lengkap"]').val(data.nama_lengkap);
                $('[name="tempat_lahir"]').val(data.tempat_lahir);
                $('[name="tanggal_lahir"]').val(data.tanggal_lahir);
                $('[name="jk"]').val(data.jk);
                $('[name="telp"]').val(data.telp);
                $('[name="alamat"]').val(data.alamat);
            }
        });
    }
}
</script>
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="<?=$base_url;?>">Home</a></li>
    <li><a href="#">Master</a></li>
    <li class="active">Dosen</li>
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
                    <h3 class="panel-title">Master Data Dosen</h3>
                    <ul class="panel-controls">
                        <li data-toggle="tooltip" data-placement="top" title="Tambah Baru"><a href="#"
                                data-toggle="modal" data-target="#modal_add" onclick="submit('add')"><span
                                    class="fa fa-plus"></span></a></li>
                        <li data-toggle="tooltip" data-placement="top" title="Import Dosen"><a href="#"
                                data-toggle="modal" data-target="#modal_import"><span class="fa fa-upload"></span></a>
                        </li>
                        <li data-toggle="tooltip" data-placement="top" title="Aktifkan Akun"><a
                                href="<?=$base_url;?>?aktifkan_keys&lvl=dosen"><span class="fa fa-key"></span></a>
                        </li>
                        <li data-toggle="tooltip" data-placement="top" title="Refresh"><a
                                href="<?=$base_url;?>?dosen"><span class="fa fa-refresh"></span></a></li>
                    </ul>
                </div>
                <div class="panel-body table-responsive">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th width="60">NO</th>
                                <th width="55"><i class="fa fa-edit"></i></th>
                                <th>NIP</th>
                                <th>NAMA DOSEN</th>
                                <th>TTL</th>
                                <th>JK</th>
                                <th>NO. TELP</th>
                                <th>ALAMAT</th>
                                <th width="60">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $n=1;
                            $query = mysqli_query($con,"SELECT * FROM dosen ORDER BY nip ASC")or die(mysqli_error($con));
                            while($row = mysqli_fetch_array($query)):
                            ?>
                            <tr>
                                <td><?=$n++.'.';?></td>
                                <td><a href="#modal_add" data-toggle="modal" onclick="submit(<?=$row['iddosen'];?>)"><i
                                            class="fa fa-edit"></i></a></td>
                                <td><?=$row['nip'];?></td>
                                <td><?=$row['nama_lengkap'];?></td>
                                <td><?=$row['tempat_lahir'].', '.$row['tanggal_lahir'];?></td>
                                <td><?=$row['jk'];?></td>
                                <td><?=$row['telp'];?></td>
                                <td><?=$row['alamat'];?></td>
                                <td><a href="<?=$base_url;?>proses/dsn.php?id=<?=$row['iddosen'];?>"
                                        class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i>
                                        Hapus</a></td>
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
<div class="modal" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="largeModalHead" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?=$base_url;?>proses/dsn.php" method="post" id="form-mahasiswa">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="largeModalHead"></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4" style="margin-bottom:15px;">
                            <div class="form-group">
                                <label class="control-label">NIP<span style="color:red;">*</span></label>
                                <input type="hidden" class="form-control" name="iddosen">
                                <input type="text" class="form-control nip" name="nip"
                                    placeholder="ex: 19860926 201505 1 001" autofocus required>
                            </div>
                        </div>
                        <div class="col-md-8" style="margin-bottom:15px;">
                            <div class="form-group">
                                <label class="control-label">Nama Lengkap<span style="color:red;">*</span></label>
                                <input type="text" class="form-control" name="nama_lengkap"
                                    placeholder="ex: Nurul Hikmah" required>
                            </div>
                        </div>
                        <div class="col-md-8" style="margin-bottom:15px;">
                            <div class="form-group">
                                <label class="control-label">Tempat Lahir<span style="color:red;">*</span></label>
                                <input type="text" class="form-control" name="tempat_lahir" placeholder="ex: Manokwari"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-4" style="margin-bottom:15px;">
                            <div class="form-group">
                                <label class="control-label">Tanggal Lahir<span style="color:red;">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                    <input type="text" name="tanggal_lahir" class="form-control datepicker"
                                        data-date-format="yyyy-mm-dd" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" style="margin-bottom:15px;">
                            <label class="control-label">Jenis Kelamin<span style="color:red;">*</span></label>
                            <select class="form-control" name="jk" required>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-6" style="margin-bottom:15px;">
                            <div class="form-group">
                                <label class="control-label">Nomor Telepon<span style="color:red;">*</span></label>
                                <input type="text" class="form-control" name="telp" placeholder="ex: 0852xxxxxxxx"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:15px;">
                            <div class="form-group">
                                <label class="control-label">Alamat Lengkap<span style="color:red;">*</span></label>
                                <textarea name="alamat" class="form-control" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info pull-right" id="btn-ubah" name="edit"><i
                            class="fa fa-save"></i>
                        Update &
                        Save</button>
                    <button type="submit" class="btn btn-info pull-right" id="btn-add" name="save"><i
                            class="fa fa-save"></i> Add
                        New &
                        Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal" id="modal_import" tabindex="-1" role="dialog" aria-labelledby="largeModalHead" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?=$base_url;?>proses/import_dsn.php" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="largeModalHead">Import Dosen</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" style="margin-bottom:15px;">
                            <h4>Panduan Import</h4>
                            <ol>
                                <li>Copy dan paste <strong>[NIM] [NAMA LENGKAP] [TEMPAT LAHIR] [TANGGAL LAHIR] [JENIS
                                        KELAMIN] [NO. TELP] [ALAMAT LENGKAP]</strong> dari Ms. Excel pada Text Area
                                    dibawah.</li>
                                <li>Kolom <strong>JENIS KELAMIN</strong> diisi huruf <strong>"L"</strong> jika Laki-Laki
                                    dan <strong>"P"</strong> jika Perempuan.</li>
                                <li>Kolom <strong>TANGGAL LAHIR</strong> diisi dengan format
                                    <strong>"YYYY-MM-DD"</strong>. Contoh :
                                    <strong>1991-03-15</strong></li>
                            </ol>
                            <div class="form-group">
                                <textarea class="form-control" rows="15" name="dsn" placeholder="Paste here..."
                                    required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> Import &
                        Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal" id="modal_delete" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?=$base_url;?>proses/dsn.php" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="largeModalHead">Konfirmasi</h4>
                </div>
                <div class="modal-body bg-red">
                    <div class="row">
                        <div class="col-md-12" style="margin-bottom:15px;">
                            <input type="hidden" class="form-control" name="idmhs">
                            <p>Ada yakin ingin menghapus data ini ?</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger pull-right" name="delete"><i class="fa fa-save"></i>
                        Yes,
                        Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>