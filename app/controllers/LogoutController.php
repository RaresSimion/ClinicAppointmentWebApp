<?php

class LogoutController
{
    public function logout()
    {
        session_start();
        $_SESSION = array();
        session_destroy();
        header('location: /home');
    }
}