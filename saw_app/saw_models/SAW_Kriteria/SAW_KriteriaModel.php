<?php
class SAW_KriteriaModel
{
    private $SAW_JudulKriteria = 'Kriteria';
    private $SAW_TabelKriteria = 'tb_kriteria';
    public function GetSAW_JudulKriteria()
    {
        return $this->SAW_JudulKriteria;
    }
    public function __construct()
    {
        $this->Database = new SAW_Database();
    }
    public function SAWgetKriteria()
    {
        $this->Database->query('SELECT * FROM ' . $this->SAW_TabelKriteria);
        return $this->Database->resultSet();
    }
    public function getSAWTotalBobotKriteria()
    {
        $this->Database->query("SELECT SUM(nilai_kriteria) AS total_nilai, SUM(bobot_kriteria) AS total_bobot FROM {$this->SAW_TabelKriteria}");
        return $this->Database->single();
    }
    public function SAWsimpanKriteria($SAWsimpanKriteria)
    {
        $this->Database->query("INSERT INTO {$this->SAW_TabelKriteria} VALUES ('', :nama_kriteria, :kode_kriteria, :nilai_kriteria, :bobot_kriteria, :kategori_kriteria)");
        $SAWbobotKriteria = $SAWsimpanKriteria['saw_nilai_kriteria'] / 100 ;
        $this->Database->bind('nama_kriteria', $SAWsimpanKriteria['saw_nama_kriteria']);
        $this->Database->bind('kode_kriteria', $SAWsimpanKriteria['saw_kode_kriteria']);
        $this->Database->bind('nilai_kriteria', $SAWsimpanKriteria['saw_nilai_kriteria']);
        $this->Database->bind('bobot_kriteria', $SAWbobotKriteria);
        $this->Database->bind('kategori_kriteria', $SAWsimpanKriteria['saw_kategori_kriteria']);
        $this->Database->execute();
        return $this->Database->rowCount();
    }
    public function SAWubahKriteria($SAWubahKriteria)
    {
        $this->Database->query("UPDATE {$this->SAW_TabelKriteria} SET
        nama_kriteria =:saw_nama_kriteria,
        kode_kriteria=:saw_kode_kriteria,
        nilai_kriteria=:saw_nilai_kriteria,
        bobot_kriteria=:saw_bobot_kriteria,
        kategori_kriteria =:saw_kategori_kriteria
        WHERE id_kriteria =:saw_id_kriteria ");
        $BobotKriteria = $SAWubahKriteria['saw_nilai_kriteria'] / 100 ;
        $this->Database->bind('saw_nama_kriteria', $SAWubahKriteria['saw_nama_kriteria']);
        $this->Database->bind('saw_kode_kriteria', $SAWubahKriteria['saw_kode_kriteria']);
        $this->Database->bind('saw_nilai_kriteria', $SAWubahKriteria['saw_nilai_kriteria']);
        $this->Database->bind('saw_bobot_kriteria', $BobotKriteria);
        $this->Database->bind('saw_kategori_kriteria', $SAWubahKriteria['saw_kategori_kriteria']);
        $this->Database->bind('saw_id_kriteria', $SAWubahKriteria['saw_id_kriteria']);
        $this->Database->execute();
        return $this->Database->rowCount();
    }
    public function SAWhapusKriteria($SAWhapusKriteria)
    {
        $this->Database->query("DELETE FROM {$this->SAW_TabelKriteria} WHERE id_kriteria =:saw_id_kriteria");
        $this->Database->bind('saw_id_kriteria', $SAWhapusKriteria);
        $this->Database->execute();
        return $this->Database->rowCount();
    }
}