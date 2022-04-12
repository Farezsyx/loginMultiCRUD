<?php
  session_start();
  if($_SESSION['level'] == 'Biasa') {
    echo 'tidak ada akses';
  } else {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Mahasiswa</title>
</head>
<body>
	<h1>EDIT MAHASISWA</h1>
	<?php 
		include 'db.php';
		$id = $_GET['id_user'];

		$edit = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id'");
        $row = mysqli_fetch_array($edit);
	 ?>
	<form method="POST" action="">
		<table>
			<tr>
				<td><input type="hidden" name="nim" value="<?php echo $row['id_user'] ?>"></td>
			</tr>
			<tr>
				<td>NAMA</td>
				<td><input type="text" name="nama" value="<?php echo $row['nama'] ?>" placeholder="Masukkan nama"></td>
			</tr>
			<tr>
				<td>USERNAME</td>
				<td><input type="text" name="username" value="<?php echo $row['username'] ?>" placeholder="Masukkan username"></td>
			</tr>
			<tr>
				<td>PASSWORD</td>
				<td><input type="text" name="password" value="<?php echo $row['password'] ?>" placeholder="Masukkan password"></td>
			</tr>
            <tr>
				<td>LEVEL</td>
				<td>
                    <select name="level" id="">
                        <option hidden value="<?= $row['level'] ?>"><?= $row['level'] ?></option>
                        <option value="Admin">Admin</option>
                        <option value="Biasa">Biasa</option>
                    </select>
                </td>
			</tr>
			<tr>
				<td align="right"><button><a href="index.php">Kembali</a></button></td>
				<td><input type="submit" name="edit" value="Edit"></td>
			</tr>
		</table>
	</form>
	<?php 
		if(isset($_POST['edit'])) {
			include "db.php";
			$nama = $_POST['nama'];
			$user = $_POST['username'];
			$pass = $_POST['password'];
            $lvl = $_POST['level'];
			$edit = mysqli_query($conn, "UPDATE user SET nama = '$nama', username = '$user', password = '$pass', level='$lvl' WHERE id_user = '$id'");

			if ($edit) {
				echo "<script language='javascript'>alert('Berhasil Mengedit Data'); document.location.href='index.php'; </script>";
			} else {
				echo "<script language='javascript'>alert('Gagal Mengedit Data'); document.location.href='tambah.php'; </script>";
			}
 		}
	 ?>
</body>
</html>
<?php } ?>