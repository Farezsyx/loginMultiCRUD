<?php
  session_start();
  if(!$_SESSION['user']) {
    header('location:login.php');
  } else {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home user <?= $_SESSION['level'] ?></title>
</head>
<body>
	<h1>Selamat datang <?php echo $_SESSION['user']; ?></h1>
    <h2>Anda adalah user <?= $_SESSION['level'] ?></h2>
	<h2>DATA USER</h2>
	<?php 
        if($_SESSION['level']=="Admin"){
    ?>
    <p size='15px'><a href="tambah.php">TAMBAH DATA</a> 
    <?php } ?>
    || <a href="logout.php">LOGOUT</a></p>
	<table border="2">
		<tr>
			<td>ID</td>
			<td>NAMA</td>
			<td>USERNAME</td>
			<td>PASSWORD</td>
            <td>LEVEL</td>
            <?php 
                if($_SESSION['level']=="Admin"){
            ?>
			<td colspan="2">AKSI</td>
            <?php } ?>
		</tr>
		<?php 
            include 'db.php';
            $data = mysqli_query($conn, "SELECT * FROM user");
            $cek = mysqli_num_rows($data);
            if($cek > 0) {
            while($row = mysqli_fetch_assoc($data)) {
        ?>
		<tr>
			<td><?php echo $row['id_user']; ?></td>
			<td><?php echo $row['nama']; ?></td>
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['password']; ?></td>
            <td><?php echo $row['level']; ?></td>
            <?php 
                if($_SESSION['level']=="Admin"){
            ?>
			<td><a href="edit.php?id_user=<?php echo $row['id_user'] ?>">EDIT</a></td>
			<td><a href="hapus.php?id_user=<?php echo $row['id_user'] ?>">HAPUS</a></td>
            <?php } ?>
		</tr>
		<?php }} else { ?>
			<tr>
				<td colspan="5">TIDAK ADA DATA</td>
			</tr>
		<?php } ?>
	</table>
</body>
</html>
<?php } ?>