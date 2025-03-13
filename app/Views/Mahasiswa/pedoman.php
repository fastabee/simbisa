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
    <h2> Data Buku Pedoman</h2>
    <br>
    <hr>
    <br>

    <br>

    <div class="table-container">

        <table id="mytable" class="display">
            <thead>

                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>File Buku</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;

                foreach ($data->getResult() as $row): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row->nama ?></td>
                        <td>
                            <a style="text-decoration: none; color: inherit;" href="<?= base_url('public/file_pedoman/' . $row->filenya) ?>" download="<?= base_url('public/file_pedoman/') . $row->filenya ?>">
                                <?= $row->filenya ?>
                            </a>
                        </td>
                        <td>
                            <a href="<?= base_url('public/file_pedoman/' . $row->filenya) ?>" download="<?= base_url('public/file_pedoman/') . $row->filenya ?>" style="text-decoration: none; color: inherit;"><button class="btn btn-edit">Download</button></a>

                        </td>
                    </tr>
                <?php endforeach ?>

            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#mytable').DataTable();
        });
    </script>


</body>

</html>