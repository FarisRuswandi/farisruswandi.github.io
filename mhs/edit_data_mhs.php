<?php 
include("../admin/cek_session.php");
include_once("../koneksi.php");
include("../header.php") ;

?>

<div id="content">
	<div class="content-detail">	

		<?php 
		$nim=$_POST['nim'];
		$nama_mhs=$_POST['nama_mhs'];
		$tempat_lahir=$_POST['tempat_lahir'];
		$tanggal_lahir= $_POST['tanggal_lahir'];
		$jenis_kelamin= $_POST['jenis_kelamin'];
		$alamat = $_POST['alamat'];
		$angkatan = "20".substr($nim ,5, 2) ;
		if(substr($nim,4,1) == "2"){
			$program = "REG B";
		} else{
			$program = "REG A";			
		}

		echo "<br><br>";
		?>
		

		<table border="1">
			<tr>
				<td><b>NIM</b></td>
				<td><b>Nama Mahasiswa</b></td>
				<td><b>L/P</b></td>
				<td><b>Tempat Lahir</b></td>
				<td><b>Tanggal Lahir</b></td>
				<td><b>Alamat</b></td>		
				<td><b>Angkatan</b></td>		
				<td><b>Program</b></td>	
			</tr>

			<?php

		//cek agar data harus lengkap


			if(preg_match("/ /i", $nim))
			{
				echo "alert(\"NIM Tidak Boleh Ada SPASI!!!\");";
				echo "<br><br><input type=button value=Back onclick=self.history.back()>";
				echo "<br><br>";
			}

			else {
				$perintah="UPDATE mahasiswa set nim='$nim', nama='$nama_mhs',jenis_kelamin='$jenis_kelamin', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir',alamat='$alamat',angkatan='$angkatan',program='$program' WHERE nim='$_POST[id]'";
				$hasil = mysqli_query($konek, $perintah);

				if($hasil){
					echo "<tr><td>$nim</td>";
					echo "<td>$nama_mhs</td>";
					echo "<td>$jenis_kelamin</td>";
					echo "<td>$tempat_lahir</td>";
					echo "<td>$tanggal_lahir</td>";
					echo "<td>$alamat</td>";
					echo "<td>$angkatan</td>";
					echo "<td>$program</td>";
				}
				else{ echo "Update Gagal";}

				echo "<td><a href =\"edit_mhs.php?id=$nim\">Edit</a></td>";
			}
			?>
		</table>

	</div>
</div>

<?php include("../footer.php");?>