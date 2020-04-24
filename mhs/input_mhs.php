<?php 
include("../admin/cek_session.php");
include("../header.php")
?>

	<div id="content">
		<div class="content-detail">
			<center><h2 style="font-size:30px;">Input Data Mahasiswa</h2></center>
			<script type="text/javascript">
				function validate(){
					obj = document.form1;
					nim = obj.nim.value;
					nama_mhs = obj.nama_mhs.value;
					jenis_kelamin = obj.jenis_kelamin.selectedIndex;
					tempat_lahir = obj.tempat_lahir.value;
					tanggal_lahir = obj.tanggal_lahir.value;
					alamat = obj.alamat.value;
					submitOK="True";

					if (nim == ""){
						alert("NIM Harus Diisi!")
						obj.nim.focus()
						return false;
					}
					if (nama_mhs == ""){
						alert("Nama Mahasiswa Harus Diisi")
						obj.nama_mhs.focus()
						return false;
					}
					if(jenis_kelamin == ""){
						alert("Jenis Kelamin Harus Diisi")				
						return false;
					}
					if (tempat_lahir == ""){
						alert("Tempat Lahir Harus Diisi")
						obj.tempat_lahir.focus()
						return false;
					}
					if (tanggal_lahir == ""){
						alert("Tanggal Lahir Harus Diisi")
						obj.tanggal_lahir.focus()
						return false;
					}
					if(alamat == ""){
						alert("Alamat harus diisi")
						obj.alamat.focus()
						return false;
					}

					if (submitOK == false){
						return false;
					}
				}
			</script>

			<form name=form1 method=post action=input_mhs_proses.php onsubmit="return validate()">		
				<!-- <form name=form1 method=post action=# onsubmit="return validate()">		 -->
					<p>
						NIM
						<br>
						<input type= text name=nim size=20 maxlength=11>
						<br>
						Nama Mahasiswa
						<br>
						<input type= text name=nama_mhs size=50 maxlength=60>
						<br>
						Jenis Kelamin
						<br>
						<select size=1 name="jenis_kelamin">
							<option selected="Pilih Jenis Kelamin">Pilih Jenis Kelamin</option>
							<option>Perempuan</option>
							<option>Laki-laki</option>
						</select>
						<br> 
						Tempat Lahir
						<br>
						<input type= text name=tempat_lahir size=20 maxlength=40>
						<br>
						Tanggal Lahir
						<br>
						<input type="date" name="tanggal_lahir" >
						<br>
						Alamat
						<br> 
						<input type="text" name="alamat" size="50">
						<br>
						<br>
						<input type="submit" value=Proses>
						<input type="reset" value=Clear>
						<br>
						<br>
					</p>
				</form>
			</div>
		</div>
<?php include("../footer.php");?>
