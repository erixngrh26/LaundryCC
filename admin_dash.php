<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Laundry OnLine</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/dash.css">
    <link rel="stylesheet" href="bootstrap/dataTables.bootstrap4.min.css">
    <script src="js/jquery-3.5.1.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.js"></script>
    <script src="bootstrap/jquery.dataTables.min.js"></script>
    <script src="bootstrap/dataTables.bootstrap4.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
</head>

<body>
    <!-- Navbar -->
    <nav id="navbar-admin" class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="admin_dash.php"><b>Laundry OnLine</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a class="nav-link" href="#beranda">Beranda</a></li>
                <li class="nav-item active"><a class="nav-link" href="#statistik">Statistik</a></li>
                <li class="nav-item active"><a class="nav-link" href="#pesanan">Pesanan</a></li>
                <li class="nav-item active"><a class="nav-link" href="#customers">Profil Customers</a></li>
                <li class="nav-item active"><a class="nav-link" href="logout.php">Logout</a></li>
                <li class="nav-item active"><a class="nav-link" href="author.php">Author</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div data-spy="scroll" data-target="#navbar-admin" data-offset="0">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 id="beranda" class="display-4">Selamat datang, Admin!</h1>
                <p class="lead">Anda berada di ruang admin, cek pesanan dan profil pelanggan disini.</p>
            </div>
        </div>

        <div class="jumbotron jumbotron-fluid bg-white">
            <div class="container">
                <h1 class="tengah" id="statistik">Statistik</h1>
                <p class="tengah">Melihat berapa banyak pesanan dan pelanggan yang terdaftar.</p>
                <div class="row">
                    <div class="col-6"><h3>Pesanan</h3></div>
                    <div class="col-6"><h3>Pelanggan</h3></div>
                </div>
                <div class="row">
                    <div class="col-6"><img src="images/pesanan.png" width="100px"></div>
                    <div class="col-6"><img src="images/users.png" width="100px"></div>
                </div>
                <div class="row">
                    <div class="col-6"><h5>10 pesanan</h5></div>
                    <div class="col-6"><h5>5 pelanggan</h5></div>
                </div>
            </div>
        </div>

        <div class="jumbotron jumbotron-fluid bg-light">
            <div class="container">
                <h1 class="tengah" id="pesanan">Pesanan</h1>
                <p class="tengah">Daftar pesanan dari pelanggan.</p>
                <table id="pagination" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID User</th>
                            <th scope="col">Jenis Laundry</th>
                            <th scope="col">List Satuan</th>
                            <th scope="col">Massa Barang</th>
                            <th scope="col">Jumlah Barang</th>
                            <th scope="col">Harga Total</th>
                            <th scope="col">Status Pemesanan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Dry Cleaning</td>
                            <td>Kg</td>
                            <td>2</td>
                            <td>5</td>
                            <td>100000</td>
                            <td>Tunggu Konfirmasi</td>
                            <td>
                                <form action="admin_dash.php?view=1#pesanan" method="post">
                                    <input type="hidden" name="id" value="1">
                                    <input type="submit" value="View" name="view">
                                </form>
                            </td>
                        </tr>
                        <!-- Additional rows can be added here -->
                    </tbody>
                </table>
                <h4 class="tengah">View Data</h4>
                <ul>
                    <li>ID User : 1</li>
                    <li>Jenis Laundry : Dry Cleaning</li>
                    <li>List Satuan : Kg</li>
                    <li>Massa Barang : 2</li>
                    <li>Jumlah Barang : 5</li>
                    <li>Waktu Pengambilan : 2023-10-01 10:00</li>
                    <li>Waktu Pengantaran : 2023-10-01 12:00</li>
                    <li>Alamat : Jl. Contoh No. 1</li>
                    <li>Catatan : Tidak ada</li>
                    <li>Harga Total : 100000</li>
                    <li>Lokasi :</li>
                    <div id="googleMaps" style="width:50%; height:440px; border:solid black 1px;"></div>
                    <li>Status Pemesanan :</li>
                    <input type="radio" id="tunggu_konfirmasi" name="status" value="Tunggu Konfirmasi" checked>
                    <label for="tunggu_konfirmasi">Tunggu Konfirmasi</label><br>
                    <input type="radio" id="diambil_kurir" name="status" value="Kurir mengambil laundry">
                    <label for="diambil_kurir">Kurir mengambil laundry</label><br>
                    <input type="radio" id="dicuci" name="status" value="Sementara dicuci">
                    <label for="dicuci">Sementara dicuci</label><br>
                    <input type="radio" id="diantar_kurir" name="status" value="Kurir mengantar laundry">
                    <label for="diantar_kurir">Kurir mengantar laundry</label><br>
                    <input type="radio" id="selesai" name="status" value="Selesai">
                    <label for="selesai">Selesai</label>
                </ul>
                <p class="tengah">
                    <input type="submit" name="update_order" value="Update"/>
                    <input type="submit" name="cancel_update" value="Cancel"/>
                </p>
            </div>
        </div>

        <div class="jumbotron jumbotron-fluid bg-white">
            <div class="container">
                <h1 class="tengah" id="customers">Profil Pelanggan</h1>
                <p class="tengah">Daftar pelanggan yang terdaftar.</p>
                <table id="pagination2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID User</th>
                            <th scope="col">Nama</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Nomor Telepon</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>1</th>
                            <th>John Doe</th>
                            <td>john@example.com</td>
                            <td>08123456789</td>
                            <td>
                                <form action="admin_dash.php?edit=1#customers" method="post">
                                    <input type="hidden" name="id" value="1">
                                    <input type="submit" value="Edit" name="edit">
                                </form>
                            </td>
                            <td>
                                <form method="post">
                                    <input type="hidden" name="id" value="1">
                                    <input type="submit" value="Delete" name="delete">
                                </form>
                            </td>
                        </tr>
                        <!-- Additional rows can be added here -->
                    </tbody>
                </table>
                <h4 class="tengah">Edit customer</h4>
                <form method="post">
                    <p class="tengah">Nama : </p>
                    <p class="tengah"><input type="text" class="tengah" name="nama" value="John Doe"></p>
                    <p class="tengah">E-mail : </p>
                    <p class="tengah"><input type="email" class="tengah" name="email" value="john@example.com"></p>
                    <p class="tengah">Password : </p>
                    <p class="tengah"><input type="password" class="tengah" name="password" id="password"></p>
                    <p class="tengah"><input type="checkbox" onclick="myFunction()"> Show Password</p>
                    <p class="tengah">Nomor Telepon : </p>
                    <p class="tengah"><input type="text" class="tengah" name="nomor_telepon" value="08123456789"></p>
                    <p class="tengah"><input type="submit" name="update" value="Update"/>
                    <input type="submit" name="cancel" value="Cancel"/></p>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="page-footer font-small blue">
        <div class="footer-copyright text-center py-3 bg-dark text-white">© 2020 Copyright:
            <a href="https://laundryonlinemks.com/"> Laundry OnLine</a>
        </div>
    </footer>

    <script>
        // Using DataTables library
        $(document).ready(function() {
            $('#pagination').DataTable();
            $('#pagination2').DataTable();
        });

        // Show password function
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        // Initialize Google Maps
        function initMap() {
            var propertiPeta = {
                center: new google.maps.LatLng(-7.250445, 112.768845), // Example coordinates
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var peta = new google.maps.Map(document.getElementById("googleMaps"), propertiPeta);
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(-7.250445, 112.768845), // Example coordinates
                map: peta,
                animation: google.maps.Animation.BOUNCE
            });
        }
        google.maps.event.addDomListener(window, 'load', initMap);
    </script>
</body>

</html>
