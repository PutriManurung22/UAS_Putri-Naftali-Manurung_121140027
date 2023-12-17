<!-- File ini berfungsi sebagai akses awal dari website -->
<?php
include 'dbconn.php';
if (isset($_SESSION['admin'])) {
  header('location:admin.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<h1>Website Daftar Mahasiswa</h1>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Web
        <?php 
        if (!isset($_GET['page']))
        {
            echo "Beranda";
        }elseif($_GET['page'] == 'formulir')
        {
            echo "Formulir";
        }elseif($_GET['page'] == 'tabel')
        {
            echo "Tabel";
        }
        ?>
    </title>
    <style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body styles */
body {
    font-family: 'Arial', sans-serif;
    line-height: 1.6;
    background-color: #f8f8f8;
    color: #333;
    margin: 0;
    display: flex;
    flex-direction: column;
    min-height: 100vh; /* Membuat tinggi minimum body setara dengan tinggi viewport */
}

.container {
    width: 80%;
    margin: auto;
    flex: 1; /* Memanjangkan konten untuk mengisi ruang kosong */
}

/* Header styles */
header {
    background: #333;
    color: #fff;
    padding: 20px 0;
    text-align: center;
    border-bottom-left-radius: 10px; /* Menambahkan border radius pada sudut kiri bawah header */
    border-bottom-right-radius: 10px; /* Menambahkan border radius pada sudut kanan bawah header */
}
h1{
    text-align: center;
}

/* Navigation styles */
nav ul {
    list-style: none;
    text-align: center;
    margin-top: 20px;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
    padding: 8px 12px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

nav ul li a:hover {
    background-color: #555;
}

nav ul li a.active {
    font-weight: bold;
    background-color: #fff;
    color: #333;
}


        </style>

</head>
<body>
    <header>
        <div class="container header">
            <div class="logo">
                <img src="logo.png" alt="logo">
            </div>
            <nav>
                <ul>
                    <?php
                    if(isset($_SESSION['admin'])){
                    ?>
                    <li>
                    <a 
                    href="?page=formulir"
                    class="
                    <?php
                    if(isset($_GET['page'])){
                        if ($_GET['page'] == 'formulir')
                        { 
                            echo "active";
                        } 
                    }
                    ?>
                    "
                    >
                    Formulir
                    </a>
                    <hr
                    class="nav 
                    <?php 
                    if(isset($_GET['page'])){
                        if($_GET['page'] == 'formulir')
                        {
                            echo "nav_active";
                        }
                    }
                    ?>"
                    id="form"
                    >
                </li>
                <li>
                    <a
                    href="?page=tabel"
                    <?php 
                    if(isset($_GET['page'])){
                        if ($_GET['page'] == 'tabel') 
                        {
                            echo "class='active'";
                        }
                    }
                    ?>
                    >
                    Tabel
                    </a>
                    <hr
                    class="nav 
                    <?php 
                    if(isset($_GET['page'])){
                        if($_GET['page'] == 'tabel')
                        {
                            echo "nav_active";
                        }
                    }
                    ?>"
                    id="table"
                    >
                    </li>
                    <?php
                    }
                    
                    if (isset($_SESSION['admin'])) {
                    ?>
                    <li>
                        <a
                        href="logout.php"
                        >
                        Logout
                        </a>
                        <hr
                        class="nav"
                        id="login"
                        >
                    </li>
                    <?php
                    }else{
                    ?>
                    <li>
                        <a
                        href="login.php"
                        >
                        Login
                        </a>
                        <hr
                        class="nav"
                        id="login"
                        >
                    </li>
                    <?php
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </header>

    <script src="script/script.js"></script>
</body>
</html>