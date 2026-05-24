<?php
class SAW_Proses extends SAW_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->authRequired();
    }
    public function indexsignin()
    {
        $this->saw_proses();
    }
    public function saw_proses()
    {
        $getSAWData['saw_title'] = 'SPK SAW | Proses';
        $getSAWData['saw_subtitle_proses'] = $this->model('SAW_ProsesModel')->GetSAW_JudulProses();
        $getSAWData['saw_get_proses'] = $this->model('SAW_ProsesModel')->SAWgetProses();
        $getSAWData['saw_get_alternatif'] = $this->model('SAW_ProsesModel')->SAWgetAlternatif();
        $getSAWData['saw_get_subkriteria'] = $this->model('SAW_ProsesModel')->SAWgetSubKriteria();
        $getSAWData['saw_get_kriteria'] = $this->model('SAW_ProsesModel')->SAWgetKriteria();
        $this->view('saw_templates/saw_header', $getSAWData);
        $this->view('saw_templates/saw_sidebar', $getSAWData);
        $this->view('saw_proses/saw_proses', $getSAWData);
        $this->view('saw_templates/saw_footer', $getSAWData);
    }
}