<?php
class SAW_PenilaianModel
{
    private $SAW_JudulPenilaian = 'Penilaian';
    private $SAW_TabelAlternatif = 'tb_siswa';
    private $SAW_TabelKriteria = 'tb_kriteria';
    private $SAW_TabelSubKriteria = 'tb_sub_kriteria';
    private $SAW_TabelPenilaian = 'tb_penilaian';
    public function GetSAW_JudulPenilaian()
    {
        return $this->SAW_JudulPenilaian;
    }
    public function __construct()
    {
        $this->Database = new SAW_Database();
    }
    public function SAWgetPenilaian()
    {
        $this->Database->query("SELECT p.*,
        sk.nama_sub_kriteria, sk.nilai_sub_kriteria,
        k.nama_kriteria, k.kode_kriteria, k.kategori_kriteria,
        s.nama_siswa
        FROM {$this->SAW_TabelPenilaian} p
        LEFT JOIN {$this->SAW_TabelAlternatif} s
        ON p.id_siswa = s.id_siswa
        LEFT JOIN {$this->SAW_TabelSubKriteria} sk
        ON p.id_sub_kriteria = sk.id_sub_kriteria
        LEFT JOIN {$this->SAW_TabelKriteria} k
        ON sk.id_kriteria = k.id_kriteria ORDER BY p.id_siswa ASC");
        return $this->Database->resultSet();
    }
    public function SAWgetAlternatif()
    {
        $this->Database->query('SELECT * FROM ' . $this->SAW_TabelAlternatif);
        return $this->Database->resultSet();
    }
    public function SAWgetSubKriteria()
    {
        $this->Database->query('SELECT * FROM ' . $this->SAW_TabelSubKriteria);
        return $this->Database->resultSet();
    }
    public function SAWgetKriteria()
    {
        $this->Database->query('SELECT * FROM ' . $this->SAW_TabelKriteria);
        return $this->Database->resultSet();
    }
    public function SAWsimpanPenilaian($SAWsimpanPenilaian)
    {
        $this->Database->query("INSERT INTO {$this->SAW_TabelPenilaian} VALUES ('',
        :id_siswa, :id_kriteria, :id_sub_kriteria)");
        $this->Database->bind('id_siswa', $SAWsimpanPenilaian['saw_id_alternatif']);
        $this->Database->bind('id_kriteria', $SAWsimpanPenilaian['saw_id_kriteria']);
        $this->Database->bind('id_sub_kriteria', $SAWsimpanPenilaian['saw_id_sub_kriteria']);
        $this->Database->execute();
        return $this->Database->rowCount();
    }
    public function SAWubahPenilaian($SAWubahPenilaian)
    {
        $this->Database->query("UPDATE {$this->SAW_TabelPenilaian} SET
        id_sub_kriteria =:saw_id_sub_kriteria
        WHERE id_siswa =:saw_id_alternatif
        AND id_kriteria = :saw_id_kriteria");
        $this->Database->bind('saw_id_alternatif', $SAWubahPenilaian['saw_id_alternatif']);
        $this->Database->bind('saw_id_kriteria', $SAWubahPenilaian['saw_id_kriteria']);
        $this->Database->bind('saw_id_sub_kriteria', $SAWubahPenilaian['saw_id_sub_kriteria']);
        $this->Database->execute();
        return $this->Database->rowCount();
    }
    public function SAWhapusPenilaian($SAWhapusPenilaian)
    {
        $this->Database->query("DELETE FROM {$this->SAW_TabelPenilaian} WHERE id_siswa =:saw_id_alternatif");
        $this->Database->bind('saw_id_alternatif', $SAWhapusPenilaian);
        $this->Database->execute();
        return $this->Database->rowCount();
    }
}