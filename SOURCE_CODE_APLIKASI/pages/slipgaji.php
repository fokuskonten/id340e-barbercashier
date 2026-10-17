<?php
// FokusKonten PHP 8.2 Compatibility Shield
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_WARNING);
ini_set('display_errors', '0');

	include 'ceklevel.php';
	include 'koneksi.php';
	include '../dist/DateToIndo.php';
?>
<?php
if(isset($_POST['cari']))
{
    $date  =$_POST['date'];
    $sebelumnya = date("Y-m-1", strtotime("$date -1 month"));
	$selanjutnya = date("Y-m-1", strtotime("$date +1 month"));
    $bulan =date('m', strtotime(str_replace(' ','-', $date)));
    $bulankasbon = date('m', strtotime(str_replace(' ','-', $sebelumnya)));
    $wulan =date('F', strtotime(str_replace(' ','-', $date)));
    $tahun =date('Y', strtotime(str_replace(' ','-', $date)));
 }else{
    unset($_POST['cari']);
    // Smart Fallback ke data riil gaji terakhir jika bulan saat ini kosong
    $cek_gaji = mysql_query("SELECT max(b.tgl) as last_tgl FROM gaji a inner join pengeluaran b on a.pengeluaran_idpengeluaran=b.idpengeluaran WHERE a.pokok > 0");
    $rg = mysql_fetch_array($cek_gaji);
    $last_tgl = (!empty($rg['last_tgl'])) ? $rg['last_tgl'] : '2016-06-01';
    
    $today = date("Y-m-01", strtotime($last_tgl));
    $sebelumnya = date("Y-m-1", strtotime("$today -1 month"));
	$selanjutnya = date("Y-m-1", strtotime("$today +1 month"));
    $tgl = $last_tgl;
	$bulan = date('m', strtotime(str_replace(' ','-', $tgl)));
	$bulankasbon = date('m', strtotime(str_replace(' ','-', $sebelumnya)));
	$tahun = date('Y', strtotime(str_replace(' ','-', $tgl)));
	$wulan = date('F', strtotime(str_replace(' ','-', $tgl)));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
  <link rel="icon" type="image/x-icon" href="favicon.ico">
  <link rel="icon" type="image/svg+xml" href="favicon.svg">
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<title>Skac Belajar Line chart</title>
		<script>
			function ngeprint() {
			    window.print();
			}
		</script></head>
	<body>
		<div class="row">
			<div class="col-lg-12">
	
			 <h3 class="page-header" style="color: #78350f; font-weight: 800; border-bottom: 2px solid #fde68a; padding-bottom: 10px;">Slip Komisi &amp; Gaji Capster — Bulan <?php echo "".(WulanIndo($bulan))." ".$tahun.""; ?>
				<a href="print/slipgajixls.php?bulan=<?php echo $bulan; ?>&wulan=<?php echo $wulan; ?>&tahun=<?php echo $tahun; ?>" class="btn btn-warning col-sm-offset-4" style="background: #d97706; border-color: #b45309; font-weight: 700;"><i class="fa fa-print"></i> Export Excel</a>
			</h3>
			
			</div>
		</div>
<br>
		<div class="row">
			<div class="col-md-12"> 
				<div class="col-sm-8">
					<form role="form" action="" method="post" class="navbar-form pull-left">
						<input type="hidden" name="date" value="<?php echo $sebelumnya; ?>">
		                <button type="submit" class="btn btn-outline btn-default" name="cari" id="cari">
		                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Sebelumnya
		                </button>
		            </form>
				</div>
				<div class="col-xs-2 col-sm-offset-2">
					<form role="form" action="" method="post" class="navbar-form pull-left">
						<input type="hidden" name="date" value="<?php echo $selanjutnya; ?>">
		                <button type="submit" class="btn btn-outline btn-default" name="cari" id="cari">
		                    Selanjutnya <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		                </button>
		            </form>
				</div>
			</div>
		</div>
<br>
<div class="">
    <?php
        $nomor = '0';
        //$result2 = mysql_query("SELECT * FROM pegawai where aktif='1' and visible='1'");
        $result2 = mysql_query("SELECT nama,level FROM gaji a inner join pengeluaran b on a.pengeluaran_idpengeluaran=b.idpengeluaran and month(b.tgl)='$bulan' and year(b.tgl)='$tahun' group by a.nama");
       
        while($row2=mysql_fetch_array($result2))
        {
            $nomor++;
            $nama = ucwords($row2['nama']);
            $level = ucwords($row2['level']);
            ?>	
       		<div class="col-lg-4" style="margin-bottom: 20px;">
				<div class="well well-lg" style="background: #ffffff; border: 1px solid #e2e8f0; border-top: 4px solid #d97706; border-radius: 12px; box-shadow: 0 4px 16px rgba(0,0,0,0.06); padding: 12px 14px;">
					<table border="0" width="100%">
						<tr>
							<td valign="top">
								<table border="0" width="100%">
									<tr>
										<td colspan="5" align="center" style="padding-bottom: 6px;">
											<div style="display: flex; align-items: center; justify-content: center; gap: 10px; padding-bottom: 10px; border-bottom: 2px solid #fef3c7;">
												<img src="../logo.png" style="width: 36px; height: 36px; border-radius: 50%; border: 1.5px solid #d97706; box-shadow: 0 2px 6px rgba(217, 119, 6, 0.2);" onerror="this.src='../favicon.png';">
												<div style="text-align: left; line-height: 1.15;">
													<span style="font-size: 16px; font-weight: 800; color: #92400e; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;">Barber<span style="color: #d97706;">Cashier</span></span><br>
													<span style="font-size: 10px; font-weight: 700; color: #b45309; text-transform: uppercase; letter-spacing: 0.6px;">Slip Komisi &amp; Gaji</span>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td colspan="5" align="center" style="padding: 6px 0;">
											<span style="display: inline-block; background: #fffbeb; color: #b45309; font-weight: 700; font-size: 11px; padding: 2px 10px; border-radius: 6px; border: 1px solid #fde68a;">
												Periode: <?php echo "".(WulanIndo($bulan))." ".$tahun.""; ?>
											</span>
										</td>
									</tr>
									<tr>
										<td colspan="5" style="padding: 8px 0; border-bottom: 1px dashed #cbd5e1;">
											<div style="font-size: 14px; font-weight: 800; color: #1e293b;"><?php echo $nama;?></div>
											<div style="font-size: 11px; font-weight: 700; color: #d97706; text-transform: uppercase; letter-spacing: 0.5px;">● <?php echo $level;?></div>
										</td>
										<td width="5">&nbsp;</td>
								  	</tr>
									<tr>
										<td colspan="5" align="left" style="padding-top:10px;padding-bottom:6px;"><strong style="font-size: 12px; color: #475569; text-transform: uppercase; letter-spacing: 0.5px;">Rincian Komisi &amp; Gaji</strong></td>
					  				</tr>
									<tr>
									  <td colspan="2">Gaji Pokok</td>
									  <td width="283">&nbsp;</td>
									  <td width="25"></td>
									  <?php
										$result=mysql_query("SELECT sum(pokok) as pokok FROM gaji a inner join pengeluaran b on a.pengeluaran_idpengeluaran=b.idpengeluaran and month(b.tgl)='$bulan' and year(b.tgl)='$tahun' and a.nama='$nama'");
										$pokok = mysql_fetch_array($result);
										mysql_free_result($result);
										$gajipokok=$pokok['pokok'];
									  ?>
									  <td align="right" style="padding-right:7px;"><?php echo number_format($gajipokok,0,',','.') ?></td>
					  				</tr>
									<tr>
									  	<td colspan="2">Bonus</td>
										<td></td>
										<td></td>
									  <?php
										$result=mysql_query("SELECT sum(bonus) as bonus FROM gaji a inner join pengeluaran b on a.pengeluaran_idpengeluaran=b.idpengeluaran and month(b.tgl)='$bulan' and year(b.tgl)='$tahun' and a.nama='$nama'");
										$bonus = mysql_fetch_array($result);
										mysql_free_result($result);
										$gajibonus=$bonus['bonus'];
									  ?>
										<td align="right" style="padding-right:7px;"><?php echo number_format($gajibonus,0,',','.') ?></td>
									</tr>
									<tr>
									  	<td colspan="2">Over Time</td>
										<td></td>
										<td></td>
									  <?php
										$result=mysql_query("SELECT sum(overtime) as overtime FROM gaji a inner join pengeluaran b on a.pengeluaran_idpengeluaran=b.idpengeluaran and month(b.tgl)='$bulan' and year(b.tgl)='$tahun' and a.nama='$nama'");
										$overtime = mysql_fetch_array($result);
										mysql_free_result($result);
										$gajiovertime=$overtime['overtime'];
									  ?>
										<td align="right" style="padding-right:7px;"><?php echo number_format($gajiovertime,0,',','.') ?></td>
									</tr>

						            <tr>
						              <td colspan="2">Tunjangan</td>
						              <td>&nbsp;</td>
						              <td></td>
						              <td align="right" style="padding-right:7px;">&nbsp;</td>
					              	</tr>
			                        <tr>
			                          <td width="41">&nbsp;</td>
			                          <td colspan="2">Makan</td>
			                          <td></td>
									  <?php
										$result=mysql_query("SELECT sum(makan) as makan FROM gaji a inner join pengeluaran b on a.pengeluaran_idpengeluaran=b.idpengeluaran and month(b.tgl)='$bulan' and year(b.tgl)='$tahun' and a.nama='$nama'");
										$makan = mysql_fetch_array($result);
										mysql_free_result($result);
										$gajimakan=$makan['makan'];
									  ?>			                          
			                          <td align="right" style="padding-right:7px;"><?php echo number_format($gajimakan,0,',','.') ?></td>
		                          	</tr>
			                        <tr>
			                          <td>&nbsp;</td>
			                          <td colspan="2">Transport</td>
			                          <td></td>
									  <?php
										$result=mysql_query("SELECT sum(transport) as transport FROM gaji a inner join pengeluaran b on a.pengeluaran_idpengeluaran=b.idpengeluaran and month(b.tgl)='$bulan' and year(b.tgl)='$tahun' and a.nama='$nama'");
										$transport = mysql_fetch_array($result);
										mysql_free_result($result);
										$gajitransport=$transport['transport'];
									  ?>			                          
			                          <td align="right" style="padding-right:7px;"><?php echo number_format($gajitransport,0,',','.') ?></td>
		                          	</tr>
			                        <tr>
			                          <td>&nbsp;</td>
			                          <td colspan="2">Pulsa</td>
			                          <td></td>
									  <?php
										$result=mysql_query("SELECT sum(pulsa) as pulsa FROM gaji a inner join pengeluaran b on a.pengeluaran_idpengeluaran=b.idpengeluaran and month(b.tgl)='$bulan' and year(b.tgl)='$tahun' and a.nama='$nama'");
										$pulsa = mysql_fetch_array($result);
										mysql_free_result($result);
										$gajipulsa=$pulsa['pulsa'];
									  ?>			                          
			                          <td align="right" style="padding-right:7px;"><?php echo number_format($gajipulsa,0,',','.') ?></td>
		                          	</tr>

			                        <tr>
			                          <td>&nbsp;</td>
			                          <td colspan="2">Hari Raya</td>
			                          <td></td>
									  <?php
										$result=mysql_query("SELECT sum(hariraya) as hariraya FROM gaji a inner join pengeluaran b on a.pengeluaran_idpengeluaran=b.idpengeluaran and month(b.tgl)='$bulan' and year(b.tgl)='$tahun' and a.nama='$nama'");
										$hariraya = mysql_fetch_array($result);
										mysql_free_result($result);
										$gajihariraya=$hariraya['hariraya'];
									  ?>			           
			                          <td align="right" style="padding-right:7px;"><?php echo number_format($gajihariraya,0,',','.') ?></td>
		                          	</tr>
			                        <tr>
			                          <td>&nbsp;</td>
			                          <td colspan="2">Kesehatan</td>
			                          <td></td>
									  <?php
										$result=mysql_query("SELECT sum(kesehatan) as kesehatan FROM gaji a inner join pengeluaran b on a.pengeluaran_idpengeluaran=b.idpengeluaran and month(b.tgl)='$bulan' and year(b.tgl)='$tahun' and a.nama='$nama'");
										$kesehatan = mysql_fetch_array($result);
										mysql_free_result($result);
										$gajikesehatan=$kesehatan['kesehatan'];
									  ?>			                          
			                          <td align="right" style="padding-right:7px;"><?php echo number_format($gajikesehatan,0,',','.') ?></td>
		                          	</tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td colspan="2">Nikah</td>
                                      <td></td>
									  <?php
										$result=mysql_query("SELECT sum(nikah) as nikah FROM gaji a inner join pengeluaran b on a.pengeluaran_idpengeluaran=b.idpengeluaran and month(b.tgl)='$bulan' and year(b.tgl)='$tahun' and a.nama='$nama'");
										$nikah = mysql_fetch_array($result);
										mysql_free_result($result);
										$gajinikah=$nikah['nikah'];
									  ?>                                      
                                      <td align="right" style="padding-right:7px;"><?php echo number_format($gajinikah,0,',','.') ?></td>
                                  	</tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td colspan="2">DukaCita</td>
                                      <td></td>
									  <?php
										$result=mysql_query("SELECT sum(dukacita) as dukacita FROM gaji a inner join pengeluaran b on a.pengeluaran_idpengeluaran=b.idpengeluaran and month(b.tgl)='$bulan' and year(b.tgl)='$tahun' and a.nama='$nama'");
										$dukacita = mysql_fetch_array($result);
										mysql_free_result($result);
										$gajidukacita=$dukacita['dukacita'];
									  ?>                                      
                                      <td align="right" style="padding-right:7px;"><?php echo number_format($gajidukacita,0,',','.') ?></td>
                                    </tr>

									<tr>
										<td colspan="5" style="border-top: 1.5px solid #cbd5e1; padding-top: 8px;"></td>
									</tr>
									<tr style="font-weight: 700; color: #334155;">
									  <td colspan="3">Total Komisi &amp; Gaji</td>
									  <td width="20"></td>
									  <?php
									  	$gajitotal = $gajipokok + $gajibonus + $gajimakan + $gajitransport + $gajihariraya + $gajikesehatan + $gajinikah + $gajidukacita
									  ?>
									  <td align="right" style="padding-right:7px;"><?php echo number_format($gajitotal,0,',','.') ?></td>
								  	</tr>
									<tr style="color: #64748b;">
									  <td colspan="3">Kasbon / Potongan</td>
									  <td></td>
									  <?php
										$result=mysql_query("SELECT sum(kasbon) as kasbon FROM gaji a inner join pengeluaran b on a.pengeluaran_idpengeluaran=b.idpengeluaran and month(b.tgl)='$bulan' and year(b.tgl)='$tahun' and a.nama='$nama'");
										$kasbon = mysql_fetch_array($result);
										mysql_free_result($result);
										$gajikasbon=$kasbon['kasbon'];
									  ?> 
									  <td align="right" style="padding-right:8px;"><?php echo number_format($gajikasbon,0,',','.') ?></td>
								  </tr>
									<tr>
										<td colspan="5" style="border-top: 2px solid #0f172a; padding-top: 6px;"></td>
									</tr>
									<tr style="font-weight: 800; font-size: 13px; color: #047857;">
									  <td colspan="3">Gaji Bersih Diterima</td>
									  <td></td>
									  <?php
									  	$gajiterima = $gajitotal - $gajikasbon
									  ?>
									  <td align="right" style="padding-right:7px; color: #047857;"><?php echo number_format($gajiterima,0,',','.') ?></td>
								  </tr>
									<tr #919191>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td>&nbsp;</td>
									  <td align="right" style="padding-right:7px;">&nbsp;</td>
								  </tr>
									<tr #919191>
									  <td colspan="5" align="center" style="padding-top: 6px; font-size: 11px; color: #64748b;">BarberCashier, &nbsp; <?php echo "".(WulanIndo($bulan))." ".$tahun.""; ?></td>
								  </tr>
									<tr #919191>
									  	<td colspan="5" align="center" style="padding-top: 8px;">
											<div style="font-weight: 700; color: #1e293b; text-decoration: underline; font-size: 13px;">Hendra Bone</div>
											<div style="font-size: 11px; color: #64748b; font-style: italic;">Manager Barbershop</div>
										</td>
									</tr>
								</table> 
							</td> 
						</tr>
					</table>
				</div>
			</div>
            <?php
        }
        mysql_free_result($result2);
    ?>
</div>

	</body>
</html>