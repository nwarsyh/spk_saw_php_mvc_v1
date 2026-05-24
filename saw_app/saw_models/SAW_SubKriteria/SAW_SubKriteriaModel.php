<?php
class SAW_SubKriteriaModel
{
    private $SAW_JudulSubKriteria = 'Sub Kriteria';
    private $SAW_TabelKriteria = 'tb_kriteria';
    private $SAW_TabelSubKriteria = 'tb_sub_kriteria';
    public function GetSAW_JudulSubKriteria()
    {
        return $this->SAW_JudulSubKriteria;
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
    public function SAWgetSubKriteria()
    {
        $this->Database->query("SELECT sk.*,
        k.nama_kriteria, k.kode_kriteria, k.kategori_kriteria
        FROM {$this->SAW_TabelSubKriteria} sk
        LEFT JOIN {$this->SAW_TabelKriteria} k
        ON sk.id_kriteria = k.id_kriteria
        ORDER BY sk.id_sub_kriteria ASC");
        return $this->Database->resultSet();
    }
    public function SAWsimpanSubKriteria($SAWsimpanSubKriteria)
    {
        $this->Database->query("INSERT INTO {$this->SAW_TabelSubKriteria} VALUES ('',
        :id_kriteria, :nama_sub_kriteria, :nilai_sub_kriteria)");
        $this->Database->bind('id_kriteria', $SAWsimpanSubKriteria['saw_id_kriteria']);
        $this->Database->bind('nama_sub_kriteria', $SAWsimpanSubKriteria['saw_nama_sub_kriteria']);
        $this->Database->bind('nilai_sub_kriteria', $SAWsimpanSubKriteria['saw_nilai_sub_kriteria']);
        $this->Database->execute();
        return $this->Database->rowCount();
    }
    public function SAWubahSubKriteria($SAWubahSubKriteria)
    {
        $this->Database->query("UPDATE {$this->SAW_TabelSubKriteria} SET
        id_kriteria =:saw_id_kriteria,
        nama_sub_kriteria =:saw_nama_sub_kriteria,
        nilai_sub_kriteria=:saw_nilai_sub_kriteria
        WHERE id_sub_kriteria =:saw_id_sub_kriteria");
        $this->Database->bind('saw_id_kriteria', $SAWubahSubKriteria['saw_id_kriteria']);
        $this->Database->bind('saw_nama_sub_kriteria', $SAWubahSubKriteria['saw_nama_sub_kriteria']);
        $this->Database->bind('saw_nilai_sub_kriteria', $SAWubahSubKriteria['saw_nilai_sub_kriteria']);
        $this->Database->bind('saw_id_sub_kriteria', $SAWubahSubKriteria['saw_id_sub_kriteria']);
        $this->Database->execute();
        return $this->Database->rowCount();
    }
    public function SAWhapusSubKriteria($SAWhapusSubKriteria)
    {
        $this->Database->query("DELETE FROM {$this->SAW_TabelSubKriteria} WHERE id_sub_kriteria =:saw_id_sub_kriteria");
        $this->Database->bind('saw_id_sub_kriteria', $SAWhapusSubKriteria);
        $this->Database->execute();
        return $this->Database->rowCount();
    }
}