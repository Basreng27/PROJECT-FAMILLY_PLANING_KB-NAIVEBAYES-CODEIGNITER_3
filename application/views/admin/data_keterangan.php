<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Keterangan</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="card mb-3">
                <div class="card-body">
                    <br>
                    <a href="<?= base_url() ?>tambah_keterangan" type="button" class="btn btn-outline-primary">Tambah Keterangan</a>
                    <!-- <h5 class="card-title">Data Kasus</h5> -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode Keterangan</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($data_keterangan as $data) {
                            ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= $data->kode_keterangan ?></td>
                                    <td><?= $data->keterangan ?></td>
                                    <td>
                                        <a href="<?= base_url('edit_keterangan/' . $data->kode_keterangan) ?>" type="button" class="btn btn-outline-info">Edit</a>
                                        ||
                                        <a href="<?= base_url('delete_keterangan/' . $data->kode_keterangan) ?>" type="button" class="btn btn-outline-danger">Delete</a>
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