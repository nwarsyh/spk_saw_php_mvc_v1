<?php
class SAW_SubKriteria extends SAW_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->authRequired();
    }
    public function indexsignin()
    {
        $this->saw_subkriteria();
    }
    public function saw_subkriteria()
    {
        $getSAWData['saw_title'] = 'SPK SAW | Sub Kriteria';
        $getSAWData['saw_subtitle_subkriteria'] = $this->model('SAW_SubKriteriaModel')->GetSAW_JudulSubKriteria();
        $getSAWData['saw_get_sub_kriteria'] = $this->model('SAW_SubKriteriaModel')->SAWgetSubKriteria();
        $getSAWData['saw_get_kriteria'] = $this->model('SAW_SubKriteriaModel')->SAWgetKriteria();
        $this->view('saw_templates/saw_header', $getSAWData);
        $this->view('saw_templates/saw_sidebar', $getSAWData);
        $this->view('saw_subkriteria/saw_subkriteria', $getSAWData);
        $this->view('saw_templates/saw_footer', $getSAWData);
    }
    public function SAWcreateSubKriteria()
    {
        $SAWcreateSubKriteria = $this->model('SAW_SubKriteriaModel')->SAWsimpanSubKriteria($_POST) > 0;
        if ($SAWcreateSubKriteria == false) {
            SAW_Alert::SAW_setFlash('Sub Kriteria', 'Gagal', 'Disimpan.', 'danger');
        }else{
            SAW_Alert::SAW_setFlash('Sub Kriteria', 'Berhasil', 'Disimpan.', 'success');
        }
        header('Location: ' . BASEURL . '/saw_subkriteria');
        exit;
    }
    public function SAWupdateSubKriteria()
    {
        $SAWupdateSubKriteria = $this->model('SAW_SubKriteriaModel')->SAWubahSubKriteria($_POST);
        if ($SAWupdateSubKriteria === false) {
            SAW_Alert::SAW_setFlash('Sub Kriteria', 'Gagal', 'Diupdate.', 'danger');
        } elseif($SAWupdateSubKriteria === 0) {
            SAW_Alert::SAW_setFlash('Sub Kriteria', 'Tidak Ada', 'Yang Diiubah.', 'warning');
        }else{
            SAW_Alert::SAW_setFlash('Sub Kriteria', 'Berhasil', 'Disimpan.', 'success');
        }
        header('Location: ' . BASEURL . '/saw_subkriteria');
        exit;
    }
    public function SAWdeleteSubKriteria($saw_is_sub_kriteria)
    {
        $SAWdeleteSubKriteria = $this->model('SAW_SubKriteriaModel')->SAWhapusSubKriteria($saw_is_sub_kriteria);
        if ($SAWdeleteSubKriteria === false) {
            SAW_Alert::SAW_setFlash('Sub Kriteria', 'Gagal', 'Dihapus.', 'danger');
        }else{
            SAW_Alert::SAW_setFlash('Sub Kriteria', 'Berhasil', 'Dihapus.', 'success');
        }
        header('Location: ' . BASEURL . '/saw_subkriteria');
        exit;
    }
}