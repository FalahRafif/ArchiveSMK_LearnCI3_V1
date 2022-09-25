<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Daftar UKS</title>
</head>

<body>

	<h1>Daftar Mahasiswa</h1>


	<table border="1px solid black">
		<tr>
			<th>No</th>
			<th>Nama UKS</th>
			<th>Alamat</th>
			<th>No Telp</th>
		</tr>
        
		<?php $i = 1 ?>
		<?php foreach($uks as $uks) : ?>
		<tr>
			<td><?= $i ?></td>
			<td><?= $uks ['nama'] ?></td>
			<td><?= $uks ['alamat'] ?></td>
			<td><?= $uks ['notelp'] ?></td>

		</tr>

		<?php $i++ ?>
		<?php endforeach ?>
	</table>


</body>

</html>