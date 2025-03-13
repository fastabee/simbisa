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
        background-color: #ffc107;
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
    <h2> Data Pembagian Pembimbing</h2>
    <br>
    <hr>
    <br>



    <div class="table-container">

        <table id="mytable">
            <thead>

                <tr>
                    <th>No</th>
                    <th>Id User</th>
                    <th>Nama</th>
                    <th>Pembimbing 1</th>
                    <th>Pembimbing 2</th>
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
                        <td><?= $row->pembimbing_1 ?></td>
                        <td><?= $row->pembimbing_2 ?></td>
                        <td>
                            <a href="<?= base_url('edit/pembagian/' . $row->userid) ?>"><button class="btn btn-edit">Edit</button></a>

                        </td>
                    </tr>
                <?php endforeach ?>

            </tbody>
        </table>
    </div>




</body>
<script>
    $(document).ready(function() {
        $('#mytable').DataTable();
    });
</script>

</html>