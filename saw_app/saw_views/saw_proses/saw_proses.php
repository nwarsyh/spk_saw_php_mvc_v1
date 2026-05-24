<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-5">
                <h3>Halaman <?= $getSAWData['saw_subtitle_proses']; ?></h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= BASEURL; ?>/saw_dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $getSAWData['saw_subtitle_proses']; ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="page-content">
    <section class="dataawal">
        <div class="row" id="table-striped">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h1 class="h3 mb-0 text-gray-800">Alternatif (A<sub>ij</sub>) Dan Kriteria (C<sub>ij</sub>)</h1>
                        </div>
                    </div>
                    <div class="card-content mt-4">
                        <div class="table-responsive">
                            <?php
                            $SAWDataAlternatif = [];
                            foreach ($getSAWData['saw_get_proses'] as $SAWdataPenilaian)
                            {
                                $SAWidAlternatif = $SAWdataPenilaian['id_siswa'];
                                $SAWnamaAlternatif = $SAWdataPenilaian['nama_siswa'];
                                $SAWKriteria = $SAWdataPenilaian['nama_kriteria'];
                                $SAWSubKriteria = $SAWdataPenilaian['nilai_sub_kriteria'];
                                $SAWDataAlternatif[$SAWidAlternatif]['namaalternatif'] = $SAWnamaAlternatif;
                                $SAWDataAlternatif[$SAWidAlternatif]['nilaikriteria'][$SAWKriteria] = $SAWSubKriteria;
                            }
                            ?>
                            <table class="table table-striped mb-0">
                                <thead class="text-center">
                                <tr>
                                    <th class="text-center" width="10%">A</th>
                                    <?php foreach( $getSAWData['saw_get_kriteria'] as $SAWKriteria) : ?>
                                        <th class="text-center"><?= $SAWKriteria['kode_kriteria']; ?></th>
                                    <?php endforeach; ?>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $No = 1; ?>
                                <?php
                                foreach ($SAWDataAlternatif as $SAWidAlt => $SAWNilaiSubKriteria) :
                                    ?>
                                    <tr>
                                        <td class="text-bold-500 text-center"><?= $SAWNilaiSubKriteria['namaalternatif']; ?></td>
                                        <?php foreach($getSAWData['saw_get_kriteria'] as $SAWKriteria) : ?>
                                            <td class="text-bold-500 text-center">
                                                <?= $SAWNilaiSubKriteria['nilaikriteria'][$SAWKriteria['nama_kriteria']] ?? '-'; ?>
                                            </td>
                                        <?php endforeach; ?>
                                    </tr>
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
    <section class="dataawal">
        <div class="row" id="table-striped">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-danger">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h1 class="h3 mb-0 text-gray-800">Normalisasi R<sub>ij</sub></h1>
                        </div>
                    </div>
                    <div class="card-content mt-4">
                        <div class="table-responsive">
                            <?php
                            $SAWNilaiKriteria = [];
                            foreach ($getSAWData['saw_get_proses'] as $SAWdataProses)
                            {
                                $SAWnamaKriteria = $SAWdataProses['nama_kriteria'];
                                $SAWnamaKategori = $SAWdataProses['kategori_kriteria'];
                                $SAWnamaSubKriteria = $SAWdataProses['nilai_sub_kriteria'];
                                $SAWNilaiKriteria[$SAWnamaKriteria]['kategori'] = $SAWnamaKategori;
                                $SAWNilaiKriteria[$SAWnamaKriteria]['nilai'][] = $SAWnamaSubKriteria;
                            }
                            $SAWDataKriteria = [];
                            foreach($SAWNilaiKriteria as $SAWKriteria => $SAWKriteriaData)
                            {
                                $SAWDataKriteria[$SAWKriteria]['kategori'] = $SAWKriteriaData['kategori'];
                                $SAWDataKriteria[$SAWKriteria]['max'] = max($SAWKriteriaData['nilai']);
                                $SAWDataKriteria[$SAWKriteria]['min'] = min($SAWKriteriaData['nilai']);
                            }
                            $SAWNormalisasi = [];
                            foreach ($getSAWData['saw_get_proses'] as $SAWdataProses)
                            {
                                $SAWidAlternatif = $SAWdataProses['id_siswa'];
                                $SAWnamaAlternatif = $SAWdataProses['nama_siswa'];
                                $SAWnamaKriteria = $SAWdataProses['nama_kriteria'];
                                $SAWnamaSubKriteria = $SAWdataProses['nilai_sub_kriteria'];
                                $SAWnamaKategori = $SAWDataKriteria[$SAWnamaKriteria]['kategori'];
                                $SAWNilaiMax = $SAWDataKriteria[$SAWnamaKriteria]['max'];
                                $SAWNilaiMin = $SAWDataKriteria[$SAWnamaKriteria]['min'];
                                if($SAWnamaKategori == 'Benefit'){
                                    $SAWhasilNormalisasi = $SAWnamaSubKriteria / $SAWNilaiMax;
                                }else{
                                    $SAWhasilNormalisasi = $SAWNilaiMin / $SAWnamaSubKriteria;
                                }
                                $SAWNormalisasi[$SAWidAlternatif]['nama'] = $SAWnamaAlternatif;
                                $SAWNormalisasi[$SAWidAlternatif]['nilai'][$SAWnamaKriteria] = round($SAWhasilNormalisasi, 3);
                            }
                            ?>
                            <table class="table table-striped mb-0">
                                <thead class="text-center">
                                <tr>
                                    <th class="text-center" width="10%">A</th>
                                    <?php foreach( $getSAWData['saw_get_kriteria'] as $SAWKriteria) : ?>
                                        <th class="text-center"><?= $SAWKriteria['kode_kriteria']; ?></th>
                                    <?php endforeach; ?>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($SAWNormalisasi as $SAWidAlternatif => $SAWdataNormalisasi) : ?>
                                    <tr>
                                        <td class="text-center"><?= $SAWdataNormalisasi['nama']; ?></td>
                                        <?php foreach( $getSAWData['saw_get_kriteria'] as $SAWKriteria) : ?>
                                            <td class="text-center"><?= $SAWdataNormalisasi['nilai'][$SAWKriteria['nama_kriteria']]?? '-'; ?></td>
                                        <?php endforeach; ?>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="dataawal">
        <div class="row" id="table-striped">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h1 class="h3 mb-0 text-gray-800">Preferensi V<sub>ij</sub></h1>
                        </div>
                    </div>
                    <div class="card-content mt-4">
                        <div class="table-responsive">
                            <?php
                            $SAWRanking = [];
                            foreach($SAWNormalisasi as $SAWidAlternatif => $SAWdataPreferensi)
                            {
                                $SAWNilaiTotal = 0;
                                foreach($getSAWData['saw_get_kriteria'] as $SAWKriteria)
                                {
                                    $SAWnamaKriteria = $SAWKriteria['nama_kriteria'];
                                    $SAWnilaiNormalisasi = $SAWdataPreferensi['nilai'][$SAWnamaKriteria] ?? 0;
                                    $SAWnilaiBobot = $SAWKriteria['bobot_kriteria'];
                                    $SAWhasilPreferensi = $SAWnilaiNormalisasi * $SAWnilaiBobot;
                                    $SAWRanking[$SAWidAlternatif]['preferensi'][$SAWnamaKriteria] = round($SAWhasilPreferensi, 3);
                                    $SAWNilaiTotal += $SAWhasilPreferensi;
                                }
                                $SAWRanking[$SAWidAlternatif]['nama'] = $SAWdataPreferensi['nama'];
                                $SAWRanking[$SAWidAlternatif]['total'] = round($SAWNilaiTotal, 3);
                            }
                            ?>
                            <table class="table table-striped mb-0">
                                <thead class="text-center">
                                <tr>
                                    <th class="text-center" width="10%">A</th>
                                    <?php foreach($getSAWData['saw_get_kriteria'] as $SAWKriteria) : ?>
                                        <th class="text-center"><?= $SAWKriteria['kode_kriteria']; ?></th>
                                    <?php endforeach; ?>
                                    <th width="10%" class="text-center">V<sub>ij</sub></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($SAWRanking as $SAWdataRangking) : ?>
                                    <tr class="text-center">
                                        <td><?= $SAWdataRangking['nama']; ?></td>
                                        <?php foreach($getSAWData['saw_get_kriteria'] as $SAWKriteria) : ?>
                                            <td><?= $SAWdataRangking['preferensi'][$SAWKriteria['nama_kriteria']]?? '-'; ?></td>
                                        <?php endforeach; ?>
                                        <td><b><?= $SAWdataRangking['total']; ?></b></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="dataawal">
        <div class="row" id="table-striped">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-success">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h1 class="h3 mb-0 text-gray-800">Perangkingan SAW</h1>
                        </div>
                    </div>
                    <div class="card-content mt-4">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead class="text-center">
                                <tr>
                                    <th class="text-center" width="80%">Alternatif</th>
                                    <th class="text-center" width="10%">Nilai Akhir</th>
                                    <th class="text-center" width="10%">Rangking</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                usort($SAWRanking, function($SAWNilaiA, $SAWNilaiB){return $SAWNilaiB['total'] <=> $SAWNilaiA['total'];});
                                ?>
                                <?php $SAWRankingNo = 1; ?>
                                <?php foreach($SAWRanking as $SAWdataRangking) : ?>
                                    <tr class="text-center">
                                        <td><?= $SAWdataRangking['nama']; ?></td>
                                        <td><?= $SAWdataRangking['total']; ?></td>
                                        <td><?= $SAWRankingNo++; ?></td>
                                    </tr>
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