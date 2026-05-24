<?php
class SAW_Dashboard extends SAW_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->authRequired();
    }
    public function indexsignin()
    {
        $this->saw_dashboard();
    }
    public function saw_dashboard()
    {
        $getSAWData['saw_title'] = 'SPK SAW | Dashboard';
        $getSAWData['saw_subtitle_dashboard'] = $this->model('SAW_DashboardModel')->GetSAW_JudulDashboard();
        $getSAWData['saw_total_alternatif'] = $this->model('SAW_DashboardModel')->SAWgetTotalAlternatif();
        $getSAWData['saw_total_kriteria'] = $this->model('SAW_DashboardModel')->SAWgetTotalKriteria();
        $getSAWData['saw_total_subkriteria'] = $this->model('SAW_DashboardModel')->SAWgetTotalSubKriteria();
        $getSAWData['saw_total_user'] = $this->model('SAW_DashboardModel')->SAWgetTotalUser();
        $this->view('saw_templates/saw_header', $getSAWData);
        $this->view('saw_templates/saw_sidebar', $getSAWData);
        $this->view('saw_dashboard/saw_dashboard', $getSAWData);
        $this->view('saw_templates/saw_footer', $getSAWData);
    }
}