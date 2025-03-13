<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toggle DataTables</title>

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


        /* Modal Background */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        /* Modal Content */
        .modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            border-radius: 10px;
            width: 50%;
            text-align: center;
        }

        /* Close Button */
        .close {
            color: red;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <img src="https://cliply.co/wp-content/uploads/2021/03/372103860_CHECK_MARK_400px.gif" width="100px" height="100px" alt="">
            <br>
            <p style="font-weight: bold;">Konfirmasi Persetujuan</p>
            <br>
            <center>
                <a id="confirmLink" href="">
                    <button style="background-color: green; color: white; width: 150px; height: 40px; border-radius: 5px;"> Setuju </button>
                </a>
            </center>

        </div>
    </div>

    <!-- Modal -->
    <div id="myModal2" class="modal">
        <div class="modal-content">
            <span class="close2">&times;</span>
            <img src="https://cliply.co/wp-content/uploads/2021/03/372103860_CHECK_MARK_400px.gif" width="100px" height="100px" alt="">
            <br>
            <p style="font-weight: bold;">Konfirmasi Persetujuan</p>
            <br>
            <center>
                <a id="confirmLink2" href="">
                    <button style="background-color: green; color: white; width: 150px; height: 40px; border-radius: 5px;"> Setuju </button>
                </a>
            </center>

        </div>
    </div>



    <h2> Pengajuan Sidang</h2>
    <br>
    <hr>
    <br>

    <br>

    <div id="table-mahasiswa-container" class="table-container">
        <div style="display: flex; justify-content: left; gap: 20px;">
            <button style="color: antiquewhite; width: 100px; height: 40px; color: black; font-weight: bold; border-radius:5px;" onclick="showTable('mahasiswa')">Proposal</button>
            <button style="color: antiquewhite; width: 100px; height: 40px; color: black; font-weight: bold; border-radius:5px;" onclick="showTable('dosen')">Skripsi</button>
        </div>
        <br>
        <h3>Pengajuan Proposal</h3>
        <br>
        <table id="table-mahasiswa" class="display">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Judul</th>
                    <th>File</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($data2->getResult() as $row): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row->userid ?></td>
                        <td><?= $row->nama ?></td>
                        <td><?= $row->judul ?></td>
                        <td><a href="<?= base_url('public/file_proposal/') . $row->file ?>">Download</a></td>
                        <?php if ($row->status == 'menunggu'): ?>
                            <td>
                                <button id="openModal" data-userid="<?= $row->userid ?>" style="border-radius: 5px; width: 100px; background-color: green; color: white;"> Belum Ada Izin</button>
                            </td>
                        <?php else : ?>
                            <td>Disetujui</td>
                        <?php endif ?>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <div id="table-dosen-container" class="table-container">

        <div style="display: flex; justify-content: left; gap: 20px;">
            <button style="color: antiquewhite; width: 100px; height: 40px; color: black; font-weight: bold; border-radius:5px;" onclick="showTable('mahasiswa')">Proposal</button>
            <button style="color: antiquewhite; width: 100px; height: 40px; color: black; font-weight: bold; border-radius:5px;" onclick="showTable('dosen')">Skripsi</button>
        </div>
        <br>
        <h3>Pengajuan Skripsi</h3>
        <br>

        <table id="table-dosen" class="display">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Judul</th>
                    <th>File</th>
                    <th>action</th>
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
                        <td><?= $row->judul ?></td>
                        <td><a href="<?= base_url('public/file_skripsi/') . $row->file ?>">Download</a></td>
                        <?php if ($row->status == 'menunggu'): ?>
                            <td>
                                <button id="openModal2" data-userid2="<?= $row->userid ?>" style="border-radius: 5px; width: 100px; background-color: green; color: white;"> Belum Ada Izin</button>
                            </td>
                        <?php else : ?>
                            <td>Disetujui</td>
                        <?php endif ?>
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
        document.getElementById("openModal").addEventListener("click", function() {
            let userId = this.getAttribute("data-userid");
            document.getElementById("confirmLink").href = "<?php echo base_url('mantap/proposal/') ?>" + userId;
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
        document.getElementById("openModal2").addEventListener("click", function() {
            let userId2 = this.getAttribute("data-userid2");
            document.getElementById("confirmLink2").href = "<?php echo base_url('mantap/skripsi/') ?>" + userId2;
            document.getElementById("myModal2").style.display = "block";
        });

        document.querySelector(".close2").addEventListener("click", function() {
            document.getElementById("myModal2").style.display = "none";
        });

        window.onclick = function(event) {
            if (event.target == document.getElementById("myModal2")) {
                document.getElementById("myModal2").style.display = "none";
            }
        };
    </script>


</body>

</html>