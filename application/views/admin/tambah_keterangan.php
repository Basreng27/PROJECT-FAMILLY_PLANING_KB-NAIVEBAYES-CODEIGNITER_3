<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah Keterangan</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="pt-4 pb-2">
                        <h5 class="card-title text-center pb-0 fs-4">Tambah Keterangan</h5>
                    </div>
                    <?php if (isset($terdaftar)) { ?>
                        <div class="alert alert-danger"><strong>Keterangan</strong> telah terdaftar, silahkan masukan jenis <strong>Keterangan</strong> baru.</div>
                    <?php } elseif (isset($berhasil)) { ?>
                        <div class="alert alert-success"><strong>Keterangan</strong> telah berhasil didaftarkan.</div>
                    <?php } ?>
                    <form action="<?= base_url() ?>proses_tambah_keterangan" method="POST" class="row g-3 needs-validation" novalidate>
                        <div class="col-12">
                            <label class="form-label">Kode Keterangan</label>
                            <div class="input-group has-validation">
                                <input type="text" name="kode_keterangan" class="form-control" placeholder="Masukan Kode Keterangan" required>
                                <div class="invalid-feedback">Masukan Kode Keterangan Anda.</div>
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Keterangan</label>
                            <div class="input-group has-validation">
                                <input type="text" name="keterangan" class="form-control" placeholder="Masukan Keterangan" required>
                                <div class="invalid-feedback">Masukan Keteragan.</div>
                            </div>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary w-100" type="submit">Tambah</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->