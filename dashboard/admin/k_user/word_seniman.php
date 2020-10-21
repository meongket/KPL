<?php
include('include/conn.php');
header("Content-Type: application/force-download");
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 2010 05:00:00 GMT");
header("content-disposition: attachment;filename=report_Seniman.doc");
?>

<center><h2>Rekap Data Seniman</h2></center>
<table border='1'>
<h3>
<thead><tr>
<td width=52>No.</td>
<td width=200>NIK</td>
<td width=150>Nama</td>
<td width=180>Telepon</td>
<td width=200>Alamat</td>
<td width=150>Nama Organisasi</td>
<td width=150>Jumlah Anggota</td>

<td width=150>Berlaku</td>
<td width=150>Sampai</td>
<td width=100>Status</td>
</tr></thead>
<h3><tbody>

<?php
$n=0;
$d = mysql_query("select * from seniman ");
while($kesenian=mysql_fetch_array($d)){
?>
	<tr>
	<td><?php echo $n=$n+1;?></td>
	<td align="center"><?php echo $kesenian['nik']; ?></td>
	<td align="center"><?php echo $kesenian['nama']; ?></td>
	<td align="center"><?php echo $kesenian['telepon']; ?></td>
	<td align="center"><?php echo $kesenian['alamat']; ?></td>
	<td align="center"><?php echo $kesenian['namaorga']; ?></td>
	<td align="center"><?php echo $kesenian['jmlanggota']; ?></td>
	<td align="center"><?php echo $kesenian['berlakuawal']; ?></td>
	<td align="center"><?php echo $kesenian['berlakuakhir']; ?></td>
	<td align="center"><?php echo $kesenian['status']; ?></td>
	</tr>
		
<?php
}

?>
</tbody></h3></table>