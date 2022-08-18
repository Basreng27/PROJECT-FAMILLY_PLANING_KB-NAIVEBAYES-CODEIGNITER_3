<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah KB</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="pt-4 pb-2">
                        <h5 class="card-title text-center pb-0 fs-4">Tambah KB</h5>
                    </div>
                    <?php if (isset($terdaftar)) { ?>
                        <div class="alert alert-danger"><strong>KB</strong> telah terdaftar, silahkan masukan jenis <strong>KB</strong> baru.</div>
                    <?php } elseif (isset($berhasil)) { ?>
                        <div class="alert alert-success"><strong>KB</strong> telah berhasil didaftarkan.</div>
                    <?php } ?>
                    <form action="<?= base_url() ?>proses_tambah_kb" method="POST" class="row g-3 needs-validation" novalidate>
                        <div class="col-12">
                            <label class="form-label">Kode KB</label>
                            <div class="input-group has-validation">
                                <input type="text" name="kode_kb" class="form-control" placeholder="Masukan Kode KB" required>
                                <div class="invalid-feedback">Masukan Kode KB Anda.</div>
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Nama KB</label>
                            <div class="input-group has-validation">
                                <input type="text" name="nama_kb" class="form-control" placeholder="Masukan Nama KB" required>
                                <div class="invalid-feedback">Masukan Nama KB Anda.</div>
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Alasan</label>
                            <div class="input-group has-validation">
                                <input type="text" name="solusi" class="form-control" placeholder="Masukan Solusi" required>
                                <div class="invalid-feedback">Masukan Solusi Anda.</div>
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