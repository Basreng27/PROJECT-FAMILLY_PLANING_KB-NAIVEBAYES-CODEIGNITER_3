<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Kasus</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="card mb-3">
                <div class="card-body">
                    <br>
                    <!-- <a href="<?= base_url() ?>tambah_kb" type="button" class="btn btn-outline-primary">Tambah KB</a> -->
                    <!-- <h5 class="card-title">Data Kasus</h5> -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Rekomendasi KB
                                    (Kode KB)
                                </th>
                                <th scope="col">Umur</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">No Telpon</th>
                                <th scope="col">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($data_kasus as $data) {
                            ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= $data->nama ?></td>
                                    <td><?= $data->jenis_kelamin ?></td>
                                    <td><?= $data->kode_kb ?></td>
                                    <td><?= $data->umur ?></td>
                                    <td><?= $data->alamat ?></td>
                                    <td><?= $data->no_telepon ?></td>
                                    <td><?= $data->tanggal ?></td>
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