<?php
class SAW_SignIn extends SAW_Controller
{
    public function __construct() {
        parent::__construct();
    }
    public function indexsignin() {
        $this->saw_signin();
    }
    public function saw_signin() {
        $getSAWData['saw_title'] = 'SPK SAW | SignIn';
        $this->view('saw_signin/saw_signin', $getSAWData);
    }
    public function SAW_doSignIn() {
        $SAW_Username = $_POST['saw_username'];
        $SAW_Password = $_POST['saw_password'];
        $SAW_Authentication = $this->model('SAW_SignInModel')->SAW_SignIn($SAW_Username);
        if ($SAW_Authentication && password_verify($SAW_Password, $SAW_Authentication['password_user'])) {
            session_regenerate_id(true);
            $_SESSION = [];
            $_SESSION['saw_signin'] = true;
            $_SESSION['id_user '] = $SAW_Authentication['id_user'];
            $_SESSION['namalengkap_user'] = $SAW_Authentication['namalengkap_user'];
            $_SESSION['username_user'] = $SAW_Authentication['username_user'];
            $SAW_namaLengkap = $_SESSION['namalengkap_user'];
            echo "<script>
                    alert('Selamat Datang " . addslashes($SAW_namaLengkap) . "');
                    window.location.href = '" . BASEURL . "/saw_dashboard';
                    </script>";
            exit;
        } else {
            echo "<script>
                    alert('Mohon Maaf, Username Atau Password Tidak Sesuai');
                    window.location.href = '".BASEURL."';
                    </script>";
            exit;
        }
    }
    public function SAW_doLogout()
    {
        session_destroy();
        header('Location: ' . BASEURL . '');
        exit;
    }
}