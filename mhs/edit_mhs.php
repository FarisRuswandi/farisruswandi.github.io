<?php 
include("../admin/cek_session.php");
include_once("../koneksi.php");
include("../header.php");?>

<div id="content">
	<div class= "content-detail">
		<br>
		<b>Edit Data Mahasiswa : </b>

		<?php 

		$perintah = "SELECT * FROM mahasiswa WHERE nim='$_GET[id]'";
		$hasil = mysqli_query($konek, $perintah);
		$row = mysqli_fetch_array($hasil);

		?>
		<form method=post action=edit_data_mhs.php>
			<input type="hidden" name="id" value="<?php echo "$row[nim]"?>">
			<p>
				NIM
				<br>
				<input type=text name=nim size=20 maxlength=11 value="<?php echo "$row[nim]"?>">
				<br>
				Nama Mahasiswa
				<br>
				<input type=text name=nama_mhs size=50 maxlength=60 value="<?php echo "$row[nama]"?>">
				<br>
				Jenis Kelamin
				<br>
				<select size=1 name="jenis_kelamin" value="<?php echo "$row[jenis_kelamin]"?>">
					<option><?php echo "$row[jenis_kelamin]"?></option>
					<option>Perempuan</option>
					<option>Laki-Laki</option>
				</select>
				<br> 
				Tempat Lahir
				<br>
				<input type= text name=tempat_lahir size=20 maxlength=40 value="<?php echo "$row[tempat_lahir]"?>">
				<br>
				Tanggal Lahir
				<br>
				<input type="date" name="tanggal_lahir" value="<?php echo "$row[tanggal_lahir]"?>" >
				<br>
				Alamat
				<br> 
				<input type="text" name="alamat" size="50" value="<?php echo "$row[alamat]"?>">
				<br>
				<br>
				<input type="submit" value=Save>
				<input type="button" value="Cancel" onClick="self.history.go(-1)"/>
				<br>
				<br>					
			</form>

		</div>
	</div>
<?php include("../footer.php");?>

