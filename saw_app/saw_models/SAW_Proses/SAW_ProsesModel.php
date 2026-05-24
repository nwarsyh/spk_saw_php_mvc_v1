<?php
class SAW_ProsesModel
{
    private $SAW_JudulProses = 'Proses';
    private $SAW_TabelAlternatif = 'tb_siswa';
    private $SAW_TabelKriteria = 'tb_kriteria';
    private $SAW_TabelSubKriteria = 'tb_sub_kriteria';
    private $SAW_TabelPenilaian = 'tb_penilaian';
    public function GetSAW_JudulProses()
    {
        return $this->SAW_JudulProses;
    }
    public function __construct()
    {
        $this->Database = new SAW_Database();
    }
    public function SAWgetProses()
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
}