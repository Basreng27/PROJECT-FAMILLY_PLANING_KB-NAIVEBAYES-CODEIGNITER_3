<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Admin</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="card mb-3">
                <div class="card-body">
                    <br>
                    <a href="<?= base_url() ?>tambah_admin" type="button" class="btn btn-outline-primary">Tambah Admin</a>
                    <!-- <h5 class="card-title">Data Kasus</h5> -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Username</th>
                                <th scope="col">Hak</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($akun as $data) {
                            ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= $data->nama ?></td>
                                    <td><?= $data->username ?></td>
                                    <td><?= $data->hak ?></td>
                                    <td>
                                        <a href="<?= base_url('edit_admin/' . $data->username) ?>" type="button" class="btn btn-outline-info">Edit</a>
                                        ||
                                        <a href="<?= base_url('delete_admin/' . $data->username) ?>" type="button" class="btn btn-outline-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->