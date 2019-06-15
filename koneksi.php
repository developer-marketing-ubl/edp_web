<?php
$host = "ppikubl.com";
$user = "ppikublc_lapedp";
$pass = "bombatas92";
$db = "ppikublc_db_event";

$konek = mysqli_connect($host,$user,$pass,$db);
if($konek){
    //echo " berhasil";
}else{
    echo "Gagal";
}

?>