<?php
  session_start();
  if($_SESSION['level'] == 'Biasa') {
    echo 'tidak ada akses';
  } else {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah USER</title>
</head>
<body>
	<h1>TAMBAH USER</h1>
	<form method="POST" action="">
		<table>
			<tr>
				<td>NAMA</td>
				<td><input type="text" name="nama" placeholder="Masukkan nama"></td>
			</tr>
			<tr>
				<td>USERNAME</td>
				<td><input type="text" name="username" placeholder="Masukkan username"></td>
			</tr>
			<tr>
				<td>PASSWORD</td>
				<td><input type="text" name="password" placeholder="Masukkan password"></td>
			</tr>
            <tr>
				<td>LEVEL</td>
				<td>
                    <select name="level" id="">
                        <option value="Admin">Admin</option>
                        <option value="Biasa">Biasa</option>
                    </select>
                </td>
			</tr>
			<tr>
				<td align="right"><button><a href="index.php">Kembali</a></button></td>
				<td><input type="submit" name="tambah" value="Tambah"></td>
			</tr>
		</table>
	</form>
	<?php 
		if(isset($_POST['tambah'])) {
			include "db.php";
			$nama = $_POST['nama'];
			$user = $_POST['username'];
			$pass = $_POST['password'];
            $lvl = $_POST['level'];
			$tambah = mysqli_query($conn, "INSERT INTO user VALUES ('', '$nama', '$user', '$pass', '$lvl')");

			if ($tambah) {
				echo "<script language='javascript'>alert('Berhasil Menambah Data'); document.location.href='index.php'; </script>";
			} else {
				echo "<script language='javascript'>alert('Gagal Menambah Data'); document.location.href='tambah.php'; </script>";
			}
 		}
	 ?>
</body>
</html>
<?php } ?>