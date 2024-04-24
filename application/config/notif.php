<?php
defined('BASEPATH') or exit('No direct script access allowed');


use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(FCPATH);
$dotenv->load();
$config['email_config'] = [
    'protocol' => 'smtp',
    'smtp_host' => $_ENV['SMTP_HOST'],
    'smtp_port' => intval($_ENV['SMTP_PORT']),
    'smtp_user' => $_ENV['SMTP_EMAIL'],
    'smtp_pass' => $_ENV['SMTP_PASSWORD'],
    'mailtype' => 'html',
    'charset' => 'utf-8',
    'newline' =>  "\r\n"
];
