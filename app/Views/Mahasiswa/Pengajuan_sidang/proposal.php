<html>

<style>
    .table-container {
        max-width: 100%;
        background: #cce7ec;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
</style>

<body>
    <h2>Pengajuan Judul</h2>
    <br>
    <hr>
    <br>

    <br>


    <div class="table-container">

        <?php if ($mahasiswa->i1 == '' && $proposal == null): ?>
            <center>
                <img src="https://cdn.pixabay.com/animation/2023/06/13/15/12/15-12-30-710_512.gif" width="270px" height="270px" alt="">
                <h3 style="padding-top: 40px;">Anda Dapat Melakukan Pengajuan Setelah Mendapatkan Izin Dosen Pembimbing</h3>
            </center>
        <?php elseif ($mahasiswa->i1 != '' && $proposal == null): ?>
            <form action="<?php echo base_url('tambah/ajuproposal') ?>" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                <div style="display: flex; justify-content: start; margin-bottom: 20px; align-items: center; gap: 40px;">
                    <div style="display:flex; justify-content: start; gap: 33px; margin-bottom:20px; align-items: center;">
                        <label for="nama">NIM :</label>
                        <input type="text" readonly value="<?php echo $mahasiswa->userid ?>" name="userid" style="border-radius: 5px; width: 300px; height: 40px;">
                    </div>
                    <div style="display:flex; justify-content: start; gap: 20px; margin-bottom:20px; align-items: center;">
                        <label for="nama">Nama :</label>
                        <input type="text" readonly value="<?php echo $mahasiswa->nama ?>" name="nama" style="border-radius: 5px; width: 300px; height: 40px;">
                    </div>

                </div>

                <div style="display: flex; justify-content: start;  align-items: center; gap: 40px;">
                    <div style="display:flex; justify-content: start; gap: 25px; margin-bottom:20px; align-items: center;">
                        <label for="nama">Judul :</label>
                        <input type="text" readonly value="<?php echo $mahasiswa->judul_skripsi ?>" name="judul" style="border-radius: 5px; width: 300px; height: 40px;">
                    </div>

                    <div style="display:flex; justify-content: start; gap: 12px; margin-bottom:20px; align-items: center;">
                        <label for="nama">Abstrak :</label>
                        <textarea type="text" name="ringkasan" style="border-radius: 5px; width: 500px; height: 200px;"></textarea>
                    </div>
                </div>



                <div style="display:flex; justify-content: start; gap: 20px; align-items: center;">
                    <label for="file_pdf" style="align-items: center;"> File Proposal:</label>
                    <label class="file-picker">

                        <input value="" type="file" name="file" accept="application/pdf" onchange="previewFile(this)">
                        <img id="pdfIcon" src="https://logowik.com/content/uploads/images/adobe-pdf3324.jpg" style="width: 200px; height: 200px;" alt="PDF Icon">
                        <span id="fileText">Pilih PDF</span>
                    </label>
                </div>

                <div style="margin-top: 20px; display: flex; align-items: center; justify-content: center;">
                    <button style="color: white; background-color: green; height: 30px; width:100px; border-radius: 5px;" type="submit">Simpan</button>
                </div>
            </form>
        <?php elseif ($mahasiswa->i1 != '' && $proposal != null): ?>
            <center>
                <h2>Anda Sudah Mengajukan Sidang Proposal</h2>
            </center>
            <br><br>
            <div style="display: flex; justify-content: start; margin-bottom: 20px; align-items: center; gap: 40px;">
                <div style="display:flex; justify-content: start; gap: 33px; margin-bottom:20px; align-items: center;">
                    <label for="nama">NIM :</label>
                    <input type="text" readonly value="<?php echo $mahasiswa->userid ?>" name="userid" style="border-radius: 5px; width: 300px; height: 40px;">
                </div>
                <div style="display:flex; justify-content: start; gap: 20px; margin-bottom:20px; align-items: center;">
                    <label for="nama">Nama :</label>
                    <input type="text" readonly value="<?php echo $mahasiswa->nama ?>" name="nama" style="border-radius: 5px; width: 300px; height: 40px;">
                </div>

            </div>

            <div style="display: flex; justify-content: start;  align-items: center; gap: 40px;">
                <div style="display:flex; justify-content: start; gap: 25px; margin-bottom:20px; align-items: center;">
                    <label for="nama">Judul :</label>
                    <input type="text" readonly value="<?php echo $mahasiswa->judul_skripsi ?>" name="judul" style="border-radius: 5px; width: 300px; height: 40px;">
                </div>

                <div style="display:flex; justify-content: start; gap: 12px; margin-bottom:20px; align-items: center;">
                    <label for="nama">Abstrak :</label>
                    <textarea type="text" name="ringkasan" style="border-radius: 5px; width: 500px; height: 200px;"><?php echo $proposal->ringkasan ?></textarea>
                </div>
            </div>



            <div style="display:flex; justify-content: start; gap: 20px; align-items: center;">


                <p>File Proposal:</p>
                <a href="<?php echo base_url('public/file_proposal/') . $proposal->file ?>">
                    <img src="https://logowik.com/content/uploads/images/adobe-pdf3324.jpg" style="width: 200px; height: 200px;" alt="PDF Icon">
                </a>

            </div>
            <br><br>
            <div style="margin-top: 20px; display: flex; align-items: center; justify-content: center;">
                <button style="color: white; background-color: green; height: 30px; width:100px; border-radius: 5px;"><?php echo $proposal->status ?></button>
            </div>


        <?php endif ?>


    </div>



    <style>
        .file-picker {
            position: relative;
            width: 200px;
            height: 200px;
            border: 2px dashed #ccc;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: white;
            cursor: pointer;
            overflow: hidden;
            flex-direction: column;
            text-align: center;
        }

        .file-picker input {
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .file-picker img {
            width: 50px;
            height: auto;
            display: none;
            /* Sembunyikan ikon awalnya */
        }

        .file-picker #fileText {
            font-size: 16px;
            color: #888;
        }

        .file-picker:hover {
            border-color: #007bff;
            background-color: #f0f8ff;
        }
    </style>


</body>



</html>