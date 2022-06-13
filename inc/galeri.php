<?php
if (@$_SESSION["user"]) {
?>
<title><?php echo $data2["nama_user"];?> | Galeri - 8.5 Web Grup</title>
<?php
}
else{
?>
<title>Galeri - 8.5 Web Grup</title>
<?php
}
?>
<style>
	.teguh{
		border-radius:100%;
		transition: border-radius 0.5s;
	}
	.teguh:hover{
		border-radius:10px;
	}
</style>
<div id="page-inner">
 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Galeri 8.5 Web Grup</h1>
                        <h1 class="page-subhead-line"><li class="fa fa-photo"></li> Semua Foto Dari Postingan Ada Disini</h1>
                  
            </div>
            </div>
<?php
$batas = 8;
if (isset($_GET["hal"])) {
	$hal = $_GET["hal"];
	$posisi = ($hal-1)*$batas;
}
else{
	$hal = 1;
	$posisi = 0;
}
$querygambar = mysqli_query($db, "SELECT*FROM post WHERE gambar_post != '' ORDER BY id_post DESC LIMIT $posisi, $batas");
$qwertyuiopasdfghjklzxcvbnm = mysqli_num_rows($querygambar);
if ($qwertyuiopasdfghjklzxcvbnm > 0) {
while ($datagambar = mysqli_fetch_array($querygambar)) {
		
?>
<a title="<?php echo $datagambar["judul_post"];?>"  href="./?p=post&id=<?php echo $datagambar["id_post"];?>&post_by=<?php echo $datagambar["penulis_post"];?>"><img class="img img-thumbnail teguh" src="./assets/img/post/<?php echo $datagambar["gambar_post"];?>" style="width:49%;height:250px;"></a>
<?php
	}
}
else{
?>
<div class="alert alert-info">Belum Ada Gambar Yang Dapat Di Tampilkan</div>
<?php
}
?>
<div style="margin-top:30px;">
<?php
$querygambar2 = mysqli_query($db, "SELECT*FROM post WHERE gambar_post !=''");
$hitung2 = mysqli_num_rows($querygambar2);
$bagi = ceil($hitung2/$batas);

for ($i=1; $i <= $bagi ; $i++) { 
	if ($hal==$i) {
                                    echo "<span style='background:grey;border-radius:100%;padding:10px;color:lightblue;'>$i</span> ";
                                }
                                else{
                                    echo "<a href='./?p=galeri&hal=$i'><span class='badge'>$i</span></a> ";
                                }
}
?>
           
            </div>
            </div>
