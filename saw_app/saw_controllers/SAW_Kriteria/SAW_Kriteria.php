<?php
class SAW_Kriteria extends SAW_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->authRequired();
    }
    public function indexsignin()
    {
        $this->saw_kriteria();
    }
    public function saw_kriteria()
    {
        $getSAWData['saw_title'] = 'SPK SAW | Kriteria';
        $getSAWData['saw_subtitle_kriteria'] = $this->model('SAW_KriteriaModel')->GetSAW_JudulKriteria();
        $getSAWData['saw_get_kriteria'] = $this->model('SAW_KriteriaModel')->SAWgetKriteria();
        $getSAWData['saw_get_total_bobot_kriteria'] = $this->model('SAW_KriteriaModel')->getSAWTotalBobotKriteria();
        $this->view('saw_templates/saw_header', $getSAWData);
        $this->view('saw_templates/saw_sidebar', $getSAWData);
        $this->view('saw_kriteria/saw_kriteria', $getSAWData);
        $this->view('saw_templates/saw_footer', $getSAWData);
    }
    public function SAWcreateKriteria()
    {
        $SAWcreateKriteria = $this->model('SAW_KriteriaModel')->SAWsimpanKriteria($_POST) > 0;
        if ($SAWcreateKriteria == false) {
            SAW_Alert::SAW_setFlash('Kriteria', 'Gagal', 'Disimpan.', 'danger');
        }else{
            SAW_Alert::SAW_setFlash('Kriteria', 'Berhasil', 'Disimpan.', 'success');
        }
        header('Location: ' . BASEURL . '/saw_kriteria');
        exit;
    }
    public function SAWupdateKriteria()
    {
        $SAWupdateKriteria = $this->model('SAW_KriteriaModel')->SAWubahKriteria($_POST);
        if ($SAWupdateKriteria === false) {
            SAW_Alert::SAW_setFlash('Kriteria', 'Gagal', 'Diupdate.', 'danger');
        }
        elseif($SAWupdateKriteria === 0) {
            SAW_Alert::SAW_setFlash('Kriteria', 'Tidak Ada', 'Yang Diiubah.', 'warning');
        }
        else{
            SAW_Alert::SAW_setFlash('Kriteria', 'Berhasil', 'Disimpan.', 'success');
        }
        header('Location: ' . BASEURL . '/saw_kriteria');
        exit;
    }
    public function SAWdeleteKriteria($id_saw_kriteria)
    {
        $SAWdeleteKriteria = $this->model('SAW_KriteriaModel')->SAWhapusKriteria($id_saw_kriteria);
        if ($SAWdeleteKriteria === false) {
            SAW_Alert::SAW_setFlash('Kriteria', 'Gagal', 'Dihapus.', 'danger');
        }else{
            SAW_Alert::SAW_setFlash('Kriteria', 'Berhasil', 'Dihapus.', 'success');
        }
        header('Location: ' . BASEURL . '/saw_kriteria');
        exit;
    }
}