<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="<?php echo base_url('public/jquery.js') ?>"></script>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('public/logo.png') . '?v=' . time(); ?>" />



    <link rel="stylesheet" href="<?php echo base_url('public/datatable.css') ?>" />
    <script src="<?php echo base_url('public/datatable.js') ?>"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        .icon-circle {
            height: 50px;
            width: 50px;
            padding: 10px;
            /* Memberikan jarak antara ikon dan border */
            border: 2px solid white;
            /* Outline warna putih */
            border-radius: 50%;
            /* Membuat lingkaran */
            background-color: #0d5c52;
            /* Warna latar belakang lingkaran */
            display: flex;
            justify-content: center;
            align-items: center;
        }


        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f8f9fa;
        }

        /* HEADER */
        .header {
            background-color: white;
            border-bottom: solid #ddd;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            width: 100%;
            height: 70px;
        }

        /* GRID CONTAINER */
        .container {
            display: grid;
            grid-template-columns: 250px 1fr;
            /* Box kiri (navigasi) dan konten utama */
            gap: 10px;
            margin-top: 5px;
            /* Memberikan sedikit jarak dengan header */
            flex: 1;
        }

        /* NAVIGASI SEBELAH KIRI */
        .left-box {
            background-color: #0d5c52;
            color: white;
            padding: 15px;
            border-radius: 8px;
            height: 500px;
        }

        /* KONTEN UTAMA */
        .content {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            height: 500px;
            /* Tetapkan tinggi tetap */
            display: flex;
            flex-direction: column;
        }

        /* Card container untuk scroll */
        .card-container {
            flex: 1;
            /* Agar tidak melebihi content */
            overflow-y: auto;
            /* Scroll hanya ada di dalam card-container */
            padding-right: 10px;
            /* Tambahkan padding agar tidak menempel ke scrollbar */
        }


        /* FOOTER */
        .footer {
            background-color: #0d5c52;
            padding: 20px;
            text-align: center;

            margin-top: 10px;
        }

        .logo {
            display: flex;
            align-items: center;
            /* Membuat logo dan teks sejajar secara vertikal */
            gap: 10px;
            /* Memberikan jarak antara logo dan teks */
        }

        .logo img {
            height: 50px;
            width: 50px;
            object-fit: contain;
            /* Memastikan gambar tidak terdistorsi */
        }

        .logo span {
            font-size: 20px;
            font-weight: bold;
            display: flex;
            align-items: center;
            /* Pusatkan teks secara vertikal */
        }

        .social-icons {
            display: flex;
            gap: 15px;
        }

        .social-icons i {
            font-size: 36px;
            color: white;
            /* Warna ikon putih */
            background-color: black;
            /* Warna lingkaran hitam */
            border-radius: 50%;
            /* Membuat ikon berbentuk lingkaran */
            width: 50px;
            /* Lebar lingkaran */
            height: 50px;
            /* Tinggi lingkaran */
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <div class="header">
        <div class="logo">
            <img src="http://localhost/simbisa/public/logo.png" alt="Logo">
            <span>SIMBISA SI</span>
        </div>
        <div class="user-info">
            <button style="background-color: #0d5c52; margin-right: 20px; color: white; width: 70px; height: 25px;">Dosen</button>
            <span><?php echo $dataku->nama ?></span>
        </div>
    </div>


    <!-- Layout Grid -->
    <div class="container">
        <!-- Navigasi Kiri -->
        <div class="left-box">
            <p style="font-size: small;">Dashboard</p>
            <div style="display: flex; justify-content: flex-start; padding-left: 25px; padding-top: 10px; ">
                <img src="https://img.icons8.com/?size=100&id=73&format=png&color=FFFFFF" style="height: 20px; width: 20px; " alt="">
                <a href="<?php echo base_url('dashboard/dosen') ?>" style="text-decoration: none; color: inherit;">
                    <p style="font-size: small; display: flex; align-items: center; padding-left: 10px;">Home</p>
                </a>
            </div>
            <br>

            <p style="font-size: small;">Data Master</p>
            <div style="display: flex; justify-content: flex-start; padding-left: 25px; padding-top: 10px; ">
                <img src="https://img.icons8.com/?size=100&id=38HJBFwphJ3I&format=png&color=FFFFFF" style="height: 20px; width: 20px; " alt="">
                <a href="<?php echo base_url('bimbingan1') ?>" style="text-decoration: none; color: inherit;">
                    <p style="font-size: small; display: flex; align-items: center; padding-left: 10px;">Informasi Bimbingan</p>
                </a>
            </div>
            <div style="display: flex; justify-content: flex-start; padding-left: 25px; padding-top: 10px; ">
                <img src="https://img.icons8.com/?size=100&id=38HJBFwphJ3I&format=png&color=FFFFFF" style="height: 20px; width: 20px; " alt="">
                <a href="<?php echo base_url('bimbingan2') ?>" style="text-decoration: none; color: inherit;">
                    <p style="font-size: small; display: flex; align-items: center; padding-left: 10px;">Informasi Bimbingan II</p>
                </a>
            </div>
            <div style="display: flex; justify-content: flex-start; padding-left: 25px; padding-top: 10px; ">
                <img src="https://img.icons8.com/?size=100&id=38HJBFwphJ3I&format=png&color=FFFFFF" style="height: 20px; width: 20px; " alt="">
                <a href="<?php echo base_url('presensi/list') ?>" style="text-decoration: none; color: inherit;">
                    <p style="font-size: small; display: flex; align-items: center; padding-left: 10px;">Presensi Bimbingan</p>
                </a>
            </div>

            <br>

            <p style="font-size: small;">Data Sub Master</p>
            <div style="display: flex; justify-content: flex-start; padding-left: 25px; padding-top: 10px; ">
                <img src="https://img.icons8.com/?size=100&id=b58dGpxAJV6v&format=png&color=FFFFFF" style="height: 20px; width: 20px; " alt="">
                <a href="<?php echo base_url('proposal/izin') ?>" style="color: inherit; text-decoration: none;">
                    <p style="font-size: small; display: flex; align-items: center; padding-left: 10px;">Izin Sidang Proposal</p>
                </a>
            </div>
            <div style="display: flex; justify-content: flex-start; padding-left: 25px; padding-top: 10px; ">
                <img src="https://img.icons8.com/?size=100&id=b58dGpxAJV6v&format=png&color=FFFFFF" style="height: 20px; width: 20px; " alt="">
                <a href="<?php echo base_url('skripsi/izin') ?>" style="color: inherit; text-decoration: none;">
                    <p style="font-size: small; display: flex; align-items: center; padding-left: 10px;">Izin Sidang Skripsi</p>
                </a>
            </div>

            <br>

            <p style="font-size: small;">Setting</p>
            <div style="display: flex; justify-content: flex-start; padding-left: 25px; padding-top: 10px; ">
                <img src="https://img.icons8.com/?size=100&id=H101gtpJBVoh&format=png&color=FFFFFF" style="height: 20px; width: 20px; " alt="">
                <a href="<?php echo base_url('profil/dosen'); ?>" style="text-decoration: none; color: inherit; ">
                    <p style="font-size: small; display: flex; align-items: center; padding-left: 10px;">Profil</p>
                </a>
            </div>
            <div style="display: flex; justify-content: flex-start; padding-left: 25px; padding-top: 10px; ">
                <img src="https://img.icons8.com/?size=100&id=xWawfbOgfNti&format=png&color=FFFFFF" style="height: 20px; width: 20px; " alt="">
                <a href="<?php echo base_url('logout'); ?>" style="text-decoration: none; color: inherit; ">
                    <p style="font-size: small; display: flex; align-items: center; padding-left: 10px;">Logout</p>
                </a>
            </div>



        </div>

        <!-- Konten Utama -->
        <div class="content">

            <div class="card-container">
                <?php include($body . '.php') ?>

            </div>

        </div>

    </div>

    <!-- Footer -->


    <div style="background-color: #cce7e7; text-align: center; height: 130px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
        <div class="social-icons">
            <a style="text-decoration: none; color: inherit;" href="<?php echo base_url('ig') . '?t=' . time(); ?>">
                <i class="fa fa-instagram"></i>
            </a>
            <a style="text-decoration: none; color: inherit;" href="<?php echo base_url('fb') . '?t=' . time(); ?>">
                <i class="fa fa-facebook-f"></i>
            </a>
            <a style="text-decoration: none; color: inherit;" href="<?php echo base_url('web') . '?t=' . time(); ?>">
                <i class="fa fa-globe"></i>
            </a>
        </div>

        <br>
        <div style="display: flex; align-items: center; gap: 40px;">
            <a href="http://localhost/simbisa/welcome.html" style="text-decoration: none; color: inherit;">
                <p>Home</p>
            </a>
            <a href="<?php echo base_url('jadwalD') ?>" style="text-decoration: none; color: inherit;">
                <p>Jadwal</p>
            </a>
            <a href="http://localhost/simbisa/welcome.html" style="text-decoration: none; color: inherit;">
                <p>About</p>
            </a>
        </div>
    </div>


    <div class="footer">
        <p>© 2024 - 2025 | SIMBISA SI</p>
    </div>

</body>





</html>