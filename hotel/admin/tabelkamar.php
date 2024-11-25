<h2>Tabel Kamar</h2>
<div class="alert alert-info">TABEL DATA KAMAR</div>
<A href="index.php?module=inputkamar" class="btn btn-primary">Tambah Data</a>
<table width="100%" border="1" class="table table-bordered table-striped">

<tr> 
<th>No</th>
<th>No Kamar</th>
<th>Jenis</th>
<th>Tempat Type</th>
<th>Tarif</th>
<th>Aksi</th>
</tr>


<?php  
include "koneksi.php";
$sql = mysqli_query($con,"select * from kamar");
$no=1;
while($row=mysqli_fetch_array($sql)){

?>

<tr>
<td align="center"><?php echo $no; ?></td>
<td align="center"><?php echo $row['No_Kamar'] ?> </td>
<td align="center"><?php echo $row['Jenis'] ?> </td>
<td align="center"><?php echo $row['Type'] ?> </td>
<td align="center"><?php echo $row['Tarif'] ?> </td>


<td align="center">
<a href="index.php?module=editkamar&No_Kamar=<?php echo $row['No_Kamar'];?>"class="btn btn-success">Edit</a>
<a href="index.php?module=hapuskamar&No_Kamar=<?php echo $row['No_Kamar'];?>"class="btn btn-danger">Hapus</a>
</td>
</tr>

<?php 
$no++;
}
?>
</table> 