<?php
class SAW_Alert
{
    public static function SAW_setFlash($SAW_Jenis, $SAW_Message, $SAW_Action, $SAW_Type) {
        $_SESSION['SAW_Sweealert'] = [
            'SAW_Jenis' => $SAW_Jenis,
            'SAW_Message' => $SAW_Message,
            'SAW_Action' => $SAW_Action,
            'SAW_Type' => $SAW_Type
        ];
    }
    public static function SAW_flash()
    {
        if (isset($_SESSION['SAW_Sweealert'])){
            echo '<div class="alert alert-'
                . $_SESSION['SAW_Sweealert']['SAW_Type'] .
                ' alert-dismissible fade show text-white" role="alert"> Data <strong>'
                . $_SESSION['SAW_Sweealert']['SAW_Jenis'] . '</strong> <strong> '
                . $_SESSION['SAW_Sweealert']['SAW_Message'] .'</strong> '
                . $_SESSION['SAW_Sweealert']['SAW_Action'] .
                '<button type="button" class="btn-close text-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            unset($_SESSION['SAW_Sweealert']);
        }
    }
}
?>
