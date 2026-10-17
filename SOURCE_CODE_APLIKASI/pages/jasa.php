<?php
// FokusKonten PHP 8.2 Compatibility Shield
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_WARNING);
ini_set('display_errors', '0');

include 'koneksi.php';
include 'ceklevel.php';
?>
<div class="row">
    <div class="col-lg-12" >
        <h3 class="page-header">Data Jasa</h3>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-5">
        <div class="panel panel-default">
            <div class="panel-heading">
                Input Jasa
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <form class="form-horizontal" role="form" action="prosesataz.php" method="post">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Nama</label>
                        <div class="col-sm-7">
                            <input type="text" name="nama" class="form-control" placeholder="Jenis Jasa" required="required">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-warning">Simpan</button>
                        </div>
                  </div>
                  <input type="hidden" name="proses" value="jasa">
                </form>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-6 (nested) -->
    <div class="col-lg-7">
        <div class="panel panel-success">
            <div class="panel-heading">
                Data Jasa BarberCashier
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive table-bordered">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width: 50px;">#</th>
                                <th>Nama Layanan Jasa</th>
                                <th style="width: 120px;">Status</th>
                                <th style="width: 110px; text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = '0';
                        $result = mysql_query("select*from jasa where visible='1'");
                        while($row=mysql_fetch_array($result))
                        {
                        $no++
                        ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td style="font-weight: 600; color: #1e293b;"><?php echo $row['nama'];?></td>
                                <td><span class="fk-dot-green">● Aktif</span></td>
                                <td align="center">
                                    <div class="table-actions">
                                        <a href="prosesataz.php?id=<?php echo $row['idjasa'] ?>&proses=jasa" class="btn-action-delete" onclick='return confirm("Hapus <?php echo $row['nama']?> ?")' title="Hapus Layanan">
                                            <i class="fa fa-trash"></i> Hapus
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php 
                        }
                        mysql_free_result($result);
                        ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-6 (nested) -->
</div>
