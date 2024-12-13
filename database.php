<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundry Management System</title>
    <link rel="stylesheet" href="styles.css"> <!-- Optional CSS file -->
</head>
<body>
    <header>
        <h1>Laundry Management System</h1>
    </header>

    <nav>
        <ul>
            <li><a href="#addUser ">Add User</a></li>
            <li><a href="#viewUsers">View Users</a></li>
            <li><a href="#addOrder">Add Order</a></li>
            <li><a href="#viewOrders">View Orders</a></li>
        </ul>
    </nav>

    <main>
        <section id="addUser ">
            <h2>Add User</h2>
            <form action="process.php" method="POST">
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="text" name="phone" placeholder="Phone Number" required>
                <button type="submit" name="addUser ">Add User</button>
            </form>
        </section>

        <section id="viewUsers">
            <h2>View Users</h2>
            <div id="userList">
                <!-- User data will be displayed here -->
            </div>
        </section>

        <section id="addOrder">
            <h2>Add Order</h2>
            <form action="process.php" method="POST">
                <input type="text" name="jenis_laundry" placeholder="Laundry Type" required>
                <input type="text" name="massa_barang" placeholder="Weight" required>
                <input type="number" name="jumlah_barang" placeholder="Quantity" required>
                <input type="datetime-local" name="waktu_pengambilan" required>
                <input type="datetime-local" name="waktu_pengantaran" required>
                <input type="text" name="alamat" placeholder="Address" required>
                <textarea name="catatan" placeholder="Notes"></textarea>
                <input type="text" name="garis_lintang" placeholder="Latitude" required>
                <input type="text" name="garis_bujur" placeholder="Longitude" required>
                <input type="number" name="harga_total" placeholder="Total Price" required>
                <select name="status" required>
                    <option value="Pending">Pending</option>
                    <option value="Completed">Completed</option>
                </select>
                <input type="hidden" name="user_id" value="<!-- User ID here -->">
                <button type="submit" name="addOrder">Add Order</button>
            </form>
        </section>

        <section id="viewOrders">
            <h2>View Orders</h2>
            <div id="orderList">
                <!-- Order data will be displayed here -->
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Laundry Management System</p>
    </footer>
</body>
</html>
