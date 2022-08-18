<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah Admin</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="pt-4 pb-2">
                        <h5 class="card-title text-center pb-0 fs-4">Tambah Admin</h5>
                    </div>
                    <?php if (isset($terdaftar)) { ?>
                        <div class="alert alert-danger"><strong>Username</strong> telah terdaftar, silahkan cari <strong>Username</strong> baru.</div>
                    <?php } elseif (isset($berhasil)) { ?>
                        <div class="alert alert-success"><strong>Username</strong> telah berhasil didaftarkan.</div>
                    <?php } ?>
                    <form action="<?= base_url() ?>proses_tambah_admin" method="POST" class="row g-3 needs-validation" novalidate>
                        <div class="col-12">
                            <label class="form-label">Nama</label>
                            <div class="input-group has-validation">
                                <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required>
                                <div class="invalid-feedback">Masukan Nama Anda.</div>
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Username</label>
                            <div class="input-group has-validation">
                                <input type="text" name="username" class="form-control" placeholder="Masukan Username" required>
                                <div class="invalid-feedback">Masukan Username Anda.</div>
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukan Password" required>
                            <div class="invalid-feedback">Masukan Password Anda!</div>
                        </div>

                        <div class="col-12">
                            <label class="col-sm-2 col-form-label">Hak</label>
                            <div class="col-sm-12">
                                <select class="form-select" name="hak" aria-label="Default select example">
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
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