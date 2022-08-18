<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit KB</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="pt-4 pb-2">
                        <h5 class="card-title text-center pb-0 fs-4">Edit KB</h5>
                    </div>
                    <?php
                    foreach ($data_kb as $data) { ?>
                        <form action="<?= base_url() ?>proses_edit_kb" method="POST" class="row g-3 needs-validation" novalidate>
                            <div class="col-12">
                                <label class="form-label">Kode KB</label>
                                <div class="input-group has-validation">
                                    <input type="text" name="kode_kb" class="form-control" value="<?= $data->kode_kb ?>" readonly>
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Nama KB</label>
                                <div class="input-group has-validation">
                                    <input type="text" name="nama_kb" class="form-control" value="<?= $data->nama_kb ?>" required>
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Solusi</label>
                                <div class="input-group has-validation">
                                    <input type="text" name="solusi" class="form-control" value="<?= $data->solusi ?>" required>
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