<?php
// FokusKonten PHP 8.2 Compatibility Shield
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_WARNING);
ini_set('display_errors', '0');

	function jumlah_hari($bulan=0, $tahun=0) {
	 
	    $bulan = $bulan > 0 ? $bulan : date("m");
	    $tahun = $tahun > 0 ? $tahun : date("Y");
	 
	    switch($bulan) {
	        case 1:
	        case 3:
	        case 5:
	        case 7:
	        case 8:
	        case 10:
	        case 12:
	            return 31;
	            break;
	        case 4:
	        case 6:
	        case 9:
	        case 11:
	            return 30;
	            break;
	        case 2:
	            return $tahun % 4 == 0 ? 29 : 28;
	            break;
	    }
	}
?>