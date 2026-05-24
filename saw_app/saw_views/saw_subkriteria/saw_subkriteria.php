<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-5">
                <h3>Halaman <?= $getSAWData['saw_subtitle_subkriteria']; ?></h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= BASEURL; ?>/saw_dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $getSAWData['saw_subtitle_subkriteria']; ?></li>
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
                            <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#tambahSubKriteria">
                                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah <?= $getSAWData['saw_subtitle_subkriteria']; ?>
                            </button>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Aksi</th>
                                    <th class="text-center">Nama Kriteria</th>
                                    <th class="text-center">Nama Sub Kriteria</th>
                                    <th class="text-center">Nilai Sub Kriteria</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $No = 1; ?>
                                <?php foreach ($getSAWData['saw_get_sub_kriteria'] as $SAWdataSubKriteria) : ?>
                                <tr>
                                    <td class="text-bold-500 text-center"><?= $No; ?></td>
                                    <td class="text-bold-500 text-center">
                                        <a href="#" class="btn btn-warning btn-sm text-white" data-bs-toggle="modal" data-bs-target="#ubahSubKriteria<?= $SAWdataSubKriteria['id_sub_kriteria']; ?>">
                                            <i class="fa fa-pen"></i> Ubah
                                        </a>
                                        <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusSubKriteria<?= $SAWdataSubKriteria['id_sub_kriteria']; ?>">
                                            <i class="fa fa-trash"></i> Hapus
                                        </a>
                                    </td>
                                    <td class="text-bold-500 text-center"><?= $SAWdataSubKriteria['nama_kriteria']; ?></td>
                                    <td class="text-bold-500 text-center"><?= $SAWdataSubKriteria['nama_sub_kriteria']; ?></td>
                                    <td class="text-bold-500 text-center"><?= $SAWdataSubKriteria['nilai_sub_kriteria']; ?></td>
                                </tr>
                                    <div class="modal fade text-left" id="ubahSubKriteria<?= $SAWdataSubKriteria['id_sub_kriteria']; ?>" tabindex="-1" role="dialog" aria-labelledby="ubahSubKriteriaLabel" data-bs-backdrop="false" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h4 class="modal-title" id="ubahSubKriteriaLabel">Ubah Sub Kriteria Backdrop</h4>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <form action="<?= BASEURL; ?>/SAW_SubKriteria/SAWupdateSubKriteria" method="post">
                                                    <div class="modal-body">
                                                        <input id="saw_id_kriteria" name="saw_id_sub_kriteria" value="<?= $SAWdataSubKriteria['id_sub_kriteria']; ?>" type="hidden" class="form-control form-control-sm">
                                                        <label for="saw_nama_sub_kriteria">Nama Sub Kriteria</label>
                                                        <div class="form-group">
                                                            <select id="saw_nama_sub_kriteria" name="saw_nama_sub_kriteria" class="form-select form-control form-control-sm" aria-label="Default select example">
                                                                <option value="<?= $SAWdataSubKriteria['nama_sub_kriteria']; ?>"><?= $SAWdataSubKriteria['nama_sub_kriteria']; ?></option>
                                                                <option value="Baik Sekali">Baik Sekali</option>
                                                                <option value="Baik">Baik</option>
                                                                <option value="Cukup Baik">Cukup Baik</option>
                                                                <option value="Cukup">Cukup</option>
                                                                <option value="Kurang Baik">Kurang Baik</option>
                                                            </select>
                                                        </div>
                                                        <label for="saw_id_kriteria" class="form-label">Nama Kriteria</label>
                                                        <div class="form-group">
                                                            <select id="saw_id_kriteria" name="saw_id_kriteria" class="form-select form-control form-control-sm" aria-label="Default select example">
                                                                <?php foreach ($getSAWData['saw_get_kriteria'] as $SAWdataKriteria) : ?>
                                                                    <option value="<?= $SAWdataKriteria['id_kriteria']; ?>"
                                                                        <?= ($SAWdataKriteria['id_kriteria'] == $SAWdataSubKriteria['id_kriteria']) ? 'selected' : '' ?>>
                                                                        <?= $SAWdataKriteria['nama_kriteria']; ?>
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <label for="saw_nilai_sub_kriteria">Nilai Sub Kriteria</label>
                                                        <div class="form-group">
                                                            <input id="saw_nilai_sub_kriteria" name="saw_nilai_sub_kriteria"  value="<?= $SAWdataSubKriteria['nilai_sub_kriteria']; ?>" type="number" class="form-control form-control-sm" >
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
                                    <div class="modal fade text-left" id="hapusSubKriteria<?= $SAWdataSubKriteria['id_sub_kriteria']; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusSubKriteriaLabel" data-bs-backdrop="false" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h4 class="modal-title" id="hapusSubKriteriaLabel">Hapus Sub Kriteria</h4>
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
                                                    <a href="<?= BASEURL; ?>/SAW_SubKriteria/SAWdeleteSubKriteria/<?= $SAWdataSubKriteria['id_sub_kriteria']; ?>" class="btn btn-sm btn-primary ms-1">
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
<div class="modal fade text-left" id="tambahSubKriteria" tabindex="-1" role="dialog" aria-labelledby="tambahSubKriteriaLabel" data-bs-backdrop="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="tambahSubKriteriaLabel">Tambah Sub Kriteria Backdrop</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="<?= BASEURL; ?>/SAW_SubKriteria/SAWcreateSubKriteria" method="post">
                <div class="modal-body">
                    <label for="saw_nama_sub_kriteria">Nama Sub Kriteria</label>
                    <div class="form-group">
                        <select id="saw_nama_sub_kriteria" name="saw_nama_sub_kriteria" required class="form-select form-control form-control-sm" aria-label="Default select example">
                            <option selected>--Pilih Kriteria--</option>
                            <option value="Baik Sekali">Baik Sekali</option>
                            <option value="Baik">Baik</option>
                            <option value="Cukup Baik">Cukup Baik</option>
                            <option value="Cukup">Cukup</option>
                            <option value="Kurang Baik">Kurang Baik</option>
                        </select>
                    </div>
                    <label for="saw_id_kriteria" class="form-label">Nama Kriteria</label>
                    <div class="form-group">
                        <select id="saw_id_kriteria" name="saw_id_kriteria" required class="form-select form-control form-control-sm" aria-label="Default select example">
                            <option selected>--Pilih Kriteria--</option>
                            <?php foreach ($getSAWData['saw_get_kriteria'] as $SAWdataKriteria) : ?>
                                <option value="<?= $SAWdataKriteria['id_kriteria']; ?>"><?= $SAWdataKriteria['nama_kriteria']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <label for="saw_nilai_sub_kriteria">Nilai Sub Kriteria</label>
                    <div class="form-group">
                        <input id="saw_nilai_sub_kriteria" name="saw_nilai_sub_kriteria"  required type="number" class="form-control form-control-sm" >
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
