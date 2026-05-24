<?php
class SAW_SignInModel
{
    private $TabelUser = 'tb_user';
    private $SAW_Database;
    public function __construct()
    {
        $this->SAW_Database = new SAW_Database();
    }
    public function SAW_SignIn($SAW_SignIn)
    {
        $this->SAW_Database->query('SELECT * FROM ' . $this->TabelUser . ' WHERE username_user=:username_user');
        $this->SAW_Database->bind('username_user', $SAW_SignIn);
        return $this->SAW_Database->single();
    }
}