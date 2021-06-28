<?php
// session_start();
include ('../config/connection.php');
?>
<html>

<head>
    <link rel="stylesheet" type="text/css" id="theme" href="../assets/css/theme-blue.css" />
    <style type="tetx/css">
        h2{ 
            padding:0px;
            margin:0px;
        }
        text{
            padding:0px;
        }
    </style>
    <title>Cetak Laporan Skripsi</title>
</head>

<body>

    <div style="page-break-after:always;">
        <center>
            <br />
            <h3>LAPORAN DATA SKRIPSI<h3>
        </center>
        <p style="text-align:right;width:95%;">Tanggal Cetak : <?= date('d M Y');?></p>
        <table class="table datatable table-bordered" width="90%" style="font-size:11pt;">
            <thead>
                <tr>
                    <th width="20">NO</th>
                    <th>JUDUL SKRIPSI</th>
                    <th>PENULIS</th>
                    <th>TANGGAL LULUS</th>
                    <th>ABSTRAK</th>
                    <th width="40">UPLOAD DATE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $n=1;
                    $query = mysqli_query($con,"SELECT * FROM skripsi ORDER BY nim ASC")or die(mysqli_error($con));
                    while($row = mysqli_fetch_array($query)):
                    ?>
                <tr>
                    <td><?=$n++.'.';?></td>
                    <td><?=$row['judul'];?></td>
                    <td><?=$row['nim'].' - '.$row['nama_lengkap'];?></td>
                    <td><?=$row['tanggal_lulus'];?></td>
                    <td><?=$row['abstrak'];?></td>
                    <td><?=$row['upload_at'];?></td>
                </tr>
                <?php endwhile;?>
            </tbody>
        </table>
        <br>

    </div>
    <script type="text/javascript" src="../assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
</body>

</html>

<script>
window.print();
</script>