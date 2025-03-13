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

        <!--  -->





        <table id="mytable" class="display">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Judul</th>
                    <th>Action</th>
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
                        <td>
                            <div style="display: flex; justify-content: left; gap: 10px;">
                                <button style="width: 70px; background-color: green; color: black; border-radius: 5px;"
                                    onclick="showModal('acc', <?= $row->id ?>)">ACC</button>
                                <button style="width: 70px; background-color: yellow; color: black; border-radius: 5px;"
                                    onclick="showModal('tolak', <?= $row->id ?>)">Tolak</button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>

            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div id="confirmationModal" class="modal" style="display: none; ">
        <div class="modal-content">
            <p id="modal-text">Apakah Anda yakin?</p>
            <br>
            <div class="modal-buttons">
                <button style="background-color: green; color: white; width: 70px;" id="confirm-btn">Ya</button>
                <button style="width: 70px; background-color: grey; color: white;" onclick="closeModal()">Batal</button>
            </div>
        </div>
    </div>

    <script>
        function showModal(action, id) {
            let modalText = action === "acc" ?
                `Apakah Anda yakin ingin menyetujui Judul?` :
                `Apakah Anda yakin ingin menolak Judul? `;

            let actionLink = action === "acc" ? `<?php echo base_url('terima/judul/')   ?>${id}` : `<?php echo base_url('tolak/judul/') ?>${id}`;

            document.getElementById("modal-text").innerText = modalText;
            document.getElementById("confirm-btn").setAttribute("onclick", `window.location.href='${actionLink}'`);
            document.getElementById("confirmationModal").style.display = "block";
        }

        function closeModal() {
            document.getElementById("confirmationModal").style.display = "none";
        }
    </script>


    <script>
        $(document).ready(function() {
            $('#mytable').DataTable();
        });
    </script>


</body>

<style>
    .modal {
        display: none;
        position: fixed;
        left: 0;
        top: 0;
        z-index: 1;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background-color: white;
        padding: 20px;
        margin: 15% auto;
        width: 50%;
        border-radius: 5px;
        text-align: center;
    }
</style>

</html>