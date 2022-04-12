<?php 
    session_start();
    if($_SESSION['level'] == 'Biasa') {
      echo 'tidak ada akses';
    } else {
        include 'db.php';
        $id = $_GET['id_user'];

        $hapus = mysqli_query($conn, "DELETE FROM user WHERE id_user = '$id'");

        if($hapus) {
            echo "<script language='javascript'>alert('Berhasil Menghapus Data'); document.location.href='index.php'; </script>";
        } else {
            echo "<script language='javascript'>alert('Gagal Menghapus Data'); document.location.href='index.php'; </script>";
        }
    }
?>