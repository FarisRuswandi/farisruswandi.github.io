<?php 
include("../admin/cek_session.php");
include_once("../koneksi.php"); 
include("../header.php");?>


<div id="content">
<div class="content-detail">

<?php
$nim=$_POST['nim'];
$nama=$_POST['nama'];
$jenis_kelamin=$_POST['jenis_kelamin'];
$tempat_lahir=$_POST['tempat_lahir'];
$angkatan=$_POST['angkatan'];
$program=$_POST['program'];
?>
<b><font face=arial size=1 style="font-size:15px;">
&nbsp|&nbsp;<a href = "search_mhs.php">SEARCH AGAIN</a>&nbsp|&nbsp;
</font></b>
<br>
<br>
<center><strong style="font-size:30px;">Hasil Pencarian</strong></center>
<br><br>

<table border="1">
<tr>

<td><b>NIM</b></td>
<td><b>Nama</b></td>
<td><b>Jenis Kelamin</b></td>
<td><b>Tempat Lahir</b></td>
<td><b>Tanggal Lahir</b></td>
<td><b>Alamat</b></td>
<td><b>Angkatan</b></td>
<td><b>Program</b></td>

</tr>
<?php

$perintah="SELECT * FROM mahasiswa WHERE nim LIKE '%$nim%' AND nama LIKE '%$nama%' AND jenis_kelamin LIKE '%$jenis_kelamin%'
 AND tempat_lahir LIKE '%$tempat_lahir%' AND angkatan LIKE '%$angkatan%' AND program LIKE '%$program%'";
$hasil=mysqli_query($konek, $perintah);
$count=0;
while($row=mysqli_fetch_array($hasil))
{
	$index=($count+1);
	if ($count%2 == 1) { $style="row1"; }
	else {
	$style="row2"; }
	
	echo"<tr class='".$style."'>";
	
	echo "<td>$row[0]</td>";
	echo "<td>$row[1]</td>";
	echo "<td>$row[2]</td>";
	echo "<td>$row[3]</td>";
	echo "<td>$row[4]</td>";
	echo "<td>$row[5]</td>";
	echo "<td>$row[6]</td>";
	echo "<td>$row[7]</td>";


echo "<td><a href=\"edit_mhs.php?id=$row[0]\">Edit</a></td>";
echo "<td><a href=\"confirm.php?id=$row[0]\">Delete</a></td>";
$count++;
}


?>
</tr>
</table>
<br>



&nbsp;&nbsp;Total : <b><?php echo $count;?></b>
<br><br>

</div>
</div>
<?php include("../footer.php");?>
