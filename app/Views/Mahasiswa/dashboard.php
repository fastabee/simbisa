<html>

<body>
    <h2> Dashboard</h2>
    <br>
    <hr>
    <br>
    <div style="display: flex; height: 100px; width: 100%; justify-content: left; background-color:  #cce7e7; gap: 300px; align-items: center; padding-left: 70px; ">
        <div>
            <img src="<?php echo base_url() ?>public/ds.png" style="width: 80px; height:80px" alt="">
        </div>
        <div>
            <p style="color: white; font-weight:bold; color: black; font-size:30px">Selamat Datang Kembali</p>
        </div>
    </div>
    <br>

    <div style="display: flex; height: 100px; width: 100%; justify-content: left; background-color:  #cce7e7; gap: 300px; align-items: center; padding-left: 70px; ">
        <?php if ($dataku->judul_skripsi == ''): ?>
            <p style="color: white; font-weight:bold; color: black; font-size:20px; font-style: italic;"> Judul Skripsi Anda : ( Anda Belum Memiliki Judul )</p>
        <?php else: ?>
            <p style="color: white; font-weight:bold; color: black; font-size:30px; font-style: italic;">Judul Skripsi Anda : ( <?php echo $dataku->judul_skripsi ?> )</p>
        <?php endif ?>
    </div>

    <div style="display: flex; justify-content: space-between; margin-top: 20px; padding-left: 10%; padding-right: 10%; ">

        <div style="width: 300px; height: 100px; display: flex; flex-direction: column; background-color: #cce7e7; align-items: center; justify-content: center; gap: 5px;">
            <p style="font-weight: bold; margin: 0;">Batas Pengumpulan Skripsi</p>
            <p style="width: 200px; height: 50px; display: flex; align-items: center; justify-content: center; border-radius: 50%; background-color: white; border: 2px solid #000; font-weight: bold; margin: 0;"><?php echo $jadwal->batas_skripsi ?></p>
        </div>

        <div style="width: 300px; height: 100px; display: flex; flex-direction: column; background-color: #cce7e7; align-items: center; justify-content: center; gap: 5px;">
            <p style="font-weight: bold; margin: 0;">Batas Pengumpulan Proposal</p>
            <p style="width: 200px; height: 50px; display: flex; align-items: center; justify-content: center; border-radius: 50%; background-color: white; border: 2px solid #000; font-weight: bold; margin: 0;"><?php echo $jadwal->batas_proposal ?></p>
        </div>

    </div>

    <div style="display: flex; justify-content: space-between; margin-top: 20px; padding-left: 10%; padding-right: 10%; ">

        <div style="width: 300px; height: 100px; display: flex; flex-direction: column; background-color: #cce7e7; align-items: center; justify-content: center; gap: 5px;">
            <p style="font-weight: bold; margin: 0;">Batas Tanggal Bimbingan</p>
            <p style="width: 200px; height: 50px; display: flex; align-items: center; justify-content: center; border-radius: 50%; background-color: white; border: 2px solid #000; font-weight: bold; margin: 0;"><?php echo $jadwal->batas_bimbingan ?></p>
        </div>

        <div style="width: 300px; height: 100px; display: flex; flex-direction: column; background-color: #cce7e7; align-items: center; justify-content: center; gap: 5px;">
            <p style="font-weight: bold; margin: 0;">Total Bimbingan</p>
            <p style="width: 200px; height: 50px; display: flex; align-items: center; justify-content: center; border-radius: 50%; background-color: white; border: 2px solid #000; font-weight: bold; margin: 0;"><?php echo $presensi ?></p>
        </div>

    </div>

</body>

</html>