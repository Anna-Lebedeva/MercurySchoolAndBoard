<?php


class clNav
{
    var $board_link = 'localhost:5001';
    var $flag_auth = 0;
    var $flag_teacher = 0;
    var $profile_id = 0;
    var $name = '';
    var $board_url = '';

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
            $this->board_url = $_SESSION['profile']['board_url'];
        }
    }
}
