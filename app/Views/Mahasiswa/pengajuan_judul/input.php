<h2>Input Judul</h2>
<br>
<hr>
<br>
<div style="background-color: #cce7ec; height: 390px; padding-top: 20px; padding-left: 20px;">

    <br>
    <form action="<?php echo base_url('ajukan/judul') ?>" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">

        <div style="display:flex; justify-content: start; gap: 75px; margin-bottom:20px; align-items: center;">
            <label for="nama">NIM:</label>
            <input type="text" readonly value="<?php echo $data->userid ?>" name="userid" style="border-radius: 5px; width: 300px; height: 40px;">
        </div>

        <div style="display:flex; justify-content: start; gap: 64px; margin-bottom:20px; align-items: center;">
            <label for="nama">Nama:</label>
            <input type="text" value="<?php echo $data->nama ?>" readonly name="nama" style="border-radius: 5px; width: 300px; height: 40px;">
        </div>

        <div style="display:flex; justify-content: start; gap:52px; margin-bottom:20px; align-items: center;">
            <label for="nama">Tanggal:</label>
            <input type="date" name="tanggal" style="border-radius: 5px; width: 300px; height: 40px;" required>
        </div>

        <div style="display:flex; justify-content: start; gap: 70px; margin-bottom:20px; align-items: center;">
            <label for="nama">Judul:</label>
            <input type="text" name="judul" style="border-radius: 5px; width: 300px; height: 40px;" required>
        </div>







        <div style="margin-top: 20px; display: flex; align-items: center; justify-content: center;">
            <button style="color: white; background-color: green; height: 30px; width:100px; border-radius: 5px;" type="submit">Simpan</button>
        </div>
    </form>
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

<script>
    function previewFile(input) {
        var file = input.files[0];
        var fileText = document.getElementById("fileText");
        var pdfIcon = document.getElementById("pdfIcon");

        if (file && file.type === "application/pdf") {
            fileText.style.display = "none"; // Sembunyikan teks "Pilih PDF"
            pdfIcon.style.display = "block"; // Tampilkan ikon PDF
        } else {
            fileText.style.display = "block";
            pdfIcon.style.display = "none";
            input.value = ""; // Reset input jika bukan PDF
            alert("Harap unggah file dalam format PDF.");
        }
    }
</script>