<?php
session_start();
include("../config/database.php");

$alert = "";

// ===== LOGIN =====
if (isset($_POST['login'])) {
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = $_POST['password'];

  $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
  $user = mysqli_fetch_assoc($result);

  if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['username'] = $user['username'];

    // ✅ semua user masuk ke frontend
    header("Location: ../frontend/Home.php");
    exit;
  } else {
    $alert = "<div class='alert alert-danger text-center'>Email atau Password salah!</div>";
  }
}


// ===== REGISTER =====
if (isset($_POST['register'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
  if (mysqli_num_rows($check) > 0) {
    $alert = "<div class='alert alert-warning text-center'>Email sudah terdaftar!</div>";
  } else {
    $sql = "INSERT INTO users (username,email,password,role) VALUES ('$username','$email','$password','user')";
    if (mysqli_query($conn, $sql)) {
      $alert = "<div class='alert alert-success text-center'>Registrasi berhasil, silakan login.</div>";
    } else {
      $alert = "<div class='alert alert-danger text-center'>Gagal mendaftar!</div>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Petani Muda | Login & Register</title>
  <link rel="icon" type="image/x-icon" href="../public/img/logo/PetaniMuda.id2.png">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../public/css/login.css">
</head>
<body>

  <div class="wrapper">
    <span class="close"><ion-icon name="close"></ion-icon></span>

    <?= $alert; ?>

    <!-- LOGIN -->
    <div class="form-box login">
      <h2>Login</h2>
      <form action="" method="POST">
        <div class="input-box">
          <span class="icon"><ion-icon name="mail"></ion-icon></span>
          <input type="email" name="email" required>
          <label>Email</label>
        </div>
        <div class="input-box">
          <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
          <input type="password" name="password" required>
          <label>Password</label>
        </div>
        <div class="remember-forgot">
          <label><input type="checkbox">Remember me</label>
          <a href="#">Forgot Password?</a>
        </div>
        <button type="submit" name="login" class="btn">Login</button>
        <div class="login-register">
          <p>Belum punya akun? <a href="#" class="register-link">Daftar</a></p>
        </div>
      </form>
    </div>

    <!-- REGISTER -->
    <div class="form-box register">
      <h2>Register</h2>
      <form action="" method="POST">
        <div class="input-box">
          <span class="icon"><ion-icon name="person"></ion-icon></span>
          <input type="text" name="username" required>
          <label>Username</label>
        </div>
        <div class="input-box">
          <span class="icon"><ion-icon name="mail"></ion-icon></span>
          <input type="email" name="email" required>
          <label>Email</label>
        </div>
        <div class="input-box">
          <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
          <input type="password" name="password" required>
          <label>Password</label>
        </div>
        <div class="remember-forgot">
          <label><input type="checkbox" required> Saya setuju dengan syarat & ketentuan</label>
        </div>
        <button type="submit" name="register" class="btn">Register</button>
        <div class="login-register">
          <p>Sudah punya akun? <a href="#" class="login-link">Login</a></p>
        </div>
      </form>
    </div>

    <!-- FORGOT PASSWORD -->
    <div class="form-box forgot">
      <h2>Lupa Password</h2>
      <form action="">
        <div class="input-box">
          <span class="icon"><ion-icon name="mail"></ion-icon></span>
          <input type="email" required>
          <label>Masukkan Email Anda</label>
        </div>
        <button type="submit" class="btn">Kirim Reset Link</button>
        <div class="login-register">
          <p>Sudah ingat password? <a href="#" class="login-link">Login</a></p>
        </div>
      </form>
    </div>
  </div>

  <script src="../public/js/login.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
