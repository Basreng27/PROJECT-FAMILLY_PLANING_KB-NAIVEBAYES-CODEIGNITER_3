<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard Admin</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-3">
                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Admin </h5>

                        <div class="d-flex align-items-center">
                            <?php $adm = $this->M_admin->get_all_akun()->num_rows(); ?>
                            <h5><?= $adm ?></h5>
                        </div>
                    </div>
                </div><!-- End Customers Card -->
            </div>

            <div class="col-xxl-4 col-xl-3">
                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Jenis KB </h5>

                        <div class="d-flex align-items-center">
                            <?php $jkb = $this->M_admin->get_all_kb()->num_rows(); ?>
                            <h5><?= $jkb ?></h5>
                        </div>
                    </div>
                </div><!-- End Customers Card -->
            </div>

            <div class="col-xxl-4 col-xl-3">
                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Keterangan </h5>

                        <div class="d-flex align-items-center">
                            <?php $k = $this->M_admin->get_all_keterangan()->num_rows(); ?>
                            <h5><?= $k ?></h5>
                        </div>
                    </div>
                </div><!-- End Customers Card -->
            </div>

            <div class="col-xxl-4 col-xl-3">
                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Kasus </h5>

                        <div class="d-flex align-items-center">
                            <?php $ks = $this->M_admin->get_all_kasus()->num_rows(); ?>
                            <h5><?= $ks ?></h5>
                        </div>
                    </div>
                </div><!-- End Customers Card -->
            </div>
        </div>

        <div class="row">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Data Kasus</h5>
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Umur</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Rekomendasi Jenis KB</th>
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
                                    <td><?= $data->umur ?></td>
                                    <td><?= $data->tanggal ?></td>
                                    <td><?= $data->kode_kb ?></td>
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