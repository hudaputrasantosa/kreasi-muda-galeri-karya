<?php
if (@$_SESSION["user"]) {
?>
<title>Daftar Pengguna - <?php echo $data2["nama_user"];?> | Kreasi Muda BPMPK</title>
<div id="page-inner">
<div class="panel-group">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3><b><?php $totaldaftarpengguna = mysqli_num_rows($query1); echo $totaldaftarpengguna;?></b> Pengguna Terdaftar :</h3>
		</div>
		<div class="panel-body">
			<table class='table'>
				<thead>
				<th>No</th>
				<th>Nama</th>
				<th>Username</th>
				<th>Status</th>
				<?php
				if (@$data2["level_user"] == '1') {
				echo "<th>Hapus</th>";
				}
				?>
				</thead>
				<tbody>
				<?php
				$no10 = 1;
				while ($data1 = mysqli_fetch_array($query1)) {
				?>
				<tr>
					<td><?php echo $no10;?></td>
					<td><a href="./?p=user&user=<?php echo $data1["user_user"];?>"><?php echo $data1["nama_user"];?></a></td>
					<td>@<?php echo $data1["user_user"];?></td>
					<?php
					if ($data1["status_user"] == 'Online') {
					?>
					<td><a href='#' class="btn btn-success">Online</a></td>
					<?php
					}
					elseif ($data1["status_user"] == "Offline") {
					?>
					<td><a href='#' class="btn btn-default">Offline</a></td>
					<?php
					}
					if (@$data2["level_user"] == '1' && $data1["user_user"] !== $data2["user_user"]) {
					?>
						<td><a class='btn btn-danger' onclick="return confirm('Hapus Orang Ini?')" href='./inc/hapus-user123123.php?user=<?php echo $data1["user_user"];?>'>Hapus</a></td>
					<?php
					}
					?>
					</tr>
				<?php
				$no10++;
				}
				?>
				</tbody>
			</table>
		</div>
		<div class="panel-footer">
			
		</div>
	</div>
</div>
            </div>
<?php
}
else{
?>
<title>Daftar Pengguna - 8.5 Web Grup</title>
<div id="page-inner">
<div class="panel-group">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3><b><?php $totaldaftarpengguna = mysqli_num_rows($query1); echo $totaldaftarpengguna;?></b> Pengguna Terdaftar :</h3>
		</div>
		<div class="panel-body">
			<table class='table'>
				<thead>
				<th>No</th>
				<th>Nama</th>
				<th>Username</th>
				<th>Status</th>
				
				</thead>
				<tbody>
				<?php
				$no10 = 1;
				while ($data1 = mysqli_fetch_array($query1)) {
				?>
				<tr>
					<td><?php echo $no10;?></td>
					<td><a href="./?p=user&user=<?php echo $data1["user_user"];?>"><?php echo $data1["nama_user"];?></a></td>
					<td>@<?php echo $data1["user_user"];?></td>
					<?php
					if ($data1["status_user"] == 'Online') {
					?>
					<td><a href='#' class="btn btn-success">Online</a></td>
					<?php
					}
					elseif ($data1["status_user"] == "Offline") {
					?>
					<td><a href='#' class="btn btn-default">Offline</a></td>
					<?php
					}
					?>
					</tr>
				<?php
				$no10++;
				}
				?>
				</tbody>
			</table>
		</div>
		<div class="panel-footer">
			
		</div>
	</div>
</div>
            </div>
<?php
}
?>
