<?php
// FokusKonten PHP 8.2 Compatibility Shield
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_WARNING);
ini_set('display_errors', '0');

include 'koneksi.php';
include 'cek.php';
if (!isset($_GET['idbrg'])) {
    $nama='';
    $harga='';
    $baru='1';
}else{
    $baru='0';
    $kd_brg = $_GET['idbrg'];
    $result = mysql_query("SELECT * FROM barang where idbarang='$kd_brg'");
        $barang = mysql_fetch_array($result);
        mysql_free_result($result);
    $nama=$barang['nama'];
    $harga=$barang['harga'];
}
?>

<div class="row">
    <div class="col-lg-12" >
        <h3 class="page-header">Data Barang</h3>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
<?php
    if (($_SESSION['levelataz']) == "owner ataz" or ($_SESSION['levelataz']) == "manager ataz") { ?>
    <div class="col-lg-5">
        <div class="panel panel-default">
            <div class="panel-heading">
                Input Barang
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <form class="form-horizontal" role="form" action="prosesataz.php" method="post">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Nama</label>
                        <div class="col-sm-7">
                            <?php 
                            if (empty($nama)) {?>
                                <input type="text" name="nama" class="form-control" placeholder="Nama Barang" required="required" value="<?php echo $nama;?>">
                                <?php
                            }else{?>
                                <input type="text" name="nama" class="form-control" placeholder="Nama Barang" required="required" value="<?php echo $nama;?>" readonly/>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Harga</label>
                        <div class="col-sm-7">
                            <input type="number" name="harga" class="form-control" placeholder="Harga Jual" required="required" value="<?php echo $harga;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-warning">Simpan</button>
                        </div>
                  </div>
                  <?php
                    if ($baru=='1') {?>
                        <input type="hidden" name="proses" value="barang"><?php
                    }else{?>
                        <input type="hidden" name="idbarang" value="<?php echo $kd_brg; ?>">
                        <input type="hidden" name="proses" value="updatebarang"><?php                      
                    }
                  ?>
                </form>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <?php
    }
?>
    <!-- /.col-lg-6 (nested) -->
    <div class="col-lg-7">
        <div class="panel panel-success">
            <div class="panel-heading">
                Data Barang BarberCashier
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive table-bordered">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width: 50px;">#</th>
                                <th>Nama Produk / Barang</th>
                                <th style="text-align: right; width: 140px;">Harga (Rp)</th>
                                <th style="width: 120px;">Status</th>
                                <th style="text-align: center; width: 160px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = '0';
                        $result = mysql_query("select*from barang where visible='1'");
                        while($row=mysql_fetch_array($result))
                        {
                        $no++
                        ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td style="font-weight: 600; color: #1e293b;"><?php echo $row['nama'];?></td>
                                <td align="right" style="font-weight: 700; color: #b45309;">Rp <?php echo number_format($row['harga'],0,',','.') ?></td>
                                <td><span class="fk-dot-green">● Tersedia</span></td>
                                <td align="center">
                                    <div class="table-actions">
                                        <a href="index.php?cp=barang&idbrg=<?php echo $row['idbarang'] ?>" class="btn-action-edit" title="Edit Data Barang">
                                            <i class="fa fa-pencil"></i> Edit
                                        </a>
                                        <a href="prosesataz.php?id=<?php echo $row['idbarang'] ?>&proses=barang" class="btn-action-delete" onclick='return confirm("Hapus <?php echo $row['nama']?> ?")' title="Hapus Data Barang">
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
