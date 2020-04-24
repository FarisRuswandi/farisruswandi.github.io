<?php 

include("../admin/cek_session.php");
include_once("../koneksi.php"); 

if( !($_SESSION["index"]) ){
      header("Location: ../admin/index.php?mhs");
	exit;
}
$_SESSION["index"] = false;
?>

<div id="content">
<div class="content-detail">
	<b><font face=arial size=1 style="font-size:15px;">
	&nbsp|&nbsp;<a href="../mhs/input_mhs.php">INPUT DATA MAHASISWA</a>&nbsp|&nbsp;
	&nbsp|&nbsp;<a href="../mhs/search_mhs.php" >SEARCH DATA MAHASISWA</a>&nbsp|&nbsp;
	</font></b>

	<br><br>
<center>
<strong style="font-size:30px;">Daftar Mahasiswa</strong>

<br><br>

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
//PAGING
	$count = 0;
	if(isset($_GET['page']))
	$hal = $_GET['page'];
	else
	$hal = 0;
	
	if(isset($_GET['page']))
	$jlh = $_GET['count'];
	else
	$jlh = 0;
if($jlh <= 0){
	$count = 0;
}
else{
	$count = $jlh;
}

$a = "SELECT COUNT(nim) from mahasiswa";
$b = mysqli_query($konek , $a) or die (mysqli_error());
while ($row = mysqli_fetch_row($b))
{
	$c = $row[0];
}

$d = floor(($c-1)/15)+1;

if($hal<=0){ $hal = 1;}
if($hal> $d){ $hal = $d ;}
// 
$batas = (15*($hal - 1));
if ($batas < 0 ){ $batas2 = 0; }
else {$batas2 = $batas;} 
//PAGING
	$color=0;
	// prerintah menampilkan  mk

	$perintah= "SELECT * FROM mahasiswa order BY nim ASC LIMIT ".$batas2.",15";
	$hasil= mysqli_query($konek, $perintah);
	while($row= mysqli_fetch_array($hasil))
	{
		$dateform = date('d-m-Y', strtotime($row[4])); 
		$color++;
		if($color%2 == 1){$style="white";} else{$style = "azure";}
		echo "<tr bgcolor='".$style."'>";
		echo "<td>$row[0]</td>";
		echo "<td>$row[1]</td>";
		echo "<td>$row[2]</td>";
		echo "<td>$row[3]</td>";
		echo "<td>$dateform</td>";
		echo "<td>$row[5]</td>";
		echo "<td>$row[6]</td>";
		echo "<td>$row[7]</td>";

		
		echo "<td><a href=\"../mhs/edit_mhs.php?id=$row[0]\">Edit</a></td>";
		echo "<td><a href=\"../mhs/confirm.php?id=$row[0]\">Delete</a></td></tr>";

		$count++;
	}

	?>	
</table>
</center>
</div>
</div>


<table align="center">
	<tr>
		<td style="font-size:20px;">
			<?php
			if ($hal>1){
				echo "<a href='?page=".($hal-1)."&count=".(($hal*5)-15)."'><b>&lt;&lt;Previous</b></a>";
			}
			else{
				echo "&lt;&lt;Previous";
			}

			if ($hal<$d){
				echo "&nbsp;&nbsp;&nbsp;<a href='?page=".($hal+1)."&count=".($hal*15)."'><b>Next&gt;&gt;</b></a>";
			}
			else{
				echo "&nbsp;&nbsp;&nbsp;Next&gt;&gt;";
			}

			?>
		</td>
	</tr>
	
	<tr><td style="font-size:20px;">Halaman : <b><?php echo $hal;?></b></td></tr>
	<tr><td style="font-size:20px;">Total Mahasiswa : <b><?php echo $c;?></b></td></tr>

</table>
