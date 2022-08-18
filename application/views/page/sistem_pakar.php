<main id="main" class="main">

    <div class="pagetitle">
        <h1>Sistem Rekomendasi</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="card mb-3">
                <div class="card-body">

                    <div class="pt-4 pb-2">
                        <h5 class="card-title text-center pb-0 fs-4">Rekomendasi</h5>
                    </div>

                    <form onSubmit="return validate()" action="<?= base_url() ?>proses_rekomendasi" method="POST" class="row g-3 needs-validation" novalidate>
                        <div class="col-12">
                            <label class="form-label">Nama</label>
                            <div class="input-group has-validation">
                                <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required>
                                <div class="invalid-feedback">Masukan Nama Anda.</div>
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-12">
                                <select class="form-select" name="jenis_kelamin" aria-label="Default select example">
                                    <option value="Laki Laki">Laki Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Umur</label>
                            <input type="number" name="umur" class="form-control" placeholder="Masukan Umur" required>
                            <div class="invalid-feedback">Masukan Umur Anda!</div>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat" placeholder="Masukan Alamat" required></textarea>
                            <div class="invalid-feedback">Masukan Alamat Anda!</div>
                        </div>

                        <div class="col-12">
                            <label class="form-label">No Telpon</label>
                            <input type="number" name="no_telpon" class="form-control" placeholder="Masukan No Telpon" required>
                            <div class="invalid-feedback">Masukan No Telpon Anda!</div>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Tanggal</label>
                            <input type="text" class="form-control input-rounded" name="tanggal" value="<?php echo date("Y-m-d"); ?>" readonly>
                        </div>

                        <div class="card-body">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Np</th>
                                        <th scope="col">Kode Keterangan</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($get_keterangan as $data) { ?>
                                        <tr>
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $data->kode_keterangan ?></td>
                                            <td><?= $data->keterangan ?></td>
                                            <td>
                                                <input type="checkbox" name="kode_keterangan[]" value="<?php echo $data->kode_keterangan ?>">
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary w-100" type="submit">Proses</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
<script>
    function validate() {
        var chks = document.getElementsByName('kode_keterangan[]');
        var hasChecked = false;
        for (var i = 0; i < chks.length; i++) {
            if (chks[i].checked) {
                hasChecked = true;
                break;
            }
        }

        if (hasChecked == false) {
            alert("Tolong Pilih Keterangan");
            return false;
        } else {}
    }
</script>