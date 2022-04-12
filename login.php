<?php
  if(isset($_SESSION['user'])) {
    header('location:index.php');
  } else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Multiuser</title>
</head>
<body>
    <h2>LOGIN MULTIUSER</h2>
    <form action="" method="post">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" id=""></td>
            </tr>
            <tr>
                <td>Passwrod</td>
                <td><input type="password" name="password" id=""></td>
            </tr>
            <tr>
                <td><input type="submit" value="login" name="masuk"></td>
            </tr>
        </table>
    </form>
    <?php
    if (isset($_POST['masuk'])) {
        include 'db.php';

        $username = $_POST['username'];
        $password = $_POST['password'];
        $login = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password='$password'");
        $data = mysqli_fetch_array($login);
          $cek = mysqli_num_rows($login);
          $user = $data['nama'];
          $level = $data['level'];
        
          if($cek > 0) {
            session_start();
            $_SESSION['user'] = $user;
            $_SESSION['level'] = $level;

        echo "<script language='javascript'>alert('Selamat datang $user anda login sebagai $level'); document.location.href='index.php'; </script>";
      } else {
        echo "<script language='javascript'>alert('Username atau Password Salah'); document.location.href='login.php'; </script>";
      }
    }
    ?>
</body>
</html>
<?php } ?>