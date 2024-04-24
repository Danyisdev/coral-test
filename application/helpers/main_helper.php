<?php
defined('BASEPATH') or exit('No direct script access allowed');
if (!function_exists('appSetting')) {
    function appSetting($key)
    {
        $st = [
            'webname' => 'My Test',
            'version' => '1.0'
        ];

        return isset($st[$key]) ? $st[$key] : '';
    }
}

if (!function_exists('checkSession') || !function_exists('isLogin')) {
    function checkSession()
    {
        $CI = &get_instance();
        $sess = $CI->session->userdata('is_login');
        if ($sess == false || empty($sess)) {
            redirect(base_url('auth/login'));
            return;
        }
    }
    function isLogin()
    {
        $CI = &get_instance();
        $sess = $CI->session->userdata('is_login');
        if ($sess == true) {
            redirect(base_url('dashboard'));
            return;
        }
    }
}

if (!function_exists('login_sess')) {
    function login_sess($param)
    {
        $CI = &get_instance();
        $arr = $CI->session->userdata();
        return $arr[$param] ? $arr[$param] : "Not Found";
    }
}
