<?php include "../db.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2>Register</h2>
<form method="POST">
    <input type="text" name="username" class="form-control mb-2" placeholder="Username" required>
    <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
    <button class="btn btn-primary" name="register">Register</button>
    <a href="index.php" class="btn btn-link">Login</a>
</form>

<?php
if (isset($_POST['register'])) {
    $user = $_POST['username'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $koneksi->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $user, $pass);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success mt-2'>Berhasil daftar!</div>";
    } else {
        echo "<div class='alert alert-danger mt-2'>Username sudah digunakan.</div>";
    }
}
?>

</body>
</html>
