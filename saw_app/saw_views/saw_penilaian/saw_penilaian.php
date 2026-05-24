<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-5">
                <h3>Halaman <?= $getSAWData['saw_subtitle_penilaian']; ?></h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= BASEURL; ?>/saw_dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $getSAWData['saw_subtitle_penilaian']; ?></li>
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
                            <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#tambahPenilaian">
                                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah <?= $getSAWData['saw_subtitle_penilaian']; ?>
                            </button>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <?php
                            $SAWDataAlternatif = [];
                            $edit = [];
                            foreach ($getSAWData['saw_get_penilaian'] as $SAWdataPenilaian)
                            {
                                $SAWidAlternatif = $SAWdataPenilaian['id_siswa'];
                                $SAWnamaAlternatif = $SAWdataPenilaian['nama_siswa'];
                                $SAWKriteria = $SAWdataPenilaian['nama_kriteria'];
                                $SAWSubKriteria = $SAWdataPenilaian['nilai_sub_kriteria'];
                                $SAWDataAlternatif[$SAWidAlternatif]['namaalternatif'] = $SAWnamaAlternatif;
                                $SAWDataAlternatif[$SAWidAlternatif]['nilaikriteria'][$SAWKriteria] = $SAWSubKriteria;
                                $edit[$SAWdataPenilaian['id_kriteria']] = $SAWdataPenilaian['id_sub_kriteria'];
                            }
                            ?>
                            <table class="table table-striped mb-0">
                                <thead class="text-center">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center" width="20%">Aksi</th>
                                    <th class="text-center">Alternatif (A)</th>
                                    <?php foreach( $getSAWData['saw_get_kriteria'] as $SAWKriteria) : ?>
                                        <th class="text-center"><?= $SAWKriteria['nama_kriteria']; ?> (<?= $SAWKriteria['kode_kriteria']; ?>)</th>
                                    <?php endforeach; ?>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $No = 1; ?>
                                <?php
                                foreach ($SAWDataAlternatif as $SAWidAlt => $SAWNilaiSubKriteria) :
                                ?>
                                <tr>
                                    <td class="text-bold-500 text-center"><?= $No; ?></td>
                                    <td class="text-bold-500 text-center">
                                        <a href="#" class="btn btn-warning btn-sm text-white" data-bs-toggle="modal" data-bs-target="#ubahPenilaian<?= $SAWidAlt; ?>">
                                            <i class="fa fa-pen"></i> Ubah
                                        </a>
                                        <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusPenilaian<?= $SAWidAlt; ?>">
                                            <i class="fa fa-trash"></i> Hapus
                                        </a>
                                    </td>
                                    <td class="text-bold-500 text-center"><?= $SAWNilaiSubKriteria['namaalternatif']; ?></td>
                                    <?php foreach($getSAWData['saw_get_kriteria'] as $SAWKriteria) : ?>
                                        <td class="text-bold-500 text-center">
                                            <?= $SAWNilaiSubKriteria['nilaikriteria'][$SAWKriteria['nama_kriteria']] ?? '-'; ?>
                                        </td>
                                    <?php endforeach; ?>
                                </tr>
                                    <div class="modal fade text-left" id="ubahPenilaian<?= $SAWidAlt; ?>" tabindex="-1" role="dialog" aria-labelledby="ubahPenilaianLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h4 class="modal-title" id="ubahPenilaianLabel">Ubah Penilaian</h4>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <form action="<?= BASEURL; ?>/SAW_Penilaian/SAWupdatePenilaian" method="post">
                                                    <div class="modal-body">
                                                        <label for="saw_id_alternatif">Nama Alternatif</label>
                                                        <div class="form-group">
                                                            <input id="saw_id_alternatif" name="saw_id_alternatif" value="<?= $SAWNilaiSubKriteria['namaalternatif']; ?>" type="text" class="form-control form-control-sm" readonly>
                                                        </div>
                                                        <?php foreach ($getSAWData['saw_get_kriteria'] as $SAWdataKriteria) : ?>
                                                            <label for="saw_id_subkriteria" class="form-label">
                                                                <?= $SAWdataKriteria['nama_kriteria']; ?>
                                                            </label>
                                                            <div class="form-group">
                                                                <select class="form-select form-control form-control-sm" id="saw_id_subkriteria" name="saw_id_subkriteria[<?= $SAWdataKriteria['id_kriteria']; ?>]">
                                                                    <option value="">-- Pilih Sub Kriteria --</option>
                                                                    <?php foreach($getSAWData['saw_get_subkriteria'] as $SAWdataSubKriteria) : ?>
                                                                        <?php if($SAWdataSubKriteria['id_kriteria'] == $SAWdataKriteria['id_kriteria']) : ?>
                                                                            <option value="<?= $SAWdataSubKriteria['id_sub_kriteria']; ?>"
                                                                                <?php if(isset($edit[$SAWdataKriteria['id_kriteria']])
                                                                                    && $edit[$SAWdataKriteria['id_kriteria']] == $SAWdataSubKriteria['id_sub_kriteria']) : ?>
                                                                                    selected
                                                                                <?php endif; ?>>
                                                                                <?= $SAWdataSubKriteria['nilai_sub_kriteria']; ?> | <?= $SAWdataSubKriteria['nama_sub_kriteria']; ?>
                                                                            </option>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        <?php endforeach; ?>
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
                                    <div class="modal fade text-left" id="hapusPenilaian<?= $SAWidAlt; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusPenilaianLabel" data-bs-backdrop="false" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h4 class="modal-title" id="hapusPenilaianLabel">Hapus Penilaian</h4>
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
                                                    <a href="<?= BASEURL; ?>/SAW_Penilaian/SAWdeletePenilaian/<?= $SAWidAlt; ?>" class="btn btn-sm btn-primary ms-1">
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
<div class="modal fade" id="tambahPenilaian" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalScrollableTitle" data-bs-backdrop="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="exampleModalScrollableTitle">Tambah Penilaian</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="<?= BASEURL; ?>/SAW_Penilaian/SAWcreatePenilaian" method="post">
                <div class="modal-body">
                    <label for="saw_id_alternatif" class="form-label">Nama Alternatif</label>
                    <div class="form-group">

                        <select class="form-select form-control form-control-sm" aria-label="Default select example" id="saw_id_alternatif" name="saw_id_alternatif" required>
                            <?php foreach ($getSAWData['saw_get_alternatif'] as $SAWdataAlternatif) : ?>
                                <option value="<?= $SAWdataAlternatif['id_siswa']; ?>"><?= $SAWdataAlternatif['nama_siswa']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <?php foreach ($getSAWData['saw_get_kriteria'] as $SAWdataKrieria) : ?>
                        <label for="saw_id_subkriteria" class="form-label">
                            <?= $SAWdataKrieria['nama_kriteria']; ?>
                        </label>
                        <div class="form-group">
                            <select class="form-select form-control form-control-sm" id="saw_id_subkriteria" name="saw_id_subkriteria[<?= $SAWdataKrieria['id_kriteria']; ?>]" required>
                                <option value="">-- Pilih Sub Kriteria --</option>
                                <?php foreach($getSAWData['saw_get_subkriteria'] as $SAWdataSubKrieria) : ?>
                                    <?php if($SAWdataSubKrieria['id_kriteria'] == $SAWdataKrieria['id_kriteria']) : ?>
                                        <option value="<?= $SAWdataSubKrieria['id_sub_kriteria']; ?>">
                                            <?= $SAWdataSubKrieria['nilai_sub_kriteria']; ?> | <?= $SAWdataSubKrieria['nama_sub_kriteria']; ?>
                                        </option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endforeach; ?>
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