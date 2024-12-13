<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Laundry OnLine</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/login_2.css">
</head>
<body>
    <div class="login-page">
        <div class="form">
            <h1>Login</h1>   
            <br>     
            <form method="POST" action="login.php"> <!-- Ganti 'login.php' dengan nama file PHP Anda -->
                <p>E-Mail :</p>
                <input type="email" name="email" required placeholder="Masukkan e-mail">
                <p>Password :</p>
                <input type="password" id="password" name="password" required placeholder="Masukkan password">
                <input type="checkbox" onclick="myFunction()"> Show Password
                <br><br>
                <p>
                    <button name="submit">Login</button>
                </p>
                <br>
                <p>
                    <a href="signup.php">Belum mendaftar? Daftar Sekarang!</a>
                </p>
                <p>
                    <a href="index.php"><-- Back to Home</a>
                </p>
            </form>
            <!-- Pesan error jika e-mail atau password salah -->
            <div class="box" id="error-message" style="display:none;">
                <div class="square">
                    E-mail atau password salah, silahkan ulangi kembali
                </div>
            </div>
        </div>
    </div>
    <script type="application/javascript">
        // Untuk memunculkan password di form
        function myFunction(){
            var x = document.getElementById("password");
            if (x.type === "password"){
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        // Menampilkan pesan error jika ada
        function showError() {
            document.getElementById('error-message').style.display = 'block';
        }
    </script>
</body>
</html>
