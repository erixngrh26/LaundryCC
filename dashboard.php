<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User - Laundry OnLine</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/dash.css">
    <link rel="stylesheet" href="bootstrap/dataTables.bootstrap4.min.css">
    <script src="js/jquery-3.5.1.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.js"></script>
    <script src="bootstrap/jquery.dataTables.min.js"></script>
    <script src="bootstrap/dataTables.bootstrap4.min.js"></script>
</head>
<body>
    <?php
    session_start();
    require_once "database.php";
    $pdo = new database();
    $edit_form = false;

    // Redirect if not logged in
    if (!isset($_SESSION['email'])) {
        header('Location: login.php');
        exit();
    }

    // Redirect admin to dashboard
    if ($_SESSION['email'] == 'admin@laundryonlinemks.com') {
        header('Location: admin_dash.php');
        exit();
    }

    // Fetch orders
    $rows = $pdo->getPesanan($_SESSION['id']);

    // Handle edit request
    if (isset($_GET['edit'])) {
        $data = $pdo->getEditPesanan($_GET['edit']);
        $edit_form = true;
        $name = $data['name'];
        $email = $data['email'];
        $nomor_telepon = $data['nomor_telepon'];
        $id = $data['id'];
    }

    // Handle update request
    if (isset($_POST['update'])) {
        $update = $pdo->updateData($_POST['nama'], $_POST['email'], $_POST['password'], $_POST['nomor_telepon'], $id);
        $_SESSION['name'] = $_POST['nama'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['nomortelepon'] = $_POST['nomor_telepon'];
        header("Location: dashboard.php#profil");
        exit();
    }

    // Handle cancel edit
    if (isset($_POST['cancel'])) {
        header("Location: dashboard.php#profil");
        exit();
    }
    ?>

    <!-- Navbar -->
    <nav id="navbar-user" class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="/admin_dash.php"><b>Laundry OnLine</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a class="nav-link" href="#beranda">Beranda</a></li>
                <li class="nav-item active"><a class="nav-link" href="order.php">Order</a></li>
                <li class="nav-item active"><a class="nav-link" href="#status-order">Status Order</a></li>
                <li class="nav-item active"><a class="nav-link" href="#profil">Profil</a></li>
                <li class="nav-item active"><a class="nav-link" href="logout.php">Logout</a></li>
                <li class="nav-item active"><a class="nav-link" href="author.php">Author</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div data-spy="scroll" data-target="#navbar-user" data-offset="0">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 id="beranda" class="display-4">Selamat datang, <?php echo htmlspecialchars($_SESSION['name']); ?>!</h1>
                <p class="lead">Silahkan order atau cek status laundry anda disini.</p>
                <a class="btn btn-outline-success active" href="order.php"><b>ORDER DISINI</b></a>
            </div>
        </div>

        <div class="jumbotron j umbotron-fluid bg-white">
            <div class="container">
                <h1 class="tengah" id="status-order">Status Order</h1>
                <p class="tengah">Cek status laundry anda disini.</p>
                <table id="pagination" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Jenis Laundry</th>
                            <th scope="col">Massa Barang</th>
                            <th scope="col">Jumlah Barang</th>
                            <th scope="col">Waktu Pengambilan</th>
                            <th scope="col">Waktu Pengantaran</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Catatan</th>
                            <th scope="col">Harga Total</th>
                            <th scope="col">Status Pemesanan</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($rows as $row): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['jenis_laundry']) ?></td>
                            <td><?= htmlspecialchars($row['massa_barang']) ?></td>
                            <td><?= htmlspecialchars($row['jumlah_barang']) ?></td>
                            <td><?= htmlspecialchars($row['waktu_pengambilan']) ?></td>
                            <td><?= htmlspecialchars($row['waktu_pengantaran']) ?></td>
                            <td><?= htmlspecialchars($row['alamat']) ?></td>
                            <td><?= htmlspecialchars($row['catatan']) ?></td>
                            <td><?= htmlspecialchars($row['harga_total']) ?></td>
                            <td><?= htmlspecialchars($row['status_pemesanan']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="jumbotron jumbotron-fluid bg-dark text-light">
            <div class="container">
                <h1 class="tengah" id="profil">Informasi Profil</h1>
                <p class="tengah">Informasi tentang Nama, E-mail, dan Nomor Telepon yang digunakan.</p>
                <ul>
                    <li>Nama: <?= htmlspecialchars($_SESSION['name']) ?></li>
                    <li>E-mail: <?= htmlspecialchars($_SESSION['email']) ?></li>
                    <li>Nomor Telepon: <?= htmlspecialchars($_SESSION['nomortelepon']) ?></li>
                </ul>
                <form action="dashboard.php?edit=<?= $_SESSION['id']; ?>#profil" method="post">
                    <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>">
                    <input type="submit" value="Edit" name="edit">
                </form>

                <?php if ($edit_form): ?>
                    <h4 class="tengah">Edit profil</h4>
                    <form method="post">
                        <p class="tengah">Nama:</p>
                        <p class="tengah"><input type="text" class="tengah" name="nama" value="<?= htmlspecialchars($name); ?>"></p>
                        <p class="tengah">E-mail:</p>
                        <p class="tengah"><input type="email" class="tengah" name="email" value="<?= htmlspecialchars($email); ?>"></p>
                        <p class="tengah">Password:</p>
                        <p class="tengah"><input type="password" class="tengah" name="password" id="password" pattern=".{8,}" required title="Minimum 8 karakter" placeholder="Masukkan password"></p>
                        <p class="tengah"><input type="checkbox" onclick="myFunction()"> Show Password</p>
                        <p class="tengah">Nomor Telepon:</p>
                        <p class="tengah"><input type="text" class="tengah" name="nomor_telepon" value="<?= htmlspecialchars($nomor_telepon); ?>" pattern=".{10,14}" required></p>
                        <p class="tengah">
                            <input type="submit" name="update" value="Update"/>
                            <input type="button" onclick="location.href='dashboard.php#profil';" value="Cancel" />
                        </p>
                    </form>
                <?php endif; ?>
            </div>
        </div>

        <!-- Footer -->
        <footer class="page-footer font-small blue">
            <div class="footer-copyright text-center py-3 bg-dark text-white">© 2020 Copyright:
                <a href="#"> Laundry OnLine</a>
            </div>
        </footer>
    </div>

    <script>
        $(document).ready(function() {
            $('#pagination').DataTable();
        });

        function myFunction() {
            var x = document.getElementById("password ");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>
</html>
