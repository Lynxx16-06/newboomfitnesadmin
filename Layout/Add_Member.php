<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Dosis:wght@500;600;700;800&family=Inter:wght@300;400;500;600;700;800;900&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="Style/add_mem.css">
    <title>Add Member</title>
</head>
<header class="top-bar">
    <div class="logo">
        <img src="img/Logo new boom fitnes.png" alt="Logo" style="width: 60px;">
        <h2>New Boom Fitnes</h2>
    </div>
    <div class="content">
        <h2>Social:</h2>
        <div class="social">
            <a href=""><i class='bx bxl-instagram'></i></a>
            <a href=""><i class='bx bxl-facebook-circle'></i></a>
            <a href=""><i class='bx bxl-twitter'></i></a>
            <a href=""><i class='bx bxl-tiktok'></i></a>
        </div>
    </div>
</header>

<nav class="add-bar">
    <div class="content-bar">
        <ul>
            <select name="select" onchange="navigateToPage(this)">
                <option value="" selected disabled>Add</option>
                <option value="Add_Member.php">Member</option>
                <option value="Add_PT.php">PT</option>
            </select>
            <select name="select" onchange="navigateToPage(this)">
                <option value="" selected disabled>Update</option>
                <option value="">Member</option>
                <option value="">PT</option>
            </select>
            <select name="select" onchange="navigateToPage(this)">
                <option value="" selected disabled>Delete</option>
                <option value="">Member</option>
                <option value="">PT</option>
            </select>
            <input type="search" name="search" id="search" placeholder="Search">
            <a href="" class="search"><i class='bx bx-search' style="color: black;"></i></a>
            <div id="result"></div>
            <!-- <?php
            if (isset($_GET['search'])) {
                $search = $_GET['search'];
                $search = mysqli_real_escape_string($conn, $search);

                $sql = "SELECT * FROM payment WHERE nama LIKE '%$search%' OR id_gym LIKE '%$search%'";
                $result = $conn->query($sql);
            }
            ?> -->
        </ul>
    </div>
</nav>
<!-- Sidebar -->
<section class="section-one">
    <h1>New Boom Fitnes</h1>
    <div class="container">
        <ul>
            <a href="Halaman_Member.php"><i class='bx bxs-dashboard' id='icon'></i>Dashbord Member</a>
            <a href="Halaman_PT.php"><i class='bx bxs-dashboard' id='icon'></i>Dashbord PT</a>
        </ul>
    </div>
    <!-- Utama -->
