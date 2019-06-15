<?php
	include "koneksi.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- Material Design for Bootstrap fonts and icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">

    <!-- Material Design for Bootstrap CSS -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" integrity="sha256-Z8TW+REiUm9zSQMGZH4bfZi52VJgMqETCbPFlGRB1P8=" crossorigin="anonymous" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js" integrity="sha256-JirYRqbf+qzfqVtEE4GETyHlAbiCpC005yBTa4rj6xg=" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <title>Executive Development Program UBL</title>
  </head>
  <body>
    <!-- primary -->
<ul class="nav nav-tabs bg-primary" style="height:200px;">
  <li class="nav-item">
    <a class="nav-link" href="#"></a>
  </li>
</ul>

<script>
<?php
	if(isset($_GET['display'])){
		$al = $_GET['display'];
		if($al == "success"){
			echo "swal('Berhasil data', 'Silahkan klik tombol dibawah !', 'success')";
		}else if($al == "fail"){
			echo "swal('Terjadi kesalahan sistem !', 'Silahkan klik tombol dibawah !', 'error')";
		}else if($al == "too"){
			echo "swal('Ukuran file terlalu besar !', 'Silahkan klik tombol dibawah !', 'error')";
		}else if($al == "not"){
			echo "swal('Format file tidak didukung !', 'Silahkan klik tombol dibawah !', 'error')";
		}
	}
?>
            
</script>

<section id="content" style="margin-top:-150px;">
                <div class="container">
                    <div class="c-header">
                        <h2><img src="https://upload.wikimedia.org/wikipedia/id/c/cc/Logo-ubl.png" width="50px" height="30px" style="margin-top:-10px;"/>&nbsp;<font color="#ffffff">Executive Development Program UBL</font></h2>
                    </div>
