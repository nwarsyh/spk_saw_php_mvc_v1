<?php
class SAW_DashboardModel
{
    private $SAW_JudulDashboard = 'Dashboard';
    private $SAW_TabelAlternatif = 'tb_siswa';
    private $SAW_TabelKriteria = 'tb_kriteria';
    private $SAW_TabelSubKriteria = 'tb_sub_kriteria';
    private $SAW_TabelUSer = 'tb_user';
    public function GetSAW_JudulDashboard()
    {
        return $this->SAW_JudulDashboard;
    }
    public function __construct()
    {
        $this->Database = new SAW_Database();
    }
    public function SAWgetTotalAlternatif()
    {
        $this->Database->query("SELECT COUNT(*) AS totalalternatif FROM {$this->SAW_TabelAlternatif} WHERE id_siswa");
        $result = $this->Database->single();
        return $result['totalalternatif'];
    }
    public function SAWgetTotalKriteria()
    {
        $this->Database->query("SELECT COUNT(*) AS totalkriteria FROM {$this->SAW_TabelKriteria} WHERE id_kriteria");
        $result = $this->Database->single();
        return $result['totalkriteria'];
    }
    public function SAWgetTotalSubKriteria()
    {
        $this->Database->query("SELECT COUNT(*) AS totalsubkriteria FROM {$this->SAW_TabelSubKriteria} WHERE id_sub_kriteria");
        $result = $this->Database->single();
        return $result['totalsubkriteria'];
    }
    public function SAWgetTotalUser()
    {
        $this->Database->query("SELECT COUNT(*) AS totaluser FROM {$this->SAW_TabelUSer} WHERE id_user");
        $result = $this->Database->single();
        return $result['totaluser'];
    }
}