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
</section>
<!-- Utama -->
<section class="section-two">
    <div class="container-box-bx">
        <h1>Add Membership</h1>
        <div class="container-box">
            <form action="" method="post">
                <div class="inputan">
                    <h6>Membership</h6>
                    <label for="">Nama</label>
                    <input type="text" name="text" placeholder="Nama">
                    <label for="">Id Gym</label>
                    <input type="text" name="text" placeholder="Id Gym">
                    <label for="">Email</label>
                    <input type="email" name="text" placeholder="Email">
                    <label for="">Pembayaran</label>
                    <div class="list">
                        <div class="list-check">
                            <h6>Membership</h6>
                            <input type="checkbox" name="pembayaran" value="">
                            <label>Membership 1 Bulan Rp 125.000</label>
                            <input type="checkbox" name="pembayaran" value="">
                            <label>Membership 3 Bulan Rp 375.000</label>
                            <input type="checkbox" name="pembayaran" value="">
                            <label>Membership 6 Bulan Rp 750.000</label>
                            <input type="checkbox" name="pembayaran" value="">
                            <label>Membership 12 Bulan Rp 1.500.000</label>
                        </div>
                        <div class="list-check-bx">
                            <h6>Perpanjangan</h6>
                            <input type="checkbox" name="pembayaran" value="">
                            <label>Membership 1 Bulan Rp 100.000</label>
                            <input type="checkbox" name="pembayaran" value="">
                            <label>Membership 3 Bulan Rp 300.000</label>
                            <input type="checkbox" name="pembayaran" value="">
                            <label>Membership 6 Bulan Rp 600.000</label>
                            <input type="checkbox" name="pembayaran" value="">
                            <label>Membership 12 Bulan Rp 1.200.000</label>
                        </div>
                    </div>
                </div>
                <button type="submit" name="submit">Submit</button>
            </form>
            <form action="" method="post">
                <h6>Membership+Pt</h6>
                <div class="inputan">
                    <label for="">Nama</label>
                    <input type="text" name="text" placeholder="Nama">
                    <label for="">Id Gym</label>
                    <input type="text" name="text" placeholder="Id Gym">
                    <label for="">Email</label>
                    <input type="email" name="text" placeholder="Email">
                    <label for="">Pembayaran</label>
                    <div class="list">
                        <div class="list-check">
                            <h6>Membership</h6>
                            <input type="checkbox" name="pembayaran" value="">
                            <label>1 Bulan + Pt 1 Bulan Rp 875.000</label>
                            <input type="checkbox" name="pembayaran" value="">
                            <label>3 Bulan + Pt 1 Bulan Rp 1.125.000</label>
                            <input type="checkbox" name="pembayaran" value="">
                            <label>6 Bulan + Pt 1 Bulan Rp 1.500.000</label>
                            <input type="checkbox" name="pembayaran" value="">
                            <label>12 Bulan + Pt 1 Bulan Rp 2.250.000</label>
                        </div>
                        <div class="list-check-bx">
                            <h6>Perpanjangan</h6>
                            <input type="checkbox" name="pembayaran" value="">
                            <label>1 Bulan + Pt 1 Bulan Rp 850.000</label>
                            <input type="checkbox" name="pembayaran" value="">
                            <label>3 Bulan + Pt 1 Bulan Rp 1.050.000</label>
                            <input type="checkbox" name="pembayaran" value="">
                            <label>6 Bulan + Pt 1 Bulan Rp 1.350.000</label>
                            <input type="checkbox" name="pembayaran" value="">
                            <label>12 Bulan + Pt 1 Bulan Rp 1.950.000</label>
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