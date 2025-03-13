<h2>Input Buku Pedoman</h2>
<br>
<hr>
<br>
<div style="background-color: #cce7ec; height: 450px; padding-top: 20px; padding-left: 20px;">
    <form action="<?php echo base_url('update/dosen/' . $data->userid) ?>" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        <div style="display:flex; justify-content: start; gap: 60px; margin-bottom:20px; align-items: center;">
            <label for="nama">User Id:</label>
            <input type="text" name="userid" disabled value="<?php echo $data->userid ?>" style="border-radius: 5px; width: 300px; height: 40px;">
        </div>

        <div style="display:flex; justify-content: start; gap: 20px; margin-bottom:20px; align-items: center;">
            <label for="nama">Nama Dosen:</label>
            <input type="text" name="nama" value="<?php echo $data2->nama ?>" style=" border-radius: 5px; width: 300px; height: 40px;">
        </div>

        <div style="display:flex; justify-content: start; gap: 20px; margin-bottom:20px; align-items: center;">
            <label for="nama">Email Dosen:</label>
            <input type="text" name="email" value="<?php echo $data2->email ?>" style=" border-radius: 5px; width: 300px; height: 40px;">
        </div>

        <div style="display:flex; justify-content: start; gap: 64px; margin-bottom:20px; align-items: center;">
            <label for="nama">alamat:</label>
            <input type="text" name="alamat" value="<?php echo $data2->alamat ?>" style=" border-radius: 5px; width: 300px; height: 40px;">
        </div>

        <div style="display:flex; justify-content: start; gap: 10px; margin-bottom:20px; align-items: center;">
            <label for="gender">Jenis Kelamin:</label>
            <select id="gender" name="gender" style="border-radius: 5px; width: 300px; height: 40px;">
                <option value="Laki-Laki" <?php echo ($data2->jenis_kelamin == 'Laki-Laki') ? 'selected' : ''; ?>>Laki-Laki</option>
                <option value="Perempuan" <?php echo ($data2->jenis_kelamin == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
            </select>
        </div>

        <div style="display:flex; justify-content: start; gap: 40px; margin-bottom:20px; align-items: center;">
            <label for="nama">Password:</label>
            <input type="text" name="password" value="<?php echo $data->password ?>" style=" border-radius: 5px; width: 300px; height: 40px;">
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