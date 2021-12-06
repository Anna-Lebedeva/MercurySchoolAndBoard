<?php


class clNav
{
    var $board_link = 'localhost:5001';
    var $flag_auth = 0;
    var $flag_teacher = 0;
    var $profile_id = 0;
    var $name = '';
    var $board_url = '';
    var $flag_uchitel = 0;
    var $profile_uchitel_id = 0;

    public function __construct($clMysql)
    {
        if (isset($_SESSION['auth_user'])) {
            if ($_SESSION['auth_user'] == 1) {
                $this->flag_auth = 1;
            }
        }

        if (isset($_SESSION['flag_teacher'])) {
            if ($_SESSION['flag_teacher'] == 1) {
                $this->flag_teacher = 1;
            }
        }

        if (isset($_SESSION['profile'])) {
            $this->profile_id = $_SESSION['profile']['id'];
            $this->name = $_SESSION['profile']['name'];
            $this->flag_uchitel = $_SESSION['profile']['flag_uchitel'];
            $this->profile_uchitel_id = $_SESSION['profile']['profile_uchitel_id'];
            //print_r( $_SESSION['profile']);
          //  exit;
        }
    }
}
