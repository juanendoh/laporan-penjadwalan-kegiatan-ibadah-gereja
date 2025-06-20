<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Registrasi Jemaat</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php
    include 'conf/conf.php';

    // Ambil data dari form
    $name           = htmlspecialchars($_POST['name']);
    $username       = htmlspecialchars($_POST['username']);
    $password       = $_POST['password'];
    $alamat         = htmlspecialchars($_POST['alamat']);
    $tanggal_lahir  = $_POST['tanggal_lahir'];

    $role     = 'jemaat'; // Default role jemaat
    $foto     = '';       // Kosongkan dulu path_foto
    $created  = date('Y-m-d H:i:s');
    $updated  = $created;

    // Cek apakah username sudah digunakan
    $cek = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    if (mysqli_num_rows($cek) > 0) {
        echo "
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Username sudah terdaftar!'
        }).then(() => {
            window.history.back();
        });
    </script>";
        exit;
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Simpan ke tabel users
    $query_user = "INSERT INTO users (name, username, password, role, path_foto, created_at, updated_at)
               VALUES ('$name', '$username', '$hashed_password', '$role', '$foto', '$created', '$updated')";
    $simpan_user = mysqli_query($conn, $query_user);

    if ($simpan_user) {
        // Simpan juga ke tabel data_jemaat
        $query_jemaat = "INSERT INTO data_jemaat (nama, alamat, tanggal_lahir, status_keanggotaan, created_at, updated_at)
                     VALUES ('$name', '$alamat', '$tanggal_lahir', 'aktif', '$created', '$updated')";
        $simpan_jemaat = mysqli_query($conn, $query_jemaat);

        echo "
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Akun berhasil dibuat. Silakan login!'
        }).then(() => {
            window.location = './?status=registered';
        });
    </script>";
    } else {
        echo "
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: 'Terjadi kesalahan saat menyimpan data!'
        }).then(() => {
            window.history.back();
        });
    </script>";
    }
    ?>



</body>

</html>