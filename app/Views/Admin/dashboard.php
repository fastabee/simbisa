<html>

<body>
    <h2> Dashboard</h2>
    <br>
    <hr>
    <br>
    <div style="display: flex; height: 100px; width: 100%; justify-content: left; background-color:  #cce7e7; gap: 300px; align-items: center; padding-left: 70px; ">
        <div>
            <img src="<?php base_url() ?>public/ds.png" style="width: 80px; height:80px" alt="">
        </div>
        <div>
            <p style="color: white; font-weight:bold; color: black; font-size:30px">Selamat Datang Kembali</p>
        </div>
    </div>

    <div style="display: flex; justify-content: space-between; margin-top: 20px; padding-left: 10%; padding-right: 10%; ">

        <div style="width: 300px; height: 100px; display: flex; flex-direction: column; background-color: #cce7e7; align-items: center; justify-content: center; gap: 5px;">
            <p style="font-weight: bold; margin: 0;">Mahasiswa Terdaftar</p>
            <p style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; border-radius: 50%; background-color: white; border: 2px solid #000; font-weight: bold; margin: 0;"><?php echo $maha ?></p>
        </div>

        <div style="width: 300px; height: 100px; display: flex; flex-direction: column; background-color: #cce7e7; align-items: center; justify-content: center; gap: 5px;">
            <p style="font-weight: bold; margin: 0;">Total Pengumpul Proposal</p>
            <p style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; border-radius: 50%; background-color: white; border: 2px solid #000; font-weight: bold; margin: 0;"><?php echo $topro ?></p>
        </div>

    </div>
    <div style="display: flex; justify-content: space-between; margin-top: 20px; padding-left: 10%; padding-right: 10%; ">

        <div style="width: 300px; height: 100px; display: flex; flex-direction: column; background-color: #cce7e7; align-items: center; justify-content: center; gap: 5px;">
            <p style="font-weight: bold; margin: 0;">Mahasiswa Disetujui Sidang Skripsi</p>
            <p style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; border-radius: 50%; background-color: white; border: 2px solid #000; font-weight: bold; margin: 0;"><?php echo $siprov ?></p>
        </div>
        <div style="width: 300px; height: 100px; display: flex; flex-direction: column; background-color: #cce7e7; align-items: center; justify-content: center; gap: 5px;">
            <p style="font-weight: bold; margin: 0;">Total Pengumpul Skripsi</p>
            <p style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; border-radius: 50%; background-color: white; border: 2px solid #000; font-weight: bold; margin: 0;"><?php echo $tosi ?></p>
        </div>
    </div>
</body>

</html>