<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

                <div class="card info-card customers-card">

                    <div class="card-body">
                        <h5 class="card-title">SPRKB </h5>

                        <div class="d-flex align-items-center">
                            <?php foreach ($hsl as $data) { ?>
                                <div>
                                    <h3>Kesimpulan Rekomendasi</h3>
                                    <br>
                                    <br>
                                    <h4>Biodata Pasien</h4>
                                    <h5>Nama : <?php echo $data->nama; ?></h5>
                                    <h5>Jenis Kelamin : <?php echo $data->jenis_kelamin; ?></h5>
                                    <h5>Usia : <?php echo $data->umur; ?></h5>
                                    <h5>Alamat : <?php echo $data->alamat; ?></h5>
                                    <h5>No Telepon : <?php echo $data->no_telepon; ?></h5>
                                    <br>
                                    <h5>Di Rekomendasikan Menggunakan : <?php echo $data->nama_kb; ?></h5>
                                    <br>
                                    <h5>Solusi :</h5>
                                    <h5><?php echo $data->solusi; ?></h5>
                                    <br>
                                    <br>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <a href="<?php echo base_url('sistem_pakar') ?>" class="btn btn-round btn-secondary">Kembali Input<sapn class="btn-icon-right"><i class="fa fa-pencil"></i>
                    </a>
                </div><!-- End Customers Card -->
            </div>
        </div>
    </section>

</main><!-- End #main -->