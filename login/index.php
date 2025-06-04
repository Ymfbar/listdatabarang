<?php
include "../db.php";
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>DoTuDu</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-md-4 bg-white p-4 rounded shadow">
      <h2 class="mb-4 text-center">Do Tu Du</h2>
      <form method="POST">
        <input type="text" name="username" class="form-control mb-2" placeholder="Username" required>
        <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
        <div class="d-grid">
          <button class="btn btn-success" name="login">Login</button>
        </div>
        <div class="text-center mt-3">
          <a href="register.php" class="btn btn-link">Register</a>
        </div>
      </form>

      <?php
      if (isset($_POST['login'])) {
          $user = $_POST['username'];
          $pass = $_POST['password'];

          // Query dengan prepared statement untuk keamanan
          $stmt = $koneksi->prepare("SELECT * FROM users WHERE username = ?");
          $stmt->bind_param("s", $user);
          $stmt->execute();
          $result = $stmt->get_result();
          $res = $result->fetch_assoc();

          if ($res && password_verify($pass, $res['password'])) {
              $_SESSION['user_id'] = $res['id']; // Pastikan hanya menyimpan ID pengguna
              header("Location: /listdatabarang/");
          } else {
              echo "<div class='alert alert-danger mt-2'>Username atau password salah!</div>";
          }
      }
      ?>
    </div>
  </div>

</body>
</html>
