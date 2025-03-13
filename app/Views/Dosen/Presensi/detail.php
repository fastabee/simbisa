<html>

<style>
    .table-container {
        max-width: 100%;
        background: #cce7ec;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    th,
    td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: left;
    }

    th {
        background-color: #007bff;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    .btn {
        padding: 5px 10px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
    }

    .btn-edit {
        background-color: green;
        color: white;
    }

    .btn-delete {
        background-color: #dc3545;
        color: white;
    }

    .btn-tambah {
        background-color: green;
        color: white;
    }

    .btn:hover {
        opacity: 0.8;
    }
</style>

<body>
    <h2>Pengajuan Judul</h2>
    <br>
    <hr>
    <br>

    <br>


    <div class="table-container">

        <?php if (session()->getFlashdata('sukses')): ?>
            <div id="modalberhasil" class="modalberhasil">
                <br><br>
                <div class="modal-content">

                    <h2>Uploud dan Pengiriman Pesan Revisi Berhasil</h2>
                    <button style=" margin-top: 40px; width: 100%; background-color: green; border-radius: 5px; color: white;" id="tutupmodal">Tutup</button>
                </div>
            </div>
        <?php endif; ?>




        <!-- modal -->
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeModal">&times;</span>
                <h2>Form Kehadiran</h2>
                <form action="<?php echo base_url('tambah/presensi') ?>" enctype="multipart/form-data" method="post">
                    <input type="text" placeholder="Nama" value="<?php echo $nama ?>" name="nama" readonly>
                    <input type="text" value="<?php echo $userid ?>" name="userid" id="" readonly>
                    <input type="date" name="tanggal" required>
                    <textarea type="text" name="catatan"></textarea>
                    <button type="submit" class="submit-btn">Simpan</button>
                </form>
            </div>
        </div>




        <div style="display: flex; justify-content: right; padding-right:10px;">
            <button id="openModal" style="color: white; background-color: green; border-radius: 5px; height:30px; width: 150px; ">Tambah Kehadiran</button>
        </div>
        <table id="mytable" class="display">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Tanggal</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;

                foreach ($data->getResult() as $row): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row->userid ?></td>
                        <td><?= $row->nama ?></td>
                        <td><?= $row->tanggal ?></td>
                    </tr>
                <?php endforeach ?>

            </tbody>
        </table>
    </div>

    <script>
        document.getElementById("openModal").addEventListener("click", function() {
            document.getElementById("myModal").style.display = "block";
        });

        document.querySelector(".close").addEventListener("click", function() {
            document.getElementById("myModal").style.display = "none";
        });

        window.onclick = function(event) {
            if (event.target == document.getElementById("myModal")) {
                document.getElementById("myModal").style.display = "none";
            }
        };
    </script>

    <script>
        $(document).ready(function() {
            $('#mytable').DataTable();
        });
    </script>


</body>

<style>
    /* Modal */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        width: 1000px;

        text-align: center;
    }

    .close {
        float: right;
        font-size: 20px;
        cursor: pointer;
    }

    input,
    select {
        width: 100%;
        padding: 8px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    textarea {
        width: 100%;
        padding: 8px;
        height: 200px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
    }


    .submit-btn {
        background-color: blue;
        color: white;
        padding: 8px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
    }
</style>


<script>
    const modal = document.getElementById("myModal");
    const openBtn = document.getElementById("openModal");
    const closeBtn = document.getElementById("closeModal");

    openBtn.onclick = function() {
        modal.style.display = "flex";
    }

    closeBtn.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const modal = document.getElementById("modalberhasil");
        const closeBtn = document.getElementById("tutupmodal");

        // Jika modal ada di halaman (karena Flashdata 'sukses' aktif), tampilkan modal
        if (modal) {
            modal.style.display = "flex";
        }

        // Fungsi untuk menutup modal saat tombol "×" diklik
        closeBtn.onclick = function() {
            modal.style.display = "none";
        };

        // Tutup modal jika klik di luar kontennya
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        };
    });
</script>







</html>