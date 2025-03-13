<h2>Input Pembagian Pembimbing</h2>
<br>
<hr>
<br>
<div style="background-color: #cce7ec; height: 390px; padding-top: 20px; padding-left: 20px;">
    <form action="<?php echo base_url('update/pembagian') ?>" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">

        <input type="text" value="<?php echo $data->userid ?>" name="userid" id="" hidden>
        <div style="display:flex; justify-content: start; gap: 20px; margin-bottom:20px; align-items: center;">
            <label for="nama">Nama Mahasiswa:</label>
            <input readonly type="text" name="nama" value="<?php echo $data->nama ?>" style="border-radius: 5px; width: 300px; height: 40px;">
        </div>

        <div style="display:flex;  gap: 50px; margin-bottom:20px;">

            <!-- Dropdown Pilih Dosen -->
            <label style="display: flex; align-items: center;" for="dosen">Pilih Dosen 1:</label>
            <select name="dosen" id="dosen" class="form-select" style="border-radius: 5px; width: 300px; height: 40px;">
                <option value="" data-userid1="">-- Pilih Dosen --</option>
                <?php foreach ($dosen->getResult() as $d): ?>
                    <option value="<?= esc($d->nama) ?>" data-userid1="<?= esc($d->userid) ?>"
                        <?= (isset($data->pembimbing_1) && $d->nama == $data->pembimbing_1) ? 'selected' : '' ?>>
                        <?= esc($d->nama) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <!-- Input untuk menampilkan User ID -->
            <label hidden for="userid1">User ID:</label>
            <input hidden type="text" id="userid1" name="u1" class="form-control" style="border-radius: 5px; width: 300px; height: 40px;" readonly>

        </div>

        <div style="display:flex;  gap: 50px; margin-bottom:20px;">

            <!-- Dropdown Pilih Dosen -->
            <label for="dosen2">Pilih Dosen 2:</label>
            <select name="dosen2" id="dosen2" class="form-select" style="border-radius: 5px; width: 300px; height: 40px;">
                <option value="" data-userid2="">-- Pilih Dosen --</option>
                <?php foreach ($dosen->getResult() as $d): ?>
                    <option value="<?= esc($d->nama) ?>" data-userid2="<?= esc($d->userid) ?>"
                        <?= (isset($data->pembimbing_1) && $d->nama == $data->pembimbing_1) ? 'selected' : '' ?>>
                        <?= esc($d->nama) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <!-- Input untuk menampilkan User ID -->
            <label hidden for="userid2">User ID:</label>
            <input hidden name="u2" type="text" id="userid2" class="form-control" style="border-radius: 5px; width: 300px; height: 40px;" readonly>

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


<script>
    document.getElementById('dosen').addEventListener('change', function() {
        // Ambil data-userid dari opsi yang dipilih
        let selectedOption = this.options[this.selectedIndex];
        let userid = selectedOption.getAttribute('data-userid1');

        // Masukkan ke dalam input field
        document.getElementById('userid1').value = userid ? userid : '';
    });

    // Menampilkan userid jika ada nilai default terpilih saat halaman dimuat
    window.addEventListener('DOMContentLoaded', function() {
        let selectedOption = document.getElementById('dosen').options[document.getElementById('dosen').selectedIndex];
        let userid = selectedOption.getAttribute('data-userid1');
        document.getElementById('userid1').value = userid ? userid : '';
    });
</script>

<script>
    document.getElementById('dosen2').addEventListener('change', function() {
        // Ambil data-userid dari opsi yang dipilih
        let selectedOption = this.options[this.selectedIndex];
        let userid2 = selectedOption.getAttribute('data-userid2');

        // Masukkan ke dalam input field
        document.getElementById('userid2').value = userid2 ? userid2 : '';
    });

    // Menampilkan userid jika ada nilai default terpilih saat halaman dimuat
    window.addEventListener('DOMContentLoaded', function() {
        let selectedOption = document.getElementById('dosen2').options[document.getElementById('dosen2').selectedIndex];
        let userid2 = selectedOption.getAttribute('data-userid2');
        document.getElementById('userid2').value = userid2 ? userid2 : '';
    });
</script>