<form method="post" action="act_data.php" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-header">
                            <h2>Form Data EDP</small></h2>
                        </div>

                        <div class="card-body card-padding">
						
						<div class="form-group">
						<label for="exampleSelect2" class="bmd-label-floating">Pilih Tim</label>
						  <?php
                        		$result = mysqli_query($konek,"SELECT * FROM `tb_tim`");
                                $jsArray = "var prdName = new Array();\n";
                                
                                echo '<select name="tim" onchange="changeValue(this.value)" class="form-control" required>';  
                                echo "<option disabled selected value>-Pilih Tim-</option>";
                                while ($row = mysqli_fetch_array($result)) {  
                                    echo '<option value="' . $row['nama_tim'] . '">' . $row['nama_tim'] . '</option>';  
									$jsArray .= "prdName['" . $row['nama_tim'] . "'] = {ld1:'" . addslashes($row['leader1']) . "',ld2:'".addslashes($row['leader2']). "',ld3:'".addslashes($row['leader3'])."'};\n"; 
                                }  
                                echo '</select>';  
                                ?>
					  </div>
							 
                            <div class="form-group">
								<p class="c-black f-500 m-b-20">#1 Leader 1</p>
								<input type="text" class="form-control" id="lead1" name="lead1" required>
							  </div>
							  
							  <div class="form-group">
								<p class="c-black f-500 m-b-20">#2 Leader 2</p>
								<input type="text" class="form-control" id="lead2" name="lead2" required>
							  </div>
							  
							  <div class="form-group">
								<p class="c-black f-500 m-b-20">#3 Leader 3</p>
								<input type="text" class="form-control" id="lead3" name="lead3" required>
							  </div>
							
							<div class="form-group">
                                        <label for="exampleSelect2" class="bmd-label-floating">Pilih Hari</label>
										<select class="form-control" name="hari" id="exampleSelect2" required>
                                                    <option>Pilih Hari</option>
                                                    <option>Minggu</option>
                                                    <option>Senin</option>
                                                    <option>Selasa</option>
                                                    <option>Rabu</option>
                                                    <option>Kamis</option>
                                                    <option>Jumat</option>
                                                    <option>Sabtu</option>													
                                        </select>
                            </div>
							
							<div class="form-group">
								<label for="exampleInputEmail1" class="bmd-label-floating">Tanggal</label>
								<input id="datepicker" name="tanggal" class="form-control" required/>
							</div>
							<script>
								$('#datepicker').datepicker();
							</script>
							
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="c-black f-500 m-b-20">Jam Mulai</p>

                                    <div class="form-group">
                                        <div class="fg-line">
                                            <input id="hourInput" name="jam_mulai" class="form-control" type="number" oninput='format(this)' min="1" max="24" step="1"  required/>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <p class="c-black f-500 m-b-20">Jam Selesai</p>

                                    <div class="form-group">
                                        <div class="fg-line">
                                            <input id="hourInput2" name="jam_selesai" class="form-control" type="number" oninput='format(this)' min="1" max="24" step="1"  required/>
                                        </div>
                                    </div>
                                </div>
								
								
                            </div>
							
							<div class="form-group">
                                        <label for="exampleSelect2" class="bmd-label-floating">Sifat Data</label>
										<select class="form-control" name="sifat" id="sifat" onchange="kunci()" required>
                                                    <option>Pilih Sifat Data</option>
                                                    <option value="surat">Surat</option>
                                                    <option value="presentasi">Presentasi</option>
                                                    <option value="registrasi">Registrasi</option>
                                                    <option value="lainnya">Lainnya</option>													
                                                </select>
								</div>
								
								<div class="form-group">
                                        <label for="exampleSelect2" class="bmd-label-floating">Sifat Data Lainnya</label>
										<input type="text" disabled class="form-control" id="sifat_lain" name="sifat_lain">
								</div>
								
								<div class="form-group">
									<label for="exampleInputEmail1" class="bmd-label-floating">Laporan Kerja</label>
									<textarea name="lap_kerja" class="form-control auto-size" data-autosize-on="true" required style="overflow: hidden; overflow-wrap: break-word; height: 43px;"></textarea>
								</div>
								
								<div class="form-group">
									<label for="exampleInputEmail1" class="bmd-label-floating">Kendala</label>
									<textarea name="kendala" class="form-control auto-size" data-autosize-on="true" required style="overflow: hidden; overflow-wrap: break-word; height: 43px;"></textarea>
								</div>
								
								<div class="form-group">
									<label for="exampleInputEmail1" class="bmd-label-floating">Aksi</label>
									<textarea name="aksi" class="form-control auto-size" data-autosize-on="true" required style="overflow: hidden; overflow-wrap: break-word; height: 43px;"></textarea>
								</div>
								
								<div class="form-group"><p class="c-black f-500 m-b-20">Leader</p>

								<div class="checkbox m-b-15">
									<label>
										<input type="checkbox" id="cb_ld1" name="cb_ld1" value="">
										<i class="input-helper"></i>
										<p id="val_ld1">-</p>
									</label>
								</div>
								<div class="checkbox m-b-15">
									<label>
										<input type="checkbox" id="cb_ld2" name="cb_ld2" value="">
										<i class="input-helper"></i>
										<p id="val_ld2">-</p>
									</label>
								</div>
								<div class="checkbox m-b-15">
									<label>
										<input type="checkbox" id="cb_ld3" name="cb_ld3" value="">
										<i class="input-helper"></i>
										<p id="val_ld3">-</p>
									</label>
								</div>
								</div>
								
								<div class="form-group">
									<label for="exampleInputEmail1" class="bmd-label-floating">Dokumen (Upload barang bukti)</label>
									<input type="file" name="dok" class="form-control-file" id="exampleInputFile" required>
									<small class="text-muted">Format file yang didukung (jpg,jpeg,png). Maksimal upload 2 MB</small>
								</div>
								<button type="submit" class="btn btn-raised btn-block btn-primary">Simpan Data</button>
                        </div>
						
						
							
                        </div>
						</form>
                    </div>


                </div>
            </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
    <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
	
	<script>
	function format(input){
	  if(input.value.length === 1){
		input.value = "0" + input.value;
	  }
	}
	
	function kunci(){
		var lain=document.getElementById("sifat").value;
		//console.log(lain);
		if(lain == "lainnya"){
			document.getElementById("sifat_lain").disabled = false;
		}else{
			document.getElementById("sifat_lain").disabled = true;
		}
	}

	</script>
	
	<script type="text/javascript">  
	<?php echo $jsArray; ?>
	function changeValue(id){
	document.getElementById('lead1').value = prdName[id].ld1;
	document.getElementById('lead2').value = prdName[id].ld2;
	document.getElementById('lead3').value = prdName[id].ld3;
	document.getElementById('cb_ld1').value = prdName[id].ld1;
	document.getElementById('cb_ld2').value = prdName[id].ld2;
	document.getElementById('cb_ld3').value = prdName[id].ld3;
	document.getElementById('val_ld1').innerHTML = prdName[id].ld1;
	document.getElementById('val_ld2').innerHTML = prdName[id].ld2;
	document.getElementById('val_ld3').innerHTML = prdName[id].ld3;
	};
	</script>
	
  </body>
</html>