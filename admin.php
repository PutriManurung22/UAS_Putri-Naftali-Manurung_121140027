<!-- Berfungsi sebagai koneksi file admin dengan index -->
<?php
include 'dbconn.php';
if (!isset($_SESSION['admin'])) {
  header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="logo.png" type="image/png">
    <title>
        UAS
        <?php 
        if (!isset($_GET['page']))
        {
            echo "Dashboard";
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
    /* style.css */

/* Reset CSS */
* {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            background-color: #f8f8f8;
            color: #333;
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .container {
            width: 80%;
            margin: auto;
        }

        /* Header styles */
        header {
            background: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        /* Logo styles */
        .logo img {
            width: 100px;
            height: auto;
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

        /* Section styles */
        .container section {
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        footer {
            background: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            width: 100%;
            box-shadow: 0px -3px 10px rgba(0, 0, 0, 0.1);
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            position: fixed; /* Membuat posisi footer tetap */
            bottom: 0; /* Menempatkan footer di bagian bawah */
            left: 50%; /* Menempatkan footer di tengah */
            transform: translateX(-50%); /* Menggeser footer ke kiri sebesar setengah lebar footer */
        }

        /* Copy Right */
        .copy_right {
            padding: 10px 0;
        }

        footer:hover {
            background-color: #555;
            transition: background-color 0.3s ease;
        }

/* Footer responsive styles */
@media (max-width: 768px) {
    footer {
        padding: 10px 0; /* Mengurangi tinggi padding untuk ukuran layar kecil */
    }
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
    <section class="container">
        
        <?php
          $page = @$_GET['page'];
          if (file_exists($page.'.php')) {
            include $page.'.php';
          }
          ?>
    </section>
    <footer class="container">
            <div class="copy_right">
            <p>&copy; Putri Naftali Manurung </p>
            </div>
    </footer>
    <script src="script/script.js"></script>
</body>
</html>