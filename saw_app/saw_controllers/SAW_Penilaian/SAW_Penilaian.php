<?php
class SAW_Penilaian extends SAW_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->authRequired();
    }
    public function indexsignin()
    {
        $this->saw_penilaian();
    }
    public function saw_penilaian()
    {
        $getSAWData['saw_title'] = 'SPK SAW | Penilaian';
        $getSAWData['saw_subtitle_penilaian'] = $this->model('SAW_PenilaianModel')->GetSAW_JudulPenilaian();
        $getSAWData['saw_get_penilaian'] = $this->model('SAW_PenilaianModel')->SAWgetPenilaian();
        $getSAWData['saw_get_alternatif'] = $this->model('SAW_PenilaianModel')->SAWgetAlternatif();
        $getSAWData['saw_get_subkriteria'] = $this->model('SAW_PenilaianModel')->SAWgetSubKriteria();
        $getSAWData['saw_get_kriteria'] = $this->model('SAW_PenilaianModel')->SAWgetKriteria();
        $this->view('saw_templates/saw_header', $getSAWData);
        $this->view('saw_templates/saw_sidebar', $getSAWData);
        $this->view('saw_penilaian/saw_penilaian', $getSAWData);
        $this->view('saw_templates/saw_footer', $getSAWData);
    }
    public function SAWcreatePenilaian()
    {
        $SAWidAlternatif = $_POST['saw_id_alternatif'];
        foreach($_POST['saw_id_subkriteria'] as $SAWidKriteria => $SAWidSubKriteria){
            $SAWinpuPenilaian = [
                'saw_id_alternatif' => $SAWidAlternatif,
                'saw_id_kriteria' => $SAWidKriteria,
                'saw_id_sub_kriteria' => $SAWidSubKriteria
            ];
            $SAWcreatePenilaian = $this->model('SAW_PenilaianModel')->SAWsimpanPenilaian($SAWinpuPenilaian);
            if ($SAWcreatePenilaian > 0) {
                SAW_Alert::SAW_setFlash('Penilaian', 'Berhasil', 'Disimpan.', 'success');
            }
            else {
                SAW_Alert::SAW_setFlash('Penilaian', 'Gagal', 'Disimpan.', 'danger');
            }
        }
        header('Location: ' . BASEURL . '/saw_penilaian');
        exit;
    }
    public function SAWupdatePenilaian()
    {
        $SAWupdatePenilaian = $this->model('SAW_PenilaianModel')->SAWubahPenilaian($_POST);
        if ($SAWupdatePenilaian === false) {
            SAW_Alert::SAW_setFlash('Penilaian', 'Gagal', 'Disimpan.', 'success');
        } elseif($SAWupdatePenilaian === 0) {
            SAW_Alert::SAW_setFlash('Penilaian', 'Tidak Ada', 'Yang Diiubah.', 'danger');
        }else{
            SAW_Alert::SAW_setFlash('Penilaian', 'Berhasil', 'Disimpan.', 'success');
        }
        header('Location: ' . BASEURL . '/saw_penilaian');
        exit;
    }
    public function SAWdeletePenilaian($id_saw_penilaian)
    {
        $SAWdeletePenilaian = $this->model('SAW_PenilaianModel')->SAWhapusPenilaian($id_saw_penilaian);
        if ($SAWdeletePenilaian === false) {
            SAW_Alert::SAW_setFlash('Alternatif', 'Gagal', 'Dihapus.', 'danger');
        }else{
            SAW_Alert::SAW_setFlash('Alternatif', 'Berhasil', 'Dihapus.', 'success');
        }
        header('Location: ' . BASEURL . '/saw_penilaian');
        exit;
    }
}