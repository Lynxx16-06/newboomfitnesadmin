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
    <link rel="stylesheet" href="Style/style_utama.css">
    <link rel="icon" href="img/Logo new boom fitnes.png">
    <title>Dashbord</title>
</head>

<body>
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
                <?php
                if (isset($_GET['search'])) {
                    $search = $_GET['search'];
                    $search = mysqli_real_escape_string($conn, $search);

                    $sql = "SELECT * FROM payment WHERE nama LIKE '%$search%' OR id_gym LIKE '%$search%'";
                    $result = $conn->query($sql);
                }
                ?>
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
    </section>
    <!-- Utama -->
    <section class="section-two">
        <div class="container-box">
            <h1>Dashbord Member</h1>
            <?php
            $host = "localhost";
            $username = "root";
            $password = "";
            $dbname = "daftar_gym";

            $conn = new mysqli($host, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $limit = 10;
            $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
            $offset = ($page - 1) * $limit;

            $sql = "SELECT id_user, nama, id_gym, email, pembayaran, req_date FROM payment LIMIT $limit OFFSET $offset";
            $result = $conn->query($sql);

            $total_data_query = "SELECT COUNT(*) as total FROM payment";
            $total_data_result = $conn->query($total_data_query);
            $total_data = $total_data_result->fetch_assoc()['total'];
            $total_pages = ceil($total_data / $limit);

            echo "<table>";
            echo "<thead><tr><th>Nama</th><th>ID Gym</th><th>Email</th><th>Pembayaran</th><th>Tanggal Request</th></tr></thead>";
            echo "<tbody>";

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['id_gym']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td>Rp " . number_format($row['pembayaran'], 0, ',', '.') . "</td>";
                    echo "<td>" . htmlspecialchars($row['req_date']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Tidak ada data.</td></tr>";
            }

            echo "</tbody></table>";
            $conn->close();
            ?>
            <!-- Pagination -->
            <div class="pagination">
                <!-- Prev -->
                <?php if ($page > 1): ?>
                    <div class="page-prev">
                        <a href="?page=<?= $page - 1; ?>">Back</a>
                    </div>
                    <div class="next-page">
                        <a href="?page=<?= $page + 1; ?>">Next</a>
                    </div>
                <?php endif; ?>
                <!-- Utama -->
                <?php if ($page < $total_pages): ?>
                    <div class="next-page-one">
                        <a href="?page=<?= $page + 1; ?>">Next</a>
                    </div>
                <?php endif; ?>
                <?php if ($page < $total_pages): ?>
                    <div class="next-page-two">
                        <a href="?page=<?= $page + 1; ?>">2</a>
                    </div>
                <?php endif; ?>
                <?php if ($page < $total_pages): ?>
                    <div class="next-page-three">
                        <a href="?page=<?= $page + 2; ?>">3</a>
                    </div>
                <?php endif; ?>
                <?php if ($page < $total_pages): ?>
                    <div class="next-page-for">
                        <a href="?page=<?= $page + 3; ?>">4</a>
                    </div>
                <?php endif; ?>
            </div>
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
</body>

</html>