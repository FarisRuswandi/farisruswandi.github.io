<?php 
include("../admin/cek_session.php");
include_once("../koneksi.php"); 
include("../header.php");?>


<div id="content">
<div class="content-detail">

<html>
<center><h2 style="font-size:30px;">Pencarian Data Mahasiswa</h2></center><br>

<script type="text/javascript">
				function validate(){
					obj = document.form1;
					nim = obj.nim.value;
					nama = obj.nama.value;
					jenis_kelamin = obj.jenis_kelamin.value;
					tempat_lahir = obj.tempat_lahir.value;
					angkatan = obj.angkatan.value;
					program = obj.program.value;

					
					submitOK="True";

					if ((nim == "")&&(nama == "")&&(jenis_kelamin == "")&&(tempat_lahir == "")&&(angkatan == "")&&(program == "")){
						alert("Harus ada data yang Diisi!");
						obj.nim.focus();
						return false;
					}

					if (submitOK == false){
						return false;
					}
				}
			</script>

<form name=form1 method=post action=search_mhs_proses.php onsubmit="return validate()">
<pre>
NIM                                 <input type=text name=nim size=30 ><br>
Nama                                <input type=text name=nama size=30 ><br>
Jenis Kelamin (Laki-Laki/Perempuan) <input type=text name=jenis_kelamin size=30><br>
Tempat Lahir                        <input type=text name=tempat_lahir size=30><br>
Angkatan                            <input type=text name=angkatan size=20><br>
Program                             <input type=text name=program size=20><br>

</pre>
<input type=submit value=Search><br><br>
</form>
</html>

</div>
</div>
<?php include("../footer.php");?>

