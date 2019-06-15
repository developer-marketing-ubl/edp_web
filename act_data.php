<?php
include "koneksi.php";

if(isset($_POST['cb_ld1'])){
	$cb_ld1 = $_POST['cb_ld1'];
}else{
	$cb_ld1 = "-";
}

if(isset($_POST['cb_ld2'])){
	$cb_ld2 = $_POST['cb_ld2'];
}else{
	$cb_ld2 = "-";
}

if(isset($_POST['cb_ld3'])){
	$cb_ld3 = $_POST['cb_ld3'];
}else{
	$cb_ld3 = "-";
}


if(isset($_POST['sifat_lain'])){
	$sifat_lain = $_POST['sifat_lain'];
}else{
	$sifat_lain = $_POST['sifat'];
}

date_default_timezone_set('Asia/Jakarta');

$tim = $_POST['tim'];
$lead1 = $_POST['lead1'];
$lead2 = $_POST['lead2'];
$lead3 = $_POST['lead3'];
$hari = $_POST['hari'];
$tanggal = $_POST['tanggal'];
$tgl_input = date('Y-m-d',strtotime($tanggal));
$jam_mulai = $_POST['jam_mulai'];
$jam_selesai = $_POST['jam_selesai'];
$lap_kerja = $_POST['lap_kerja'];
$kendala = $_POST['kendala'];
$aksi = $_POST['aksi'];

$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
	$nama = $_FILES['dok']['name'];
	$x = explode('.', $nama);
	$ekstensi = strtolower(end($x));
	$ukuran	= $_FILES['dok']['size'];
	$file_tmp = $_FILES['dok']['tmp_name'];
	$namabaru = date('dmYHis')."_".$nama;
		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
		    if(!$ukuran < 2000000){	
			move_uploaded_file($file_tmp, 'dokumen/'.$namabaru);
			$query = mysqli_query($konek,"INSERT INTO tb_data_edp VALUES(NULL,'$tim','$lead1','$lead2',
								  '$lead3','$hari','$tgl_input','$jam_mulai','$jam_selesai',
								  '$sifat_lain','$lap_kerja','$kendala','$aksi',
								  '$cb_ld1','$cb_ld2','$cb_ld3','$namabaru')");
			if($query){
				echo "<meta http-equiv=Refresh content=0;url=mat.php?display=success>";
			}else{
        	    echo "<meta http-equiv=Refresh content=0;url=mat.php?display=fail>";
			}
		    }else{
        	    echo "<meta http-equiv=Refresh content=0;url=mat.php>?display=too";
		    }
	       }else{
        	    echo "<meta http-equiv=Refresh content=0;url=mat.php?display=not>";
	       }


?>