</section>
<!-- Membership -->
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form dengan sanitasi
    $nama = htmlspecialchars(trim($_POST['nama']));
    $id_gym = htmlspecialchars(trim($_POST['id_gym']));
    $email = htmlspecialchars(trim($_POST['email']));
    $pembayaran = isset($_POST['pembayaran']) ? intval($_POST['pembayaran']) : 0;

    // Validasi input
    if (empty($nama) || empty($id_gym) || empty($email) || $pembayaran === 0) {
        echo "<script>alert('Semua field wajib diisi dan pilih salah satu pembayaran!');</script>";
    } else {
        // Koneksi ke database
        $conn = new mysqli('localhost', 'root', '', 'daftar_gym');

        // Periksa koneksi
        if ($conn->connect_error) {
            die("<script>alert('Koneksi gagal: " . $conn->connect_error . "');</script>");
        }

        // Siapkan query dengan prepared statement
        $stmt = $conn->prepare("INSERT INTO payment (nama, email, id_gym, pembayaran) VALUES (?, ?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("sssi", $nama, $email, $id_gym, $pembayaran);

            // Eksekusi query
            if ($stmt->execute()) {
                echo "<script>alert('Data berhasil ditambahkan!');</script>";
            } else {
                echo "<script>alert('Gagal menambahkan data: " . $stmt->error . "');</script>";
            }

            // Tutup statement
            $stmt->close();
        } else {
            echo "<script>alert('Gagal menyiapkan statement: " . $conn->error . "');</script>";
        }

        // Tutup koneksi
        $conn->close();
    }
}
?>
<section class="section-two">
    <div class="container-box-bx">
        <h1>Add Membership</h1>
        <div class="container-box">
            <form action="" method="post">
                <div class="inputan">
                    <h5>Membership</h5>
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" placeholder="Nama" required>

                    <label for="id_gym">Id Gym</label>
                    <input type="text" name="id_gym" placeholder="Id Gym" required>

                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Email" required>

                    <label>Pembayaran</label>
                    <div class="list">
                        <div class="list-check">
                            <h6>Membership</h6>
                            <input type="radio" name="pembayaran" value="125000" id="membership1">
                            <label for="membership1">Membership 1 Bulan Rp 125.000</label>
                            <input type="radio" name="pembayaran" value="375000" id="membership3">
                            <label for="membership3">Membership 3 Bulan Rp 375.000</label>
                            <input type="radio" name="pembayaran" value="750000" id="membership6">
                            <label for="membership6">Membership 6 Bulan Rp 750.000</label>
                            <input type="radio" name="pembayaran" value="1500000" id="membership12">
                            <label for="membership12">Membership 12 Bulan Rp 1.500.000</label>
                        </div>
                        <div class="list-check-bx">
                            <h6>Perpanjangan</h6>
                            <input type="radio" name="pembayaran" value="100000" id="perpanjangan1">
                            <label for="perpanjangan1">Perpanjangan 1 Bulan Rp 100.000</label>
                            <input type="radio" name="pembayaran" value="300000" id="perpanjangan3">
                            <label for="perpanjangan3">Perpanjangan 3 Bulan Rp 300.000</label>
                            <input type="radio" name="pembayaran" value="600000" id="perpanjangan6">
                            <label for="perpanjangan6">Perpanjangan 6 Bulan Rp 600.000</label>
                            <input type="radio" name="pembayaran" value="1200000" id="perpanjangan12">
                            <label for="perpanjangan12">Perpanjangan 12 Bulan Rp 1.200.000</label>
                        </div>
                    </div>
                </div>
                <button type="submit" name="submit">Submit</button>
            </form>
            <!-- Mem+pt -->
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nama = htmlspecialchars(trim($_POST['nama']));
                $id_gym = htmlspecialchars(trim($_POST['id_gym']));
                $email = htmlspecialchars(trim($_POST['email']));
                $pembayaran = isset($_POST['pembayaran']) ? intval($_POST['pembayaran']) : 0;

                $keterangan = '';
                $pembayaranList = [
                    875000 => "1 Bulan + Pt 1 Bulan",
                    1125000 => "3 Bulan + Pt 1 Bulan",
                    1500000 => "6 Bulan + Pt 1 Bulan",
                    2250000 => "12 Bulan + Pt 1 Bulan",
                    850000 => "Perpanjangan: 1 Bulan + Pt 1 Bulan",
                    1050000 => "Perpanjangan: 3 Bulan + Pt 1 Bulan",
                    1350000 => "Perpanjangan: 6 Bulan + Pt 1 Bulan",
                    1950000 => "Perpanjangan: 12 Bulan + Pt 1 Bulan"
                ];
                $keterangan = $pembayaranList[$pembayaran] ?? '';

                // Validasi input
                if (empty($nama) || empty($id_gym) || empty($email) || $pembayaran === 0 || empty($keterangan)) {
                    echo "<script>alert('Semua field wajib diisi dan pilih salah satu pembayaran!');</script>";
                } else {
                    // Koneksi ke database
                    $conn = new mysqli('localhost', 'root', '', 'daftar_gym');

                    // Periksa koneksi
                    if ($conn->connect_error) {
                        die("<script>alert('Koneksi gagal: " . $conn->connect_error . "');</script>");
                    }

                    // Siapkan query dengan prepared statement
                    $stmt = $conn->prepare("INSERT INTO pt_mem (nama, email, id_gym, pembayaran, keterangan) VALUES (?, ?, ?, ?, ?)");
                    if ($stmt) {
                        $stmt->bind_param("sssds", $nama, $email, $id_gym, $pembayaran, $keterangan);

                        // Eksekusi query
                        if ($stmt->execute()) {
                            echo "<script>alert('Data berhasil ditambahkan!');</script>";
                        } else {
                            echo "<script>alert('Gagal menambahkan data: " . $stmt->error . "');</script>";
                        }

                        // Tutup statement
                        $stmt->close();
                    } else {
                        echo "<script>alert('Gagal menyiapkan statement: " . $conn->error . "');</script>";
                    }

                    // Tutup koneksi
                    $conn->close();
                }
            }
            ?>
            <form action="" method="post">
                <div class="inputan">
                    <h5>Membership + PT</h5>
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" placeholder="Nama">
                    <label for="id_gym">ID Gym</label>
                    <input type="text" name="id_gym" placeholder="ID Gym">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Email">
                    <label for="pembayaran">Pembayaran</label>
                    <div class="list">
                        <div class="list-check">
                            <h6>Membership</h6>
                            <input type="radio" name="pembayaran" value="875000" id="mempt1">
                            <label for="mempt1">1 Bulan + Pt 1 Bulan Rp 875.000</label>
                            <input type="radio" name="pembayaran" value="1125000" id="mempt2">
                            <label for="mempt2">3 Bulan + Pt 1 Bulan Rp 1.125.000</label>
                            <input type="radio" name="pembayaran" value="1500000" id="mempt3">
                            <label for="mempt3">6 Bulan + Pt 1 Bulan Rp 1.500.000</label>
                            <input type="radio" name="pembayaran" value="2250000" id="mempt4">
                            <label for="mempt4">12 Bulan + Pt 1 Bulan Rp 2.250.000</label>
                        </div>
                        <div class="list-check-bx">
                            <h6>Perpanjangan</h6>
                            <input type="radio" name="pembayaran" value="850000" id="ext1">
                            <label for="ext1">1 Bulan + Pt 1 Bulan Rp 850.000</label>
                            <input type="radio" name="pembayaran" value="1050000" id="ext2">
                            <label for="ext2">3 Bulan + Pt 1 Bulan Rp 1.050.000</label>
                            <input type="radio" name="pembayaran" value="1350000" id="ext3">
                            <label for="ext3">6 Bulan + Pt 1 Bulan Rp 1.350.000</label>
                            <input type="radio" name="pembayaran" value="1950000" id="ext4">
                            <label for="ext4">12 Bulan + Pt 1 Bulan Rp 1.950.000</label>
                        </div>
                    </div>
                </div>
                <button type="submit" name="submit">Submit</button>
            </form>
        </div>
    </div>
</section>
<script>
    function navigateToPage(select) {
        const selectedValue = select.value;
        console.log("Selected value:", selectedValue);
        if (selectedValue) {
            window.location.href = selectedValue;
        } else {
            console.log('error')
        }
    }
</script>
<script src="Script/scripts.js"></script>

<script>
    function historyback() {
        location.href = "Halaman_Member.php";
    }
</script>
</body>

</html>