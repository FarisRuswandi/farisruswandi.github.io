<?php 
include("../admin/cek_session.php");
include_once("../koneksi.php"); 
include("../header.php");

?>


<div id="content">
<div class="content-detail">

<?php

$perintah="SELECT * FROM mahasiswa WHERE nim='$_GET[id]'";
$hasil=mysqli_query($konek, $perintah);
$row=mysqli_fetch_array($hasil);
?>
<br>
<form name="delete" method="GET" action="../mhs/delete_mhs.php?id=<?php echo $row['nim'];?>">
<input type="hidden" name="id" value="<?php echo $row['nim']; ?>">
<table align="center" id="tbl_confirm" width="400" cellspacing="0" cellpadding="0">
<tr><td align="center" colspan="2" style="background-color:#dedede;"><b>Konfirmasi Untuk Menghapus Data</b></td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td align="left" width="30%" style="padding-left:10px"><b>NIM</b></td>
<td align="left" width="70%"><b>:</b> "<?php echo $row['nim']?>"</td></tr>
<tr><td align="left" width="30%" style="padding-left:10px"><b>Nama</b></td>
<td align="left" width="70%"><b>:</b> "<?php echo $row['nama']?><b>:</b> "</td></tr>
<tr><td align="left" width="30%" style="padding-left:10px"><b>Jenis Kelamin</b></td>
<td align="left" width="70%"><b>:</b> "<?php echo $row['jenis_kelamin']?>"</td></tr>
<tr><td align="left" width="30%" style="padding-left:10px"><b>Tempat Lahir</b></td>
<td align="left" width="70%"><b>:</b> "<?php echo $row['tempat_lahir']?>"</td></tr>
<tr><td align="left" width="30%" style="padding-left:10px"><b>Tanggal Lahir</b></td>
<td align="left" width="70%"><b>:</b> "<?php 
$dateform= date('d-m-Y', strtotime($row['tanggal_lahir']));
echo $dateform ?>"</td></tr>
<tr><td align="left" width="30%" style="padding-left:10px"><b>Alamat</b></td>
<td align="left" width="70%"><b>:</b> "<?php echo $row['alamat']?>"</td></tr>
<tr><td align="left" width="30%" style="padding-left:10px"><b>Angkatan</b></td>
<td align="left" width="70%"><b>:</b> "<?php echo $row['angkatan']?>"</td></tr>
<tr><td align="left" width="30%" style="padding-left:10px"><b>Program</b></td>
<td align="left" width="70%"><b>:</b> "<?php echo $row['program']?>"</td></tr>
<tr><td colspan="2" style="text-align:center;"><br>Apakah Anda yakin akan menghapus data ini?</td>
<tr><td colspan="2" style="text-align:center;"><br>
<input type="submit" name="del" value=" Ya " />&nbsp;&nbsp;
<input type="button" value="Tidak" onClick="self.history.go(-1)"/></td></tr>
<tr><td colspan="2" class="no-border">&nbsp;</td></tr>
</table>
</form>
</div>
<div>

<?php include("../footer.php");?>
