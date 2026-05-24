<?php
class SAW_Error404 extends SAW_Controller
{
    public function saw_error404()
    {
        $getSAWData['saw_title'] = 'SPK SAW | Error 404';
        $getSAWData['saw_subtitle_error'] = $this->model('SAW_Error404Model')->GetSAW_JudulError404();
        $this->view('saw_error404/saw_error404', $getSAWData);
    }
}