<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal</title>

    <!-- DataTables CSS & jQuery -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <style>
        .table-container {
            display: none;
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


        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
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
            border-radius: 10px;
            width: 400px;
            text-align: center;
        }

        .modal input {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .modal button {
            padding: 8px 15px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .modal .close {
            background-color: red;
            color: white;
        }

        .modal .close2 {
            background-color: red;
            color: white;
        }

        .modal .save {
            background-color: green;
            color: white;
        }
    </style>
</head>

<body>

    <!-- Modal -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <h3>Edit Link</h3>
            <br>
            <form id="editForm" action="<?= base_url('update/jadwal') ?>" method="post">
                <input type="hidden" id="edit-id" name="id">
                <label>Batas Bimbingan:</label>
                <input type="date" id="edit-bimbingan" name="batas_bimbingan">

                <label>Batas Pengumpulan Skripsi:</label>
                <input type="date" id="edit-skripsi" name="batas_skripsi">

                <label>Batas Pengumpulan Proposal:</label>
                <input type="date" id="edit-proposal" name="batas_proposal">

                <button type="submit" class="save">Simpan</button>
                <button type="button" class="close" onclick="closeModal()">Batal</button>
            </form>
        </div>
    </div>

    <div id="editModal2" class="modal">
        <div class="modal-content">
            <h3>Edit Jadwal</h3>
            <br>
            <form id="editForm2" action="<?= base_url('update/link') ?>" method="post">
                <input type="hidden" id="edit-id" name="id">
                <label>Instagram:</label>
                <input type="text" id="edit-ig" name="ig">

                <label>Facebook:</label>
                <input type="text" id="edit-fb" name="fb">

                <label>Website:</label>
                <input type="text" id="edit-web" name="web">

                <button type="submit" class="save">Simpan</button>
                <button type="button" class="close2" onclick="closeModal2()">Batal</button>
            </form>
        </div>
    </div>






    <h2> Jadwal</h2>
    <br>
    <hr>
    <br>

    <br>

    <div id="table-mahasiswa-container" class="table-container">

        <br>
        <h3>Jadwal</h3>
        <br>
        <table id="table-mahasiswa" class="display">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Batas Bimbingan</th>
                    <th>Batas Pengumpulan Skripsi</th>
                    <th>Batas Pengumpulan Proposal</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($data2->getResult() as $row): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row->batas_bimbingan ?></td>
                        <td><?= $row->batas_skripsi ?></td>
                        <td><?= $row->batas_proposal ?></td>


                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <div id="table-dosen-container" class="table-container">

        <div style="display: flex; justify-content: left; gap: 20px;">
            <button style="color: antiquewhite; width: 100px; height: 40px; color: black; font-weight: bold; border-radius:5px;" onclick="showTable('mahasiswa')">Jadwal</button>
            <button style="color: antiquewhite; width: 100px; height: 40px; color: black; font-weight: bold; border-radius:5px;" onclick="showTable('dosen')">Link</button>
        </div>
        <br>
        <h3>Link</h3>
        <br>

        <table id="table-dosen" class="display">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Instagram</th>
                    <th>Facebook</th>
                    <th>Website</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($data->getResult() as $row): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row->ig ?></td>
                        <td><?= $row->fb ?></td>
                        <td><?= $row->web ?></td>
                        <td>
                            <button class="edit-btn2"
                                data-id="<?= $row->id ?>"
                                data-ig="<?= $row->ig ?>"
                                data-fb="<?= $row->fb ?>"
                                data-web="<?= $row->web ?>"
                                style="color: black; width: 100px; background-color: yellow;">
                                Edit
                            </button>
                        </td>

                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            // Inisialisasi DataTables (tidak ditampilkan langsung)
            var mahasiswaTable = $('#table-mahasiswa').DataTable();
            var dosenTable = $('#table-dosen').DataTable();

            // Sembunyikan semua tabel kecuali Mahasiswa saat pertama kali load
            $('.table-container').hide();
            $('#table-mahasiswa-container').show();

            // Fungsi untuk menampilkan tabel yang dipilih
            function showTable(type) {
                // Sembunyikan semua tabel
                $('.table-container').hide();

                // Tampilkan tabel yang dipilih
                $('#' + 'table-' + type + '-container').show();
            }

            // Jadikan fungsi global agar bisa dipanggil di onclick button
            window.showTable = showTable;
        });
    </script>

    <script>
        // Menampilkan Modal dengan Data yang Dipilih
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                document.getElementById('edit-id').value = this.dataset.id;
                document.getElementById('edit-bimbingan').value = this.dataset.bimbingan;
                document.getElementById('edit-skripsi').value = this.dataset.skripsi;
                document.getElementById('edit-proposal').value = this.dataset.proposal;

                document.getElementById('editModal').style.display = 'flex';
            });
        });

        // Fungsi Menutup Modal
        function closeModal() {
            document.getElementById('editModal').style.display = 'none';
        }

        // Menutup Modal jika klik di luar kotak modal
        window.onclick = function(event) {
            let modal = document.getElementById('editModal');
            if (event.target === modal) {
                closeModal();
            }
        }
    </script>

    <script>
        // Menampilkan Modal dengan Data yang Dipilih
        document.querySelectorAll('.edit-btn2').forEach(button => {
            button.addEventListener('click', function() {
                document.getElementById('edit-id').value = this.dataset.id;
                document.getElementById('edit-ig').value = this.dataset.ig;
                document.getElementById('edit-fb').value = this.dataset.fb;
                document.getElementById('edit-web').value = this.dataset.web;

                document.getElementById('editModal2').style.display = 'flex';
            });
        });

        // Fungsi Menutup Modal
        function closeModal2() {
            document.getElementById('editModal2').style.display = 'none';
        }

        // Menutup Modal jika klik di luar kotak modal
        window.onclick = function(event) {
            let modal = document.getElementById('editModal2');
            if (event.target === modal) {
                closeModal2();
            }
        }
    </script>






</body>

</html>