<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data KB</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="card mb-3">
                <div class="card-body">
                    <br>
                    <a href="<?= base_url() ?>tambah_kb" type="button" class="btn btn-outline-primary">Tambah KB</a>
                    <!-- <h5 class="card-title">Data Kasus</h5> -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode KB</th>
                                <th scope="col">Nama KB</th>
                                <th scope="col">Bobot</th>
                                <th scope="col">Alasan</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($data_kb as $data) {
                            ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= $data->kode_kb ?></td>
                                    <td><?= $data->nama_kb ?></td>
                                    <?php $kd_v = $this->M_admin->get_kd_kb($data->kode_kb)->num_rows(); ?>
                                    <td><?php echo $kd_v ?></td>
                                    <td><?= $data->solusi ?></td>
                                    <td>
                                        <a href="<?= base_url('edit_kb/' . $data->kode_kb) ?>" type="button" class="btn btn-outline-info">Edit</a>
                                        ||
                                        <a href="<?= base_url('delete_kb/' . $data->kode_kb) ?>" type="button" class="btn btn-outline-danger">Delete</a>
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