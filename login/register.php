<?php include "../db.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Do Tu Du</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
      background: url('../assets/login.jpg') no-repeat center center fixed;
      background-size: cover;
      min-height: 100vh;
    }
    .register-box {
      background-color: rgba(255, 255, 255, 0.9); /* semi-transparan */
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0,0,0,0.2);
    }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-md-4 register-box">
      <h2 class="mb-4 text-center">Do Tu Du</h2>
        <form method="POST">
            <input type="text" name="username" class="form-control mb-2" placeholder="Username" required>
            <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
            <div class="d-grid">
            <button class="btn btn-secondary" name="login">Register</button>
            </div>
            <div class="text-center mt-3">
                <a href="index.php" class="btn btn-link">Sudah punya akun? Login</a>
            </div>
        </form>

        <?php
        if (isset($_POST['register'])) {
            $user = $_POST['username'];
            $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $stmt = $koneksi->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $user, $pass);

            if ($stmt->execute()) {
                echo "<div class='alert alert-success mt-3'>Berhasil daftar!</div>";
            } else {
                echo "<div class='alert alert-danger mt-3'>Username sudah digunakan.</div>";
            }
        }
        ?>
    </div>
</div>

</body>
</html>
