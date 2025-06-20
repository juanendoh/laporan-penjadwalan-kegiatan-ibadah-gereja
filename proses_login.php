<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Login</title>
    <link rel="icon" type="image/x-icon" href="assets/favjuan.png" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    session_start();
    include 'conf/conf.php';

    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];

    // Ambil data user + status jemaat (jika role jemaat)
    $query = mysqli_query($conn, "SELECT u.*, dj.status_keanggotaan 
        FROM users u 
        LEFT JOIN data_jemaat dj ON dj.nama = u.name AND u.role = 'jemaat'
        WHERE u.username = '$username'
        LIMIT 1");

    $user = mysqli_fetch_assoc($query);

    if ($user && password_verify($password, $user['password'])) {
        // Cek jika role jemaat dan statusnya nonaktif
        if ($user['role'] === 'jemaat' && $user['status_keanggotaan'] !== 'aktif') {
            echo "
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Akun Nonaktif',
                    text: 'Keanggotaan Anda sedang nonaktif. Hubungi admin.'
                }).then(() => {
                    window.location.href = './';
                });
            </script>";
            exit;
        }

        // Set session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['path_foto'] = $user['path_foto'];

        // Redirect sesuai role
        $redirect = 'index';
        if ($user['role'] === 'pengurus') {
            $redirect = 'p/';
        } elseif ($user['role'] === 'jemaat') {
            $redirect = 'j/';
        } elseif ($user['role'] !== 'admin') {
            echo "
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Role tidak dikenali!',
                    text: 'Hubungi administrator sistem.'
                }).then(() => {
                    window.location.href = './';
                });
            </script>";
            exit;
        }

        echo "
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil Login',
                text: 'Selamat datang, $username!'
            }).then(() => {
                window.location.href = '$redirect';
            });
        </script>";
    } else {
        echo "
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Login Gagal',
                text: 'Username atau password salah!'
            }).then(() => {
                window.location.href = './';
            });
        </script>";
    }
    ?>
</body>

</html>