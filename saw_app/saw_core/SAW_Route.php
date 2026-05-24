<?php
class SAW_Route
{
    protected $SAW_Controller;
    protected $SAW_Method;
    protected $SAW_Params = [];
    public function __construct()
    {
        $SAW_Url = $this->ParseURL();
        if (empty($SAW_Url)) {
            if (isset($_SESSION['saw_signin']) && $_SESSION['saw_signin'] === true) {
                $this->SAW_Controller = 'SAW_Dashboard';
                $this->SAW_Method = 'saw_dashboard';
            } else {
                $this->SAW_Controller = 'SAW_SignIn';
                $this->SAW_Method = 'saw_signin';
            }
        }
        else if (isset($SAW_Url[0]) && file_exists(CONTROLLER_SAW . ucfirst($SAW_Url[0]) . '/' . ucfirst($SAW_Url[0]) . '.php')) {
            $this->SAW_Controller = ucfirst($SAW_Url[0]);
            unset($SAW_Url[0]);
        }
        else if (!empty($SAW_Url)) {
            $this->redirectToError();
        }
        require_once CONTROLLER_SAW . $this->SAW_Controller . '/' . $this->SAW_Controller . '.php';
        $this->SAW_Controller = new $this->SAW_Controller;
        if (isset($SAW_Url[1])) {
            if (method_exists($this->SAW_Controller, $SAW_Url[1])) {
                $this->SAW_Method = $SAW_Url[1];
                unset($SAW_Url[1]);
            } else {
                $this->redirectToError();
            }
        } else {
            $this->SAW_Method = 'indexsignin';
        }
        if (!empty($SAW_Url)) {
            $this->SAW_Params = array_values($SAW_Url);
        }
        call_user_func_array([$this->SAW_Controller, $this->SAW_Method], $this->SAW_Params);
    }
    private function ParseURL()
    {
        if (isset($_GET['url'])) {
            $SAW_Link = rtrim($_GET['url'], '/');
            $SAW_Link = filter_var($SAW_Link, FILTER_SANITIZE_URL);
            return explode('/', $SAW_Link);
        }
        return [];
    }
    private function redirectToError()
    {
        require_once CONTROLLER_SAW . 'SAW_Error404/SAW_Error404.php';
        $this->SAW_Controller = new SAW_Error404();
        $this->SAW_Method = 'saw_error404';
        $this->SAW_Params = [];
        call_user_func_array([$this->SAW_Controller, $this->SAW_Method], []);
        exit;
    }
    public function authRequired()
    {
        if (!isset($_SESSION['saw_signin'])) {
            header('Location: ' . BASEURL . '/SAW_SignIn');
            exit;
        }
    }
}