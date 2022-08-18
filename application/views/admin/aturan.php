<main id="main" class="main">

    <div class="pagetitle">
        <h1>Aturan KB</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="card mb-3">
                <?php foreach ($get_kb as $adat) { ?>
                    <div class="card-body">
                        <br>
                        <h5>
                            <?php
                            echo $adat->nama_kb;
                            $kd_kb = $adat->kode_kb
                            ?>
                        </h5>
                        <!-- <a href="<?= base_url() ?>tambah_kb" type="button" class="btn btn-outline-primary">Tambah KB</a> -->
                        <!-- <h5 class="card-title">Data Kasus</h5> -->
                        <!-- <form action="<?= base_url() ?>simpan_bobot" method="POST" class="row g-3 needs-validation" novalidate> -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode KB</th>
                                    <th scope="col">Kode Keterangan</th>
                                    <th scope="col">Keteragan</th>
                                    <th scope="col">Bobot</th>
                                    <th scope="col">Simpan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $get_keterangan = $this->M_admin->get_keterangan($kd_kb)->result();
                                $no = 1;
                                foreach ($get_keterangan as $data) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data->kode_kb ?></td>
                                        <td><?= $data->kode_keterangan ?></td>
                                        <td><?= $data->keterangan ?></td>
                                        <td>
                                            <select class="form-select">
                                                <?php if ($data->bobot > 0) { ?>
                                                    <option value="<?php $data->bobot ?>">Iya</option>
                                                    <option value="<?php $bobot = 0 ?>">Tidak</option>
                                                <?php } else { ?>
                                                    <option value="<?php $data->bobot ?>">Tidak</option>
                                                    <option value="<?php $bobot = 1 ?>">Iya</option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url('simpan_bobot/' . $data->kode_kb . '/' . $data->kode_keterangan . '/' . $bobot) ?>" class="btn btn-primary">Simpan<sapn class="btn-icon-right"><i class="fa fa-pencil"></i>
                                            </a>
                                        </td>
                                        <!-- <td>
                                                <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                                            </td> -->
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <!-- <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                        </form> -->
                        <!-- <form action="<?= base_url() ?>tot" method="POST" novalidate>
                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                        </form> -->
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>

</main><!-- End #main -->