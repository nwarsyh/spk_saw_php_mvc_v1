<?php
class SAW_AlternatifModel
{
    private $SAW_JudulAlternatif = 'Alternatif';
    private $SAW_TabelAlternatif = 'tb_siswa';
    public function GetSAW_JudulAlternatif()
    {
        return $this->SAW_JudulAlternatif;
    }
    public function __construct()
    {
        $this->Database = new SAW_Database();
    }
    public function SAWgetAlternatif()
    {
        $this->Database->query('SELECT * FROM ' . $this->SAW_TabelAlternatif);
        return $this->Database->resultSet();
    }
    public function SAWsimpanAlternatif($SAWsimpanAlternatif)
    {
        $this->Database->query("INSERT INTO {$this->SAW_TabelAlternatif} VALUES ('', :nama_siswa, :kode_siswa)");
        $this->Database->bind('nama_siswa', $SAWsimpanAlternatif['saw_nama_alternatif']);
        $this->Database->bind('kode_siswa', $SAWsimpanAlternatif['saw_kode_alternatif']);
        $this->Database->execute();
        return $this->Database->rowCount();
    }
    public function SAWubahAlternatif($SAWubahAlternatif)
    {
        $this->Database->query("UPDATE {$this->SAW_TabelAlternatif} SET nama_siswa =:saw_nama_alternatif, kode_siswa =:saw_kode_alternatif WHERE id_siswa =:saw_id_alternatif");
        $this->Database->bind('saw_nama_alternatif', $SAWubahAlternatif['saw_nama_alternatif']);
        $this->Database->bind('saw_kode_alternatif', $SAWubahAlternatif['saw_kode_alternatif']);
        $this->Database->bind('saw_id_alternatif', $SAWubahAlternatif['saw_id_alternatif']);
        $this->Database->execute();
        return $this->Database->rowCount();
    }
    public function SAWhapusAlternatif($SAWhapusAlternatif)
    {
        $this->Database->query("DELETE FROM {$this->SAW_TabelAlternatif} WHERE id_siswa=:id_alternatif");
        $this->Database->bind('id_alternatif', $SAWhapusAlternatif);
        $this->Database->execute();
        return $this->Database->rowCount();
    }
}