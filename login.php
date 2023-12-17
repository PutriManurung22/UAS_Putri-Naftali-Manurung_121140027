<?php
include "dbconn.php";
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = sha1($_POST['password']);

    if ($username == "" && $password == "") {
      echo"<script>alert('Silahkan lengkapi informasi login'); document.location = 'login.php';</script>";
    }elseif ($username == "") {
      echo"<script>alert('Silahkan lengkapi informasi login'); document.location = 'login.php';</script>";
    }elseif($password == ""){
      echo"<script>alert('Silahkan lengkapi informasi login'); document.location = 'login.php';</script>";
    }else {
      $login = mysqli_query($dbconn, "SELECT * FROM admin where username='$username' AND password='$password'");
      if (mysqli_num_rows($login)) {
          
          $_SESSION['admin'] = mysqli_fetch_array($login);
          echo"<script>alert('login berhasil'); document.location = 'index.php';</script>";
      }else {
        echo"<script>alert('input yg anda masukan salah silahkan coba lagi'); document.location = 'login.php';</script>";
    }
  }
}elseif (isset($_POST['signup'])) {
    $nama= $_POST['nama'];
    $username= $_POST['username'];
    $password= sha1($_POST['password']);

    $admin = mysqli_query($dbconn,"SELECT * FROM admin");
    $data = mysqli_fetch_array($admin);


    if ($nama == "" || $username == "" || $password == "") {
        echo"<script>alert('jangan konsongkan form input silahkan login ulang');</script>";
    }else{
        if ($username != $data['username']) {
        mysqli_query($dbconn, "INSERT INTO admin(nama, username, password) VALUES ('$nama','$username','$password')");
        echo"<script>alert('Registrasi Akun Berhasil'); document.location = 'login.php';</script>";
        
        }else {
            echo"<script>alert('username sudah digunakan silahkan registrasi ulang'); document.location = 'login.php';</script>";
        }
    }


    
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="shortcut icon" href="img/apple-touch-icon.png" type="image/png">
    <title>Login</title>
    <style>
        /* style/login.css */

/* Reset CSS */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: Arial, sans-serif;
  background-color: #f8f8f8;
}

/* Wrapper styles */
.wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

/* Form styles */
.form {
  background-color: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  text-align: center;
}

.form header {
  font-size: 24px;
  margin-bottom: 20px;
}

.form img {
  width: 100px;
  margin-bottom: 20px;
}

.form input[type="text"],
.form input[type="password"],
.form input[type="submit"] {
  width: 100%;
  margin-bottom: 15px;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.form input[type="submit"] {
  background-color: #333;
  color: #fff;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.form input[type="submit"]:hover {
  background-color: #555;
}

/* Responsive styles */
@media (max-width: 768px) {
  .form {
    width: 80%;
  }
}
</style>
  </head>
  <body>
    <section class="wrapper">
      <div class="form signup">
        <header>Login</header>
        <img src="img/login.png" alt="">
        <form method="post" enctype="multipart/form-data">
          <input type="text" name="username" placeholder="Username" required />
          <input type="password" name="password" placeholder="Password" required />
          <input type="submit" value="Login" name="login" />
        </form>
      </div>
      <script src="script/login.js"></script>
    </section>
  </body>
</html>