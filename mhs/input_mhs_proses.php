<?php 
include("../admin/cek_session.php");
include_once("../koneksi.php"); 
include("../header.php");?>


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
		if(!empty($nim) AND !empty($nama_mhs) AND !empty($tempat_lahir))
		{
		if(preg_match("/ /i", $nim))
		{
				echo "<script language\"javascript\">";
        echo "alert(\"NIM Tidak Boleh Ada SPASI!!!\");";
        echo "self.history.go(-1);";
        echo "</script>";
 		}
		else {
		$isi= "INSERT into mahasiswa values ('$nim', '$nama_mhs', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$angkatan', '$program')";
		$result=mysqli_query($konek, $isi) or die ("Error - Input data gagal");
		if($result)
		{
		echo "<tr><td>$nim</td>";
		echo "<td>$nama_mhs</td>";
		echo "<td>$jenis_kelamin</td>";
		echo "<td>$tempat_lahir</td>";
		echo "<td>$tanggal_lahir</td>";
		echo "<td>$alamat</td>";
		echo "<td>$angkatan</td>";
		echo "<td>$program</td>";

		echo "<td><a href=\"edit_mhs.php?id=$nim\">Edit</a></td>";
		}
		}
		}

		else
		{
		echo "<br><b>Maaf Input data kurang lengkap...</b>";
		}

		?>
		</table>

    </div>  
  </div>
  
    <font face=arial size=1> 
		&nbsp|&nbsp;<a href = "../mhs/input_mhs.php">INPUT AGAIN</a>&nbsp|&nbsp;
    </font> 

<?php include("../footer.php");?>
