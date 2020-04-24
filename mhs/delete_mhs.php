<?php 
include("../admin/cek_session.php");
include_once("../koneksi.php"); 
include("../header.php");
?>


<div id="content">
	<div class="content-detail">

		<?php

			// hapus data
		$perintah="DELETE FROM mahasiswa WHERE nim='$_GET[id]'";
		$perintah2 = "DELETE FROM nilai WHERE nim='$_GET[id]'";

		$hasil=mysqli_query($konek, $perintah);
		$hasil2=mysqli_query($konek, $perintah2);

		if ($hasil)
		{
			
			echo "<script languange\"javascript\">";
			echo "window.location.href='../admin/index.php?mhs';";
			echo "</script>";

			?>
			<script>
				//$(document).ready(function() {location.href = 'index.php'; });
			</script>
			<?php
		}
		else
		{
			echo "<br><b>Maaf, Hapus data gagal</b>";
		}
		?>
	</div>
</div>

<?php include("../footer");?>