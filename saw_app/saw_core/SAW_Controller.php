<?php
class SAW_Controller
{
    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    public function authRequired() {
        if (!isset($_SESSION['saw_signin'])) {
            header('Location: ' . BASEURL . '/SAW_SignIn');
            exit;
        }
    }
    public function view($SAW_Views, $getSAWData = [])
    {
        require_once VIEW_SAW . $SAW_Views . '.php';
    }
    public function model($SAW_Model)
    {
        $SAW_Controller = get_class($this);
        require_once MODEL_SAW . $SAW_Controller . '/' . $SAW_Model . '.php';
        return new $SAW_Model;
    }
}