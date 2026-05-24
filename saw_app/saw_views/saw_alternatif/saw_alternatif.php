<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-5">
                <h3>Halaman <?= $getSAWData['saw_subtitle_alternatif']; ?></h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= BASEURL; ?>/saw_dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $getSAWData['saw_subtitle_alternatif']; ?></li>
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
                            <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#tambahAlternatif">
                                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah <?= $getSAWData['saw_subtitle_alternatif']; ?>
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
                                    <th>Nama Alternatif</th>
                                    <th>Kode Alternatif</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $No = 1; ?>
                                <?php foreach ($getSAWData['saw_get_alternatif'] as $SAWdataAlternatif) : ?>
                                <tr>
                                    <td class="text-bold-500 text-center"><?= $No; ?></td>
                                    <td class="text-bold-500 text-center">
                                        <a href="#" class="btn btn-warning btn-sm text-white" data-bs-toggle="modal" data-bs-target="#ubahAlternatif<?= $SAWdataAlternatif['id_siswa']; ?>">
                                            <i class="fa fa-pen"></i> Ubah
                                        </a>
                                        <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusAlternatif<?= $SAWdataAlternatif['id_siswa']; ?>">
                                            <i class="fa fa-trash"></i> Hapus
                                        </a>
                                    </td>
                                    <td class="text-bold-500 text-center"><?= $SAWdataAlternatif['nama_siswa']; ?></td>
                                    <td class="text-bold-500 text-center"><?= $SAWdataAlternatif['kode_siswa']; ?></td>
                                </tr>
                                    <div class="modal fade text-left" id="ubahAlternatif<?= $SAWdataAlternatif['id_siswa']; ?>" tabindex="-1" role="dialog" aria-labelledby="ubahAlternatifLabel" data-bs-backdrop="false" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h4 class="modal-title" id="ubahAlternatifLabel">Ubah Alternatif</h4>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <form action="<?= BASEURL; ?>/SAW_Alternatif/SAWupdateAlternatif" method="post">
                                                    <div class="modal-body">
                                                        <label for="saw_nama_alternatif">Nama Alternatif</label>
                                                        <div class="form-group">
                                                            <input id="saw_nama_alternatif" name="saw_nama_alternatif" value="<?= $SAWdataAlternatif['nama_siswa']; ?>" type="text" class="form-control form-control-sm">
                                                            <input id="saw_id_alternatif" name="saw_id_alternatif" value="<?= $SAWdataAlternatif['id_siswa']; ?>" type="hidden" class="form-control form-control-sm">
                                                        </div>
                                                        <label for="saw_kode_alternatif">Kode Alternatif</label>
                                                        <div class="form-group">
                                                            <input id="saw_kode_alternatif" name="saw_kode_alternatif" value="<?= $SAWdataAlternatif['kode_siswa']; ?>" type="text" class="form-control form-control-sm">
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
                                    <div class="modal fade text-left" id="hapusAlternatif<?= $SAWdataAlternatif['id_siswa']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusAlternatifLabel" data-bs-backdrop="false" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h4 class="modal-title" id="hapusAlternatifLabel">Hapus Alternatif</h4>
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
                                                        <a href="<?= BASEURL; ?>/SAW_Alternatif/SAWdeleteAlternatif/<?= $SAWdataAlternatif['id_siswa']; ?>" class="btn btn-sm btn-primary ms-1">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Ya, Saya yakin</span>
                                                        </a>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $No++; ?>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="modal fade text-left" id="tambahAlternatif" tabindex="-1" role="dialog" aria-labelledby="tambahAlternatifLabel" data-bs-backdrop="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="tambahAlternatifLabel">Tambah Alternatif</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="<?= BASEURL; ?>/SAW_Alternatif/SAWcreateAlternatif" method="post">
                <div class="modal-body">
                    <label for="saw_nama_alternatif">Nama Alternatif</label>
                    <div class="form-group">
                        <input id="saw_nama_alternatif" name="saw_nama_alternatif" required type="text" class="form-control form-control-sm">
                    </div>
                    <label for="saw_kode_alternatif">Kode Alternatif</label>
                    <div class="form-group">
                        <input id="saw_kode_alternatif" name="saw_kode_alternatif" required type="text" class="form-control form-control-sm">
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
