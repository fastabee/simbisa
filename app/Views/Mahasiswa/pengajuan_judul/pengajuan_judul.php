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

        <?php if ($jumlah < 2 && $jumlah2 == 0): ?>

            <div style="display: flex; justify-content: right;">
                <a href="<?php echo base_url('input/pengdul/mahasiswa'); ?>">
                    <button style="color: white; background-color: green; width: 100px; height: 30px; border-radius: 5px;">
                        Tambah Judul
                    </button>
                </a>
            </div>

        <?php elseif ($jumlah == 2 && $jumlah2 == 0): ?>
            <div style="display: flex; justify-content: right;">
                <button id="openModal" style="color: white; background-color: green; width: 100px; height: 30px; border-radius: 5px; border: none; cursor: pointer;">
                    ?
                </button>
            </div>

        <?php elseif ($jumlah < 2 && $jumlah2 > 0): ?>
            <div style="display: flex; justify-content: right;">
                <button id="openModal2" style=" color: white; background-color: green; width: 100px; height: 30px; border-radius: 5px; border: none; cursor: pointer;">
                    ?
                </button>
            </div>
        <?php endif; ?>

        <!-- Modal -->
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <img src="https://cdn-icons-gif.flaticon.com/6416/6416351.gif" width="100px" height="100px" alt="">
                <p style="font-weight: bold;">Untuk Efisiensi Sistem Anda Hanya Dapat Uploud Maksimal 2 Antrian Judul</p>
            </div>
        </div>


        <div id="myModal2" class="modal">
            <div class="modal-content">
                <span class="close2">&times;</span>
                <img src="https://cdn-icons-gif.flaticon.com/6416/6416351.gif" width="100px" height="100px" alt="">
                <p style="font-weight: bold;">Anda Sudah Memiliki Judul</p>
            </div>
        </div>





        <table id="mytable" class="display">
            <thead>

                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Judul</th>
                    <th>Status</th>

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
                        <td><?= $row->judul ?></td>
                        <td><?= $row->status ?></td>

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
        document.getElementById("openModal2").addEventListener("click", function() {
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

    <script>
        $(document).ready(function() {
            $('#mytable').DataTable();
        });
    </script>


</body>

<style>
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

</html>