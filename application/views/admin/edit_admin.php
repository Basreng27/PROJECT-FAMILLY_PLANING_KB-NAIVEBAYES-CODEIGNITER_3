<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit Admin</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="pt-4 pb-2">
                        <h5 class="card-title text-center pb-0 fs-4">Edit Admin</h5>
                    </div>
                    <?php
                    foreach ($data_username as $data) {
                    ?>
                        <form action="<?= base_url() ?>proses_edit_admin" method="POST" class="row g-3 needs-validation" novalidate>
                            <div class="col-12">
                                <label class="form-label">Nama</label>
                                <div class="input-group has-validation">
                                    <input type="text" name="nama" class="form-control" value="<?= $data->nama ?>" required>
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Username</label>
                                <div class="input-group has-validation">
                                    <input type="text" name="username" class="form-control" placeholder="Masukan Username" value="<?= $data->username ?>" readonly>
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Password Baru</label>
                                <input type="password" name="new_password" class="form-control" placeholder="Masukan Password Baru" required>
                                <div class="invalid-feedback">Masukan Password Baru Anda!</div>
                            </div>

                            <div class="col-12">
                                <label class="col-sm-2 col-form-label">Hak</label>
                                <div class="col-sm-12">
                                    <select class="form-select" name="hak" aria-label="Default select example">
                                        <option value="<?= $data->hak ?>"><?= $data->hak ?></option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit">Update</button>
                            </div>
                        </form>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->