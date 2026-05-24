<?php
class SAW_Alternatif extends SAW_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->authRequired();
    }
    public function indexsignin()
    {
        $this->saw_alternatif();
    }
    public function saw_alternatif()
    {
        $getSAWData['saw_title'] = 'SPK SAW | Alternatif';
        $getSAWData['saw_subtitle_alternatif'] = $this->model('SAW_AlternatifModel')->GetSAW_JudulAlternatif();
        $getSAWData['saw_get_alternatif'] = $this->model('SAW_AlternatifModel')->SAWgetAlternatif();
        $this->view('saw_templates/saw_header', $getSAWData);
        $this->view('saw_templates/saw_sidebar', $getSAWData);
        $this->view('saw_alternatif/saw_alternatif', $getSAWData);
        $this->view('saw_templates/saw_footer', $getSAWData);
    }
    public function SAWcreateAlternatif()
    {
        $SAWcreateAlternatif = $this->model('SAW_AlternatifModel')->SAWsimpanAlternatif($_POST) > 0;
        if ($SAWcreateAlternatif == false) {
            SAW_Alert::SAW_setFlash('Alternatif', 'Gagal', 'Disimpan.', 'danger');
        }else{
            SAW_Alert::SAW_setFlash('Alternatif', 'Berhasil', 'Disimpan.', 'success');
        }
        header('Location: ' . BASEURL . '/saw_alternatif');
        exit;
    }
    public function SAWupdateAlternatif()
    {
        $SAWupdateAlternatif = $this->model('SAW_AlternatifModel')->SAWubahAlternatif($_POST);
        if ($SAWupdateAlternatif === false) {
            SAW_Alert::SAW_setFlash('Alternatif', 'Gagal', 'Diupdate.', 'danger');
        } elseif($SAWupdateAlternatif === 0) {
            SAW_Alert::SAW_setFlash('Alternatif', 'Tidak Ada', 'Yang Diiubah.', 'warning');
        }else{
            SAW_Alert::SAW_setFlash('Alternatif', 'Berhasil', 'Disimpan.', 'success');
        }
        header('Location: ' . BASEURL . '/saw_alternatif');
        exit;
    }
    public function SAWdeleteAlternatif($id_saw_alternatif)
    {
        $SAWdeleteAlternatif = $this->model('SAW_AlternatifModel')->SAWhapusAlternatif($id_saw_alternatif);
        if ($SAWdeleteAlternatif === false) {
            SAW_Alert::SAW_setFlash('Alternatif', 'Gagal', 'Dihapus.', 'danger');
        }else{
            SAW_Alert::SAW_setFlash('Alternatif', 'Berhasil', 'Dihapus.', 'success');
        }
        header('Location: ' . BASEURL . '/saw_alternatif');
        exit;
    }
}