<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-5">
                <h3>Halaman <?= $getSAWData['saw_subtitle_kriteria']; ?></h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= BASEURL; ?>/saw_dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $getSAWData['saw_subtitle_kriteria']; ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="page-content">
    <section class="section">
        <div class="row" id="table-striped">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <small class="mb-0"><?php SAW_Alert::SAW_flash(); ?></small>
                            <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#tambahKriteria">
                                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah <?= $getSAWData['saw_subtitle_kriteria']; ?>
                            </button>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Aksi</th>
                                    <th>Kategori Kriteria</th>
                                    <th>Nama Kriteria</th>
                                    <th>Kode Kriteria</th>
                                    <th>Nilai Kriteria</th>
                                    <th>Bobot Kriteria</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $No = 1; ?>
                                <?php foreach ($getSAWData['saw_get_kriteria'] as $SAWdataKriteria) : ?>
                                <tr>
                                    <td class="text-bold-500 text-center"><?= $No; ?></td>
                                    <td class="text-bold-500 text-center">
                                        <a href="#" class="btn btn-warning btn-sm text-white" data-bs-toggle="modal" data-bs-target="#ubahKriteria<?= $SAWdataKriteria['id_kriteria']; ?>">
                                            <i class="fa fa-pen"></i> Ubah
                                        </a>
                                        <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusKriteria<?= $SAWdataKriteria['id_kriteria']; ?>">
                                            <i class="fa fa-trash"></i> Hapus
                                        </a>
                                    </td>
                                    <td class="text-bold-500 text-center"><?= $SAWdataKriteria['kategori_kriteria']; ?></td>
                                    <td class="text-bold-500 text-center"><?= $SAWdataKriteria['nama_kriteria']; ?></td>
                                    <td class="text-bold-500 text-center"><?= $SAWdataKriteria['kode_kriteria']; ?></td>
                                    <td class="text-bold-500 text-center"><?= $SAWdataKriteria['nilai_kriteria']; ?></td>
                                    <td class="text-bold-500 text-center"><?= $SAWdataKriteria['bobot_kriteria']; ?></td>
                                </tr>
                                    <div class="modal fade text-left" id="ubahKriteria<?= $SAWdataKriteria['id_kriteria']; ?>" tabindex="-1" role="dialog" aria-labelledby="ubahKriteriaLabel" data-bs-backdrop="false" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h4 class="modal-title" id="ubahKriteriaLabel">Ubah Kriteria</h4>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <form action="<?= BASEURL?>/SAW_Kriteria/SAWupdateKriteria" method="post">
                                                    <div class="modal-body">
                                                        <label for="saw_nama_kriteria">Nama Kriteria</label>
                                                        <div class="form-group">
                                                            <input id="saw_nama_kriteria" name="saw_nama_kriteria" value="<?= $SAWdataKriteria['nama_kriteria']; ?>" type="text" class="form-control form-control-sm">
                                                            <input id="saw_id_kriteria" name="saw_id_kriteria" value="<?= $SAWdataKriteria['id_kriteria']; ?>" type="hidden" class="form-control form-control-sm">
                                                        </div>
                                                        <label for="saw_kode_kriteria">Kode Kriteria</label>
                                                        <div class="form-group">
                                                            <input id="saw_kode_kriteria" name="saw_kode_kriteria" value="<?= $SAWdataKriteria['kode_kriteria']; ?>" type="text" class="form-control form-control-sm">
                                                        </div>
                                                        <label for="saw_nilai_kriteria">Nilai Kriteria</label>
                                                        <div class="form-group">
                                                            <input id="saw_nilai_kriteria" name="saw_nilai_kriteria" value="<?= $SAWdataKriteria['nilai_kriteria']; ?>" type="number" class="form-control form-control-sm">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="saw_kategori_kriteria">Kategori Kriteria</label>
                                                            <select id="saw_kategori_kriteria" name="saw_kategori_kriteria" class="form-select form-control form-control-sm" aria-label="Default select example">
                                                                <option value="<?= $SAWdataKriteria['kategori_kriteria']; ?>"><?= $SAWdataKriteria['kategori_kriteria']; ?></option>
                                                                <option value="Cost">Cost</option>
                                                                <option value="Benefit">Benefit</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-secondary text-white" data-bs-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Tutup</span>
                                                        </button>
                                                        <button type="reset" class="btn btn-sm btn-danger text-white ms-1">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Reset</span>
                                                        </button>
                                                        <button type="submit" class="btn btn-sm btn-primary ms-1">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Simpan</span>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade text-left" id="hapusKriteria<?= $SAWdataKriteria['id_kriteria']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusKriteriaLabel" data-bs-backdrop="false" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h4 class="modal-title" id="hapusKriteriaLabel">Hapus Kriteria</h4>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <span>Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.</span>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm btn-secondary text-white" data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Batal</span>
                                                    </button>
                                                    <a href="<?= BASEURL; ?>/SAW_Kriteria/SAWdeleteKriteria/<?= $SAWdataKriteria['id_kriteria']; ?>" class="btn btn-sm btn-primary ms-1">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Ya, Saya yakin</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $No++; ?>
                                <?php endforeach; ?>
                                <tr>
                                    <?php
                                    $KeteranganKriteria = "";
                                    $WarnaFontKriteria = "";
                                    $WarnaFontBobot = "";
                                    $NilaiKriteria = $getSAWData['saw_get_total_bobot_kriteria']['total_nilai'];
                                    $NilaiBobot = $getSAWData['saw_get_total_bobot_kriteria']['total_bobot'];
                                    if($NilaiBobot < 1)
                                    {
                                        $WarnaFontBobot = "text-warning";
                                    }elseif ($NilaiBobot == 1){
                                        $WarnaFontBobot = "text-success";
                                    }elseif ($NilaiBobot > 1){
                                        $WarnaFontBobot = "text-danger";
                                    }
                                    if($NilaiKriteria < 100)
                                    {
                                        $KeteranganKriteria = "Nilai Kriteria Belum Mencukupi Batas 100, Silahkan Periksa Nilai Kriteria";
                                        $WarnaFontKriteria = "text-warning";
                                    }elseif ($NilaiKriteria == 100){
                                        $KeteranganKriteria = "Nilai Kriteria Sudah Sesuai";
                                        $WarnaFontKriteria = "text-success";
                                    }elseif ($NilaiKriteria > 100){
                                        $KeteranganKriteria = "Nilai Kriteria Melebihi Batas 100, Silahkan Periksa Nilai Kriteria";
                                        $WarnaFontKriteria = "text-danger";
                                    }
                                    ?>
                                    <td colspan="5" class="<?= $WarnaFontKriteria; ?>text-center font-weight-bold">Total : <?= $KeteranganKriteria; ?></td>
                                    <td class="text-center <?= $WarnaFontKriteria; ?> font-weight-bold"><?= $NilaiKriteria; ?></td>
                                    <td class="text-center <?= $WarnaFontBobot; ?> font-weight-bold"><?= $NilaiBobot; ?></td>
                                </tr>
                                <tr>
                                    <?php
                                    $dataBobot = [];
                                    foreach ( $getSAWData['saw_get_kriteria'] as $SAWdataKriteria){
                                        $dataBobot[] = $SAWdataKriteria['bobot_kriteria'];
                                    }
                                    ?>
                                    <td colspan="7" class="font-weight-bold">Matriks Bobot : W<small>ij</small> = [ <?= implode(', ', $dataBobot) ; ?> ]</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="modal fade text-left" id="tambahKriteria" tabindex="-1" role="dialog" aria-labelledby="tambahKriteriaLabel" data-bs-backdrop="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="tambahKriteriaLabel">Tambah Kriteria</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="<?= BASEURL?>/SAW_Kriteria/SAWcreateKriteria" method="post">
                <div class="modal-body">
                    <label for="saw_nama_kriteria">Nama Kriteria</label>
                    <div class="form-group">
                        <input id="saw_nama_kriteria" name="saw_nama_kriteria" required type="text" class="form-control form-control-sm">
                    </div>
                    <label for="saw_kode_kriteria">Kode Kriteria</label>
                    <div class="form-group">
                        <input id="saw_kode_kriteria" name="saw_kode_kriteria" required type="text" class="form-control form-control-sm">
                    </div>
                    <label for="saw_nilai_kriteria">Nilai Kriteria</label>
                    <div class="form-group">
                        <input id="saw_nilai_kriteria" name="saw_nilai_kriteria"  required type="number" class="form-control form-control-sm">
                    </div>
                    <div class="form-group">
                    <label for="saw_kategori_kriteria">Kategori Kriteria</label>
                    <select id="saw_kategori_kriteria" name="saw_kategori_kriteria" class="form-select form-control form-control-sm" aria-label="Default select example">
                        <option selected>--Pilih Kategori--</option>
                        <option value="Cost">Cost</option>
                        <option value="Benefit">Benefit</option>
                    </select>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary text-white" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Tutup</span>
                    </button>
                    <button type="reset" class="btn btn-sm btn-danger text-white ms-1">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Reset</span>
                    </button>
                    <button type="submit" class="btn btn-sm btn-primary ms-